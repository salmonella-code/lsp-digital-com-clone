@extends('home.layouts.app')

@section('content')
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body">
                <div class="cover mx-auto shadow">
                    <img src="{{ asset('images/license/' . $place->license) }}" alt="gambar lisensi">
                </div>
                <div class="row mt-5">
                    <div class="col-lg-2 col">
                        <p class="font-weight-bold text-capitalize">nama</p>
                        <p class="font-weight-bold text-capitalize">kode</p>
                        <p class="font-weight-bold text-capitalize">desktipsi</p>
                        <p class="font-weight-bold text-capitalize">provinsi</p>
                        <p class="font-weight-bold text-capitalize">Kota/Kabupaten</p>
                        <p class="font-weight-bold text-capitalize">alamat</p>
                        <p class="font-weight-bold text-capitalize">No Hp</p>
                        <p class="font-weight-bold text-capitalize">email</p>
                    </div>
                    <div class="col">
                        <p class="text-capitalize"> : {{ $place->name }}</p>
                        <p class="text-uppercase"> : {{ $place->code }}</p>
                        <p class="text-capitalize"> : {{ $place->description }}</p>
                        <p class="text-capitalize"> : {{ $place->province }}</p>
                        <p class="text-capitalize"> : {{ $place->city }}</p>
                        <p class="text-capitalize"> : {{ $place->address }}</p>
                        <p class="text-capitalize"> : {{ $place->contact }}</p>
                        <p class="text-capitalize"> : {{ $place->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
