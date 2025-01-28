<div class="d-flex flex-row">
    <div class="navigation">
        <ul id="menu">
            <li>
                <a href="#">
                    <span class="icon center">
                        <img src="{{ asset('imgs/profile.png') }}" alt="Logo" class="logo" />
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <span class="icon">
                        <ion-icon name="grid-outline"></ion-icon>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.manage') }}">
                    <span class="icon">
                        <ion-icon name="people-outline"></ion-icon>
                    </span>
                    <span class="title">Users</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="folder-outline"></ion-icon>
                    </span>
                    <span class="title">File Manager</span>
                </a>
            </li>
            <li>
                <a href="{{ route('superadmin.stripe') }}">
                    <span class="icon">
                        <ion-icon name="cash-outline"></ion-icon>
                    </span>
                    <span class="title">Billing</span>
                </a>
            </li>
            <li>
                <a href="{{ route('superadmin.homepage') }}">
                    <span class="icon">
                        <ion-icon name="file-tray-stacked-outline"></ion-icon>
                    </span>
                    <span class="title">Invoice</span>
                </a>
            </li>
            <hr class="divider">
            <li class="nav-item dropdown">
                <a
                    href="#"
                    id="settingsDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >
                    <span class="icon">
                        <ion-icon name="settings-outline"></ion-icon>
                    </span>
                    <span class="title">Settings</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="settingsDropdown">
                    <li style="margin-bottom: 10px;">
                        <a class="dropdown-item" href="#">Profile</a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a class="dropdown-item" href="#">Account Settings</a>
                    </li style="margin-bottom: 10px;">
                    <li style="margin-bottom: 10px;">
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="help-circle-outline"></ion-icon>
                    </span>
                    <span class="title">Help</span>
                </a>
            </li>
            <hr class="divider">

            <!-- User Profile inside the <ul> -->
                <li class="user-profile">
                    <a href="#">
                        <span class="icon">
                            <img src="{{ auth()->user()->profile_picture ?? asset('imgs/profile.png') }}" alt="User Photo" class="user-photo">
                        </span>
                        <span class="title">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
                    </a>
                    <div class="user-details">
                        <p class="user-role">Role: <strong>{{ auth()->user()->user_status == 1 ? 'Super Admin' : (auth()->user()->user_status == 2 ? 'Admin' : 'User') }}</strong></p>
                    </div>
                </li>
        </ul>
    </div>
    <div class="content-wrapper" style="margin-left: 250px; width: calc(100% - 250px);">
        <!-- Top Navbar -->
        <nav class="navbar navbar-light bg-light fixed-top d-flex justify-content-between">
            <!-- Toggle Button (on the left side) -->
            <div class="d-flex align-items-center">
                <div class="toggle me-2">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>

            <!-- User Profile (on the right side) -->
            <div class="d-flex align-items-center">
                <div class="dropdown">
                    <a
                        class="nav-link dropdown-toggle d-flex align-items-center"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <img
                            src="{{ auth()->user()->profile_picture ?? asset('imgs/profile.png') }}"
                            alt="User Photo"
                            class="rounded-circle me-2"
                            style="height: 30px; width: 30px; object-fit: cover;"
                        />
                        <span class="d-none d-md-inline">{{ auth()->user()->first_name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="#">Profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Settings</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout.show') }}">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
