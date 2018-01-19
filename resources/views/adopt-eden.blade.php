@extends('layouts.layout')

@section('content')
    @include('partials.adopt-eden')
@endsection

@section('scripts')
    <script src="{{ asset('js/adopt-eden.js') }}"></script>
@endsection