@extends('app.app')
@section('content')
    <h1>welcome to dashboard, {{ auth()->user()->name }}</h1>
@endsection
