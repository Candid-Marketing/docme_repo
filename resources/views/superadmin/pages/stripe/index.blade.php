@extends('superadmin.dashboard')

@section('content')
<div class="main">
    <div class="topbar">
        <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
        </div>
    </div>
    <div class="container">
        <h1 class="mt-4 h1-title">Admin Finance</h1>
        <h5 class="mt-4">Stripe Setting</h5>
        <div class="row">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-signature"></i>
                    </span>
                    <input type="text" class="form-control" id="searchInput" placeholder="Name">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-key"></i>
                    </span>
                    <input type="text" class="form-control" id="searchInput" placeholder="Stripe Key">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-user-secret"></i>
                    </span>
                    <input type="text" class="form-control" id="searchInput" placeholder="Stripe Secret">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
