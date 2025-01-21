@extends('superadmin.dashboard')

@section('content')
<div class="main">
    <div class="topbar">
        <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
        </div>
    </div>
    <h1 class="mb-4">Manage Users</h1>
    <div class="container">
        <!-- Include the Livewire Component -->
        @livewire('admin-manage-users')
    </div>
</div>

@endsection
