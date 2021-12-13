@extends('admin.layouts.app')

@section('pageTitle', 'Skema')
@section('content')
    <div class="card border-0 shadow">
        <div class="card-body">
            <form action="{{ route('skema.store') }}" method="post" enctype="multipart/form-data">
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
                    <label for="category" class="text-capitalize">Jenis<span class="text-danger">*</span></label>
                    <select class="form-control  @error('category') is-invalid @enderror" id="category" name="category">
                        <option value="" disabled selected>-- Pilih Jenis --</option>
                        <option value="Okupasi" {{ old('category') == 'Okupasi' ? 'selected' : '' }}>Okupasi</option>
                        <option value="KKNI" {{ old('category') == 'KKNI' ? 'selected' : '' }}>KKNI</option>
                        <option value="Klaster" {{ old('category') == 'Klaster' ? 'selected' : '' }}>Klaster</option>
                    </select>
                    @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>"{{ $message }}"</strong>
                        </span>
                    @enderror
                </div>

                <label for="price" class="text-capitalize">Harga<span class="text-danger">*</span></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Rp.</div>
                    </div>
                    <input type="text" class="form-control  @error('price') is-invalid @enderror" id="price" name="price"
                        placeholder="Masukkan Harga" value="{{ old('price') }}">
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>"{{ $message }}"</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="unit" class="text-capitalize">Unit Kompetensi<span class="text-danger">*</span></label>
                    <input type="text" class="form-control  @error('unit') is-invalid @enderror" id="unit" name="unit"
                        placeholder="Masukkan Unit Kompetensi" value="{{ old('unit') }}">
                    @error('unit')
                        <span class="invalid-feedback" role="alert">
                            <strong>"{{ $message }}"</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="summary" class="text-capitalize">Ringkasan<span class="text-danger">*</span></label>
                    <textarea class="form-control  @error('summary') is-invalid @enderror" id="summary" name="summary"
                        placeholder="Masukkan Ringkasan" rows="5">{{ old('summary') }}</textarea>
                    @error('summary')
                        <span class="invalid-feedback" role="alert">
                            <strong>"{{ $message }}"</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cover" class="text-capitalize">Cover<span class="text-danger">*</span></label>
                    <input type="file" class="form-control-file  @error('cover') is-invalid @enderror" id="cover"
                        name="cover">
                    @error('cover')
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
