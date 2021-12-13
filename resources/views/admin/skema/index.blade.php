@extends('admin.layouts.app')
@section('pageTitle', 'Skema')

@section('content')
    <div class="card border-0 shadow">
        <div class="card-body">
            <a href="{{ route('skema.create') }}" class="btn btn-success rounded-pill mb-3"><i
                    class="fas fa-fw fa-plus"></i>Tambah Skema</a>
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
                            <th class="text-capitalize">jenis</th>
                            <th class="text-capitalize">harga</th>
                            <th class="text-capitalize">unit kompetensi</th>
                            <th class="text-capitalize">ringkasan</th>
                            <th class="text-capitalize">opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($skemas as $key => $skema)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $skema->name }}</td>
                                <td>{{ $skema->code }}</td>
                                <td>{{ $skema->category }}</td>
                                <td>@idr($skema->price)</td>
                                <td>{{ $skema->unit }}</td>
                                <td>{{ Str::limit($skema->summary, 25) }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('skema.show', $skema->id) }}"
                                            class="btn btn-sm btn-success"><i class="fas fa-fw fa-eye"></i></a>
                                        <a href="{{ route('skema.edit', $skema->id) }}"
                                            class="btn btn-sm btn-warning"><i class="fas fa-fw fa-edit text-white"></i></a>
                                        <a href="{{ route('skema.destroy', $skema->id) }}"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus skema ini ?');"
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