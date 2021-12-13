@extends('admin.layouts.app')
@section('pageTitle', 'Visi Misi')

@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{ route('intro.create') }}" class="btn btn-success rounded-pill mb-3"><i class="fas fa-fw fa-plus"></i>Tambah Visi Misi</a>
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
                        <th class="text-capitalize">deskripsi</th>
                        <th class="text-capitalize">opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($intros as $key => $intro)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td class="text-capitalize ck-table">{!! Str::limit( strip_tags($intro->description), 50) !!}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('intro.show', $intro->id) }}" class="btn btn-sm btn-success"><i class="fas fa-fw fa-eye"></i></a>
                                    <a href="{{ route('intro.edit', $intro->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-edit text-white"></i></a>
                                    <a href="{{ route('intro.destroy', $intro->id) }}"
                                        onclick="return confirm('Apakah anda yakin ingin menhapus intro ini ?');"
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
@endsection
