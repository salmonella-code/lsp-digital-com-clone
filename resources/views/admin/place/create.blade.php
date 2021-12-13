@extends('admin.layouts.app')

@section('pageTitle', 'Tempat Uji Kompetensi')
@section('content')
    <div class="card border-0 shadow">
        <div class="card-body">
            <form action="{{ route('place.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="text-capitalize">Nama<span class="text-danger">*</span></label>
                    <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name"
                        placeholder="Masukkan Nama" value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>"{{ $message }}"</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="code" class="text-capitalize">Kode<span class="text-danger">*</span></label>
                    <input type="text" class="form-control  @error('code') is-invalid @enderror" id="code" name="code"
                        placeholder="Masukkan Kode" value="{{ old('code') }}">
                    @error('code')
                        <span class="invalid-feedback" role="alert">
                            <strong>"{{ $message }}"</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="text-capitalize">desktipsi<span class="text-danger">*</span></label>
                    <input type="text" class="form-control  @error('description') is-invalid @enderror" id="description" name="description" placeholder="Masukkan desktipsi" value="{{ old('description') }}">
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>"{{ $message }}"</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="province" class="text-capitalize">Provinsi<span class="text-danger">*</span></label>
                    <select class="form-control  @error('province') is-invalid @enderror" id="province" name="province">
                        <option value="" disabled selected>-- Pilih Provinsi --</option>
                        @foreach ($province['provinsi'] as $prov)
                        <option value="{{ $prov['nama'] }}" {{ old('province') == $prov['nama'] ? 'selected' : '' }}>{{ $prov['nama'] }}</option>
                        @endforeach
                    </select>
                    @error('province')
                        <span class="invalid-feedback" role="alert">
                            <strong>"{{ $message }}"</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="city" class="text-capitalize">Kota/Kabupaten<span class="text-danger">*</span></label>
                    <input type="text" class="form-control  @error('city') is-invalid @enderror" id="city" name="city" placeholder="Masukkan Kota/Kabupaten" value="{{ old('city') }}">
                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>"{{ $message }}"</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address" class="text-capitalize">alamat<span class="text-danger">*</span></label>
                    <input type="text" class="form-control  @error('address') is-invalid @enderror" id="address" name="address" placeholder="Masukkan alamat" value="{{ old('address') }}">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>"{{ $message }}"</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="contact" class="text-capitalize">No Hp<span class="text-danger">*</span></label>
                    <input type="text" class="form-control  @error('contact') is-invalid @enderror" id="contact" name="contact" placeholder="Masukkan No Hp" value="{{ old('contact') }}">
                    @error('contact')
                        <span class="invalid-feedback" role="alert">
                            <strong>"{{ $message }}"</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="text-capitalize">email<span class="text-danger">*</span></label>
                    <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan email" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>"{{ $message }}"</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="license" class="text-capitalize">Sertifikat Lisensi<span class="text-danger">*</span></label>
                    <input type="file" class="form-control-file  @error('license') is-invalid @enderror" id="license"
                        name="license">
                    @error('license')
                        <span class="invalid-feedback" role="alert">
                            <strong>"{{ $message }}"</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary rounded-pill">Simpan</button>
            </form>
        </div>
    </div>
@endsection
