@extends('layouts.app')

@section('content')
<div class="container">
    <h1>House Details</h1>
    <p><strong>Address:</strong> {{ $house->address }}</p>
    <p><strong>Status:</strong> {{ $house->status }}</p>
</div>
@endsection
