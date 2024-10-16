<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controllers\HasMiddleware;
// use Carbon\CarbonPeriod;
// use Illuminate\Support\Facades\DB;
// use App\Http\Requests\StoreUserRequest;
// use App\Http\Requests\UpdateUserRequest;
// use IcehouseVentures\LaravelChartjs\Facades\Chartjs;

class UserController extends Controller implements HasMiddleware
{
    use HasMiddleware;

    public static function middleware(): array
    {
        return [
            'role:super-admin|admin'
        ];
    }

    // public function __construct()
    // {
    //     $this->middleware('permission:view user', ['only' => ['index']]);
    //     $this->middleware('permission:create user', ['only' => ['create','store']]);
    //     $this->middleware('permission:update user', ['only' => ['update','edit']]);
    //     $this->middleware('permission:delete user', ['only' => ['destroy']]);
    // }

    public function index()
    {
        $users = User::get();
        return view('role-permission.user.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('role-permission.user.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                    ]);

        $user->syncRoles($request->roles);

        return redirect('/users')->with('status','User created successfully with roles');
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name','name')->all();
        $userRoles = $user->roles->pluck('name','name')->all();
        return view('role-permission.user.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if(!empty($request->password)){
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect('/users')->with('status','User Updated Successfully with roles');
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect('/users')->with('status','User Delete Successfully');
    }
    // public function index(Request $request)
    // {
    //     // $users = \App\Models\User::pagination(10);
    //     $users = DB::table('users')
    //         ->when($request->input('name'), function ($query, $name) {
    //             return $query->where('name', 'like', '%'.$name.'%');
    //         })
    //         ->orderBy('id', 'desc')
    //         ->paginate(10);
    //     return view('pages.users.index', compact('users'));

    // }

    // public function create()
    // {
    //     return view('pages.users.create');
    // }

    // public function store(StoreUserRequest $request)
    // {
    //     $data = $request->all();
    //     $data['password'] = Hash::make($request->password);
    //     \App\Models\User::create($data);
    //     return redirect()->route('users.index')->with('success', 'User created successfully.');
    // }

    // public function edit($id)
    // {
    //     $user = \App\Models\User::findOrFail($id);
    //     return view('pages.users.edit', compact('user'));
    // }

    // public function update(UpdateUserRequest $request, User $user)
    // {
    //     $data = $request->validated();
    //     $user->update($data);
    //     return redirect()->route('users.index')->with('success', 'User updated successfully.');
    // }

    // public function destroy($id)
    // {
    //     $user = \App\Models\User::find($id);
    //     $user->delete();
    //     return redirect('/users');
    // }

    // public function showChartUser()
    // {
    //     $start = Carbon::parse(User::min("created_at"));
    //     $end = Carbon::now();
    //     $period = CarbonPeriod::create($start, "1 month", $end);

    //     $usersPerMonth = collect($period)->map(function ($date) {
    //         $endDate = $date->copy()->endOfMonth();

    //         return [
    //             "count" => User::where("created_at", "<=", $endDate)->count(),
    //             "month" => $endDate->format("Y-m-d")
    //         ];
    //     });

    //     $data = $usersPerMonth->pluck("count")->toArray();
    //     $labels = $usersPerMonth->pluck("month")->toArray();

    //     $chartUser = Chartjs::build()
    //         ->name("UserRegistrationsChart")
    //         ->type("line")
    //         ->size(["width" => 400, "height" => 200])
    //         ->labels($labels)
    //         ->datasets([
    //             [
    //                 "label" => "User Registrations",
    //                 "backgroundColor" => "rgba(38, 185, 154, 0.31)",
    //                 "borderColor" => "rgba(38, 185, 154, 0.7)",
    //                 "data" => $data
    //             ]
    //         ])
    //         ->options([
    //             'scales' => [
    //                 'x' => [
    //                     'type' => 'time',
    //                     'time' => [
    //                         'unit' => 'month'
    //                     ],
    //                     'min' => $start->format("Y-m-d"),
    //                 ]
    //             ],
    //             'plugins' => [
    //                 'title' => [
    //                     'display' => true,
    //                     'text' => 'Monthly User Registrations'
    //                 ]
    //             ]
    //         ]);

    //     return view('pages.charts.user', compact('chartUser'));
    // }

}
