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
            <a href="{{ route('superadmin.dashboard') }}">
                <span class="icon">
                    <ion-icon name="grid-outline"></ion-icon>
                </span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#">
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
                    <ion-icon name="card-outline"></ion-icon>
                </span>
                <span class="title">Finance</span>
            </a>
        </li>
        <li>
            <a href="{{ route('superadmin.homepage') }}">
                <span class="icon">
                    <ion-icon name="planet-outline"></ion-icon>
                </span>
                <span class="title">Homepage</span>
            </a>
        </li>
        <li>
            <a href="{{ route('superadmin.email') }}">
                <span class="icon">
                    <ion-icon name="mail-outline"></ion-icon>
                </span>
                <span class="title">Email</span>
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
                    <li style="margin-bottom: 10px;"z>
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
                    <p class="user-role">Role: <strong>{{ auth()->user()->user_status == 1 ? 'Admin' : (auth()->user()->user_status == 2 ? 'User' : 'Guest') }}</strong></p>
                </div>
            </li>
    </ul>
</div>
