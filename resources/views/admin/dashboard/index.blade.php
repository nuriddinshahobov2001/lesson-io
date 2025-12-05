@extends('layout.app')
@section('title', 'Dashboard')

@section('content')
    <div class="p-6">
        @include('admin.dashboard.components.cards')
        @include('admin.dashboard.components.chart')
        @include('admin.dashboard.components.table')
    </div>
@endsection
