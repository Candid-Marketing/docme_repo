@extends('user.dashboard')

@section('content')
<div class="main">
    <div class="topbar">
        <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
        </div>
    </div>
    <h1 class=""> Guest Dashboard</h1>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 mt-5">
                <h5 class="mt-4">WELCOME</h5>
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <p class="mt-4">
                    Hello dolor sit amet, consectetur adipiscing elit. <br>
                    Sed pulvinar massa non enim interdum
                </p>
            </div>
            <div class="col-md-4 offset-md-2">
                <h5 class="mt-4">HOW IT WORK?</h5>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <p class="mt-4">What do you want to do today ?
                </p>
            </div>
            <div class="col-md-4 offset-md-2">
                <p class="mt-4">Watch our video tutorial </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p class="mt-4"><a href="#" class="text-decoration-none">Edit Profile</a></p>
                <p class="mt-4"><a href="#" class="text-decoration-none">View your Files</a></p>
                <p class="mt-4"><a href="#" class="text-decoration-none"></a></p>
                <p class="mt-4"><a href="#" class="text-decoration-none">Help Topics</a></p>
            </div>

            <div class="col-md-4 offset-md-2">
                <h5 class="mt-4">Video Tutorial</h5>
                <!-- YouTube Video Embed -->
                <div class="ratio ratio-16x9 mt-3">
                    <iframe
                    src="https://www.youtube.com/embed/QPORKS-sbXo"
                        title="YouTube video"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
        {{-- Put some livewire on this part  --}}

    </div>
</div>
@endsection
