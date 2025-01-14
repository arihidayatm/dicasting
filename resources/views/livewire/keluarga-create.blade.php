{{-- create keluarga --}}
<div>
    <x-jet-form-section submit="create">
        <x-slot name="title">
            {{ __('Tambah Keluarga') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Tambahkan data keluarga') }}
        </x-slot>

        <x-slot name="form">
            <!-- Nama -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="nama" value="{{ __('Nama') }}" />
                <x-jet-input id="nama" type="text" class="mt-1 block w-full" wire:model.defer="nama" autocomplete="nama" />
                <x-jet-input-error for="nama" class="mt-2" />
            </div>

            <!-- NIK -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="nik" value="{{ __('NIK') }}" />
                <x-jet-input id="nik" type="text" class="mt-1 block w-full" wire:model.defer="nik" autocomplete="nik" />
                <x-jet-input-error for="nik" class="mt-2" />
            </div>

            <!-- Tempat Lahir -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="tempat_lahir" value="{{ __('Tempat Lahir') }}" />
                <x-jet-input id="tempat_lahir" type="text" class="mt-1 block w-full" wire:model.defer="tempat_lahir" autocomplete="tempat_lahir" />
                <x-jet-input-error for="tempat_lahir" class="mt-2" />
            </div>

            <!-- Tanggal Lahir -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="tanggal_lahir" value="{{ __('Tanggal Lahir') }}" />
                <x-jet-input id="tanggal_lahir" type="date" class="mt-1 block w-full" wire:model.defer="tanggal_lahir" autocomplete="tanggal_lahir" />
                <x-jet-input-error for="tanggal_lahir" class="mt-2" />
            </div>

            <!-- Jenis Kelamin -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="jenis kelamin" value="{{ __('Jenis Kelamin') }}" />
                <select id="jenis_kelamin" class="mt-1 block   w-full" wire:model.defer="jenis_kelamin" autocomplete="jenis_kelamin">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
                <x-jet-input-error for="jenis_kelamin" class="mt-2" />
            </div>

            <!-- Agama -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="agama" value="{{ __('Agama') }}" />
                <select id="agama" class="mt-1 block   w-full" wire:model.defer="agama" autocomplete="agama">
                    <option value="">Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
                <x-jet-input-error for="agama" class="mt-2" />
            </div>

            <!-- Pendidikan -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="pendidikan" value="{{ __('Pendidikan') }}" />
                <select id="pendidikan" class="mt-1 block   w-full" wire:model.defer="pendidikan" autocomplete="pendidikan">
                    <option value="">Pilih Pendidikan</option>
                    <option value="Tidak Sekolah">Tidak Sekolah</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
                <x-jet-input-error for="pendidikan" class="mt-2" />
            </div>

            <!-- Pekerjaan -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="pekerjaan" value="{{ __('Pekerjaan') }}" />
                <x-jet-input id="pekerjaan" type="text" class="mt-1 block w-full" wire:model.defer="pekerjaan" autocomplete="pekerjaan" />
                <x-jet-input-error for="pekerjaan" class="mt-2" />
            </div>

            <!-- Status Perkawinan -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="status_perkawinan" value="{{ __('Status Perkawinan') }}" />
                <select id="status_perkawinan" class="mt-1 block   w-full" wire:model.defer="status_perkawinan" autocomplete="status_perkawinan">
                    <option value="">Pilih Status Perkawinan</option>
                    <option value="Kawin">Kawin</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Cerai">Cerai</option>
                </select>
                <x-jet-input-error for="status_perkawinan" class="mt-2" />
            </div>

            <!-- Hubungan Keluarga -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="hubungan_keluarga" value="{{ __('Hubungan Keluarga') }}" />
                <select id="hubungan_keluarga" class="mt-1 block   w-full" wire:model.defer="hubungan_keluarga" autocomplete="hubungan_keluarga">
                    <option value="">Pilih Hubungan Keluarga</option>
                    <option value="Kepala Keluarga">Kepala Keluarga</option>
                    <option value="Istri">Istri</option>
                    <option value="Anak">Anak</option>
                    <option value="Famili Lain">Famili Lain</option>
                </select>
                <x-jet-input-error for="hubungan_keluarga" class="mt-2" />
            </div>

            <!-- Kewarganegaraan -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="kewarganegaraan" value="{{ __('Kewarganegaraan') }}" />
                <select id="kewarganegaraan" class="mt-1 block   w-full" wire:model.defer="kewarganegaraan" autocomplete="kewarganegaraan">
                    <option value="">Pilih Kewarganegaraan</option>
                    <option value="WNI">WNI</option>
                    <option value="WNA">WNA</option>
                </select>
                <x-jet-input-error for="kewarganegaraan" class="mt-2" />
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="created">
                {{ __('Data keluarga berhasil ditambahkan.') }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __('Tambah') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
