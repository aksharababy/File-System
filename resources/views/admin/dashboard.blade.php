@extends('layouts.admin.app')

@section('content')
<div class="container">

    <h3>Welcome to File System!</h3>

    <h5>You are Loggined as a {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h5>
</div>
@endsection
