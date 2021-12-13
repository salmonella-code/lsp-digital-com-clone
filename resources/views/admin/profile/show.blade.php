@extends('admin.layouts.app')

@section('pageTitle', 'profile')

@section('content')
    <div class="card border-0 shadow">
        <div class="card-body show">
            {!! $profile->description !!}
        </div>
    </div>
@endsection