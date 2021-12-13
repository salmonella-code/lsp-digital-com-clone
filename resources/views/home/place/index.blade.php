@extends('home.layouts.app')

@section('content')
    @foreach ($places->chunk(4) as $items)
        <div class="row m-3">
            @foreach ($items as $place)
                <div class="card mr-3 border-0 shadow" style="width: 18rem;">
                    <img src="{{ asset('images/license/' . $place->license) }}" class="card-img-top" alt="Cover">
                    <div class="card-body">
                        <h5 class="card-title">{{ $place->name }}</h5>
                        <p class="card-text">{{ Str::limit($place->address, 25) }}</p>
                        <a href="{{ route('user.place.show', $place->id) }}" class="btn btn-primary btn-block">Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
