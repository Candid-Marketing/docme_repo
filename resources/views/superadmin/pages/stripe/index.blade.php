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

        <!-- Update Stripe Configuration Form -->
        <form method="POST" action="{{ route('superadmin.stripe-update') }}">
            @csrf
            @method('POST')
            <input type="hidden" name="id" value="{{ $stripe->id ?? '' }}">
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-signature"></i>
                        </span>
                        <input type="text" class="form-control" name="name" value="{{ $stripe->name ?? '' }}" placeholder="Name">
                    </div>
                </div>
                <div class="col-md-4 offset-md-2">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-key"></i>
                        </span>
                        <input type="text" class="form-control" name="stripe_key" value="{{ $stripe->stripe_key ?? '' }}" placeholder="Stripe Key">
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-user-secret"></i>
                        </span>
                        <input type="text" class="form-control" name="stripe_secret" value="{{ $stripe->stripe_secret ?? '' }}" placeholder="Stripe Secret">
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="row mt-4">
                <div class="col-md-4 offset-md-4">
                    <button type="submit" class="btn btn-primary w-100">Update Configuration</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
