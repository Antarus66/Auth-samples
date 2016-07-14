@extends('layouts.app')

@section('content')
    <p>Cookie should contain: {{ $counter }}</p>
    <p><a href="/cookie-sample/raw/unset">Unset cookie</a></p>
@endsection
