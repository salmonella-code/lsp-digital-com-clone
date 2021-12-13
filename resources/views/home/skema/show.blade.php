@extends('home.layouts.app')

@section('content')
    <div class="container py-5">
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="cover mx-auto shadow">
                    <img src="{{ asset('images/cover/' . $skema->cover) }}" alt="gambar skema">
                </div>
                <div class="row mt-5">
                    <div class="col-lg-2 col">
                        <p class="font-weight-bold text-capitalize">nama</p>
                        <p class="font-weight-bold text-capitalize">kode</p>
                        <p class="font-weight-bold text-capitalize">kategori</p>
                        <p class="font-weight-bold text-capitalize">harga</p>
                        <p class="font-weight-bold text-capitalize">unit kompetensi</p>
                        <p class="font-weight-bold text-capitalize">ringkasan</p>
                    </div>
                    <div class="col">
                        <p class="text-capitalize"> : {{ $skema->name }}</p>
                        <p class="text-uppercase"> : {{ $skema->code }}</p>
                        <p class="text-capitalize"> : {{ $skema->category }}</p>
                        <p class="text-capitalize"> : @idr($skema->price)</p>
                        <p class="text-capitalize"> : {{ $skema->unit }}</p>
                        <p class="text-capitalize"> : {{ $skema->summary }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
