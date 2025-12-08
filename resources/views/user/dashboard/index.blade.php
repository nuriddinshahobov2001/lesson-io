@extends('layout.app')

@section('content')
    <div class="p-6">
        @include('user.dashboard.components.card')
        @include('user.dashboard.components.chart')
    </div>
@endsection
