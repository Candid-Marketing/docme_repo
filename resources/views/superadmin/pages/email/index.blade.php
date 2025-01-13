@extends('superadmin.dashboard')

@section('content')
<div class="main">
    <div class="container">
        <h1 class="mt-4 h1-title">Email Settings</h1>
        <div class="row">
            <div class="col-md-4">
                <h5 class="">My Profile</h5>
            </div>
            <div class="col-md-4">

                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                    Edit Profile
                </button>
            </div>
        </div>
        <div class="row mt-4">

            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-signature"></i>
                    </span>
                    <input type="text" class="form-control" id="searchInput" placeholder="DRIVER">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-signature"></i>
                    </span>
                    <input type="text" class="form-control" id="searchInput" placeholder="HOST">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-signature"></i>
                    </span>
                    <input type="text" class="form-control" id="searchInput" placeholder="PORT">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-signature"></i>
                    </span>
                    <input type="text" class="form-control" id="searchInput" placeholder="USER">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-signature"></i>
                    </span>
                    <input type="text" class="form-control" id="searchInput" placeholder="PASSWORD">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-signature"></i>
                    </span>
                    <input type="text" class="form-control" id="searchInput" placeholder="SENDER NAME">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-signature"></i>
                    </span>
                    <input type="text" class="form-control" id="searchInput" placeholder="SENDER Email">
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="editDriver" class="form-label">Driver</label>
                                <input type="text" class="form-control" id="editDriver" placeholder="Enter driver">
                            </div>
                            <div class="mb-3">
                                <label for="editHost" class="form-label">Host</label>
                                <input type="text" class="form-control" id="editHost" placeholder="Enter host">
                            </div>
                            <div class="mb-3">
                                <label for="editPort" class="form-label">Port</label>
                                <input type="text" class="form-control" id="editPort" placeholder="Enter port">
                            </div>
                            <div class="mb-3">
                                <label for="editUser" class="form-label">User</label>
                                <input type="text" class="form-control" id="editUser" placeholder="Enter user">
                            </div>
                            <div class="mb-3">
                                <label for="editPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="editPassword" placeholder="Enter password">
                            </div>
                            <div class="mb-3">
                                <label for="editSenderName" class="form-label">Sender Name</label>
                                <input type="text" class="form-control" id="editSenderName" placeholder="Enter sender name">
                            </div>
                            <div class="mb-3">
                                <label for="editSenderEmail" class="form-label">Sender Email</label>
                                <input type="email" class="form-control" id="editSenderEmail" placeholder="Enter sender email">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
