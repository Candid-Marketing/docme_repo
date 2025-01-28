@extends('superadmin.dashboard')

@section('content')
<div class="main">
    <h1 class="mb-4">Manage Users</h1>
    <div class="container">
        <!-- Include the Livewire Component -->
        @livewire('admin-manage-users')
    </div>
</div>

@endsection
