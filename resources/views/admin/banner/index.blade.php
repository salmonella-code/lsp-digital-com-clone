@extends('admin.layouts.app')

@section('pageTitle', 'Banner')
@section('content')
    <div class="card border-0 shadow">
        <div class="card-body">
            <button type="button" class="btn btn-success mb-3 rounded-pill" data-toggle="modal"
                data-target="#staticBackdrop">
                <i class="fas fa-fw fa-plus"></i> Tambah banner
            </button>

            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr class="bg-blue">
                            <th class="text-capitalize">No</th>
                            <th class="text-capitalize">Nama</th>
                            <th class="text-capitalize">foto</th>
                            <th class="text-capitalize">opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $key => $banner)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td class="text-capitalize">{{ $banner->name }}</td>
                                <td>
                                    <div class="wrapper-lg-img shadow mx-auto">
                                        <img src="{{ asset('images/banner/' . $banner->image) }}" alt="foto user">
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-sm btn-warning modalEditBanner"
                                            data-toggle="modal" data-target="#editBanner" value="{{ $banner->id }}">
                                            <i class="fas fa-fw fa-edit text-white"></i>
                                        </button>
                                        <a href="{{ route('banner.destroy', $banner->id) }}"
                                            onclick="return confirm('Apakah anda yakin ingin menhapus banner ini ?');"
                                            class="btn btn-sm btn-danger py-auto"><i class="fas fa-fw fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- modal tambah banner --}}
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah banner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="text-capitalize">nama<span class="text-danger">*</span></label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Masukkan nama" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>"{{ $message }}"</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">image<span class="text-danger">*</span><br><small><i>Format: jpeg,png,jpg;
                                        Max: 2Mb</i></small></label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary rounded-pill">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal tambah banner --}}

    {{-- modal Edit Banner --}}
    <div class="modal fade" id="editBanner" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Banner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('banner.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editId" name="editId">
                        <div class="form-group">
                            <label for="name" class="text-capitalize">nama<span class="text-danger">*</span></label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="editName"
                                name="name" placeholder="Masukkan nama" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>"{{ $message }}"</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">image<span class="text-danger">*</span><br><small><i>Format: jpeg,png,jpg;
                                        Max: 2Mb</i></small></label>
                            <div class="wrapper-lg-img shadow mx-auto mb-3">
                                <img src="" alt="foto user" id="editImage">
                            </div>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary rounded-pill">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal Edit Banner --}}
@endsection
