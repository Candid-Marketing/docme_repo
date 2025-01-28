@extends('admin.dashboard')

@section('content')
<div class="main">
    <h1 class="mb-4">Manage Users</h1>
    <div class="container">
        @livewire('user-manage')
    </div>
</div>

@endsection
