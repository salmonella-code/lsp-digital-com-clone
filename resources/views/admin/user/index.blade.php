@extends('admin.layouts.app')

@section('pageTitle', 'User')
@section('content')
    <div class="card border-0 shadow">
        <div class="card-body">
            <button type="button" class="btn btn-success mb-3 rounded-pill" data-toggle="modal"
                data-target="#staticBackdrop">
                <i class="fas fa-fw fa-plus"></i> Tambah user
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
                            <th class="text-capitalize">email</th>
                            <th class="text-capitalize">foto</th>
                            <th class="text-capitalize">opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td class="text-capitalize">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="wrapper-lg-img shadow mx-auto">
                                        <img src="{{ asset('admin/avatar/' . $user->avatar) }}" alt="foto user">
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-sm btn-warning modalEditUser" data-toggle="modal"
                                            data-target="#editUser" value="{{ $user->id }}">
                                            <i class="fas fa-fw fa-edit text-white"></i>
                                        </button>
                                        <a href="{{ route('user.destroy', $user->id) }}"
                                            onclick="return confirm('Apakah anda yakin ingin menhapus user ini ?');"
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

    {{-- modal tambah user --}}
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.store') }}" method="post">
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
                            <label for="email" class="text-capitalize">email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="Masukkan email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>"{{ $message }}"</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="contact" class="text-capitalize">Nomor Telpon<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control  @error('contact') is-invalid @enderror" id="contact"
                                name="contact" placeholder="Masukkan Nomor Telpon" value="{{ old('contact') }}">
                            @error('contact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>"{{ $message }}"</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address" class="text-capitalize">alamat<span class="text-danger">*</span></label>
                            <input type="text" class="form-control  @error('address') is-invalid @enderror" id="address"
                                name="address" placeholder="Masukkan alamat" value="{{ old('address') }}">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>"{{ $message }}"</strong>
                                </span>
                            @enderror
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
    {{-- end modal tambah user --}}

    {{-- modal edit user --}}
    <div class="modal fade" id="editUser" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.update') }}" method="post">
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
                            <label for="email" class="text-capitalize">email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" id="editEmail"
                                name="email" placeholder="Masukkan email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>"{{ $message }}"</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="contact" class="text-capitalize">Nomor Telpon<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control  @error('contact') is-invalid @enderror" id="editContact"
                                name="contact" placeholder="Masukkan Nomor Telpon" value="{{ old('contact') }}">
                            @error('contact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>"{{ $message }}"</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address" class="text-capitalize">alamat<span class="text-danger">*</span></label>
                            <input type="text" class="form-control  @error('address') is-invalid @enderror" id="editAddress"
                                name="address" placeholder="Masukkan alamat" value="{{ old('address') }}">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>"{{ $message }}"</strong>
                                </span>
                            @enderror
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
    {{-- end modal edit user --}}
@endsection
