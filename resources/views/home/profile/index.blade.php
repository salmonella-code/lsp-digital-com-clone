@extends('home.layouts.app')

@section('content')
    <div class="container-fluid show">
        {!! $profile->description !!}
    </div>
@endsection
