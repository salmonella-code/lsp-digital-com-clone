@extends('home.layouts.app')

@section('content')
    @foreach ($skemas->chunk(4) as $items)
        <div class="row m-3">
            @foreach ($items as $skema)
                <div class="card mr-3 border-0 shadow" style="width: 18rem;">
                    <img src="{{ asset('images/cover/' . $skema->cover) }}" class="card-img-top" alt="Cover">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">{{ $skema->name }}</h5>
                        <p class="card-text">{{ Str::limit($skema->summary, 50) }}</p>
                        <a href="{{ route('user.skema.show', $skema->id) }}" class="btn btn-primary btn-block">Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
