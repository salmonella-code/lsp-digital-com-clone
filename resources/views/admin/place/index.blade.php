@extends('admin.layouts.app')
@section('pageTitle', 'Tempat Uji Kompetensi')

@section('content')
    <div class="card border-0 shadow">
        <div class="card-body">
            <a href="{{ route('place.create') }}" class="btn btn-success rounded-pill mb-3"><i
                    class="fas fa-fw fa-plus"></i>Tambah Tempat</a>
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
                            <th class="text-capitalize">nama</th>
                            <th class="text-capitalize">kode</th>
                            <th class="text-capitalize">provinsi</th>
                            <th class="text-capitalize">Kota/kab</th>
                            <th class="text-capitalize">alamat</th>
                            <th class="text-capitalize">telpon</th>
                            <th class="text-capitalize">opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($places as $key => $place)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $place->name }}</td>
                                <td>{{ $place->code }}</td>
                                <td>{{ $place->province }}</td>
                                <td>{{ $place->city }}</td>
                                <td>{{ Str::limit($place->address, 25) }}</td>
                                <td>{{ $place->contact }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('place.show', $place->id) }}"
                                            class="btn btn-sm btn-success"><i class="fas fa-fw fa-eye"></i></a>
                                        <a href="{{ route('place.destroy', $place->id) }}"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus tempat ini ?');"
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