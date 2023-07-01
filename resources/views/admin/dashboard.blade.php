@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
                <h2 class="alert alert-success"> {{session('message')}} </h2>
        @endif

    </div>
</div>

@endsection
