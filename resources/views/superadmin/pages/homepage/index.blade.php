@extends('superadmin.dashboard')

@section('content')
<div class="main">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10">
            <h1 class="mt-4 h1-title">Admin | Home Page CRM</h1>
            <script>
                @if(session('success'))
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: '{{ session('success') }}',
                        confirmButtonText: 'OK'
                    });
                @endif
            </script>
            <div class="container mt-4">
                <div class="row text-center">
                    <div class="col-md-6 mb-3">
                        <button type="button" class="btn btn-primary btn-lg d-flex align-items-center justify-content-center w-100" data-bs-toggle="modal" data-bs-target="#homeSettingsModal">
                            <i class="fas fa-home me-2"></i> Edit Home Form
                        </button>
                    </div>
                    <div class="col-md-6 mb-3">
                        <button type="button" class="btn btn-success btn-lg d-flex align-items-center justify-content-center w-100" data-bs-toggle="modal" data-bs-target="#aboutUsModal">
                            <i class="fas fa-info-circle me-2"></i> Edit About Us Form
                        </button>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-md-6 mb-3">
                        <button type="button" class="btn btn-warning btn-lg d-flex align-items-center justify-content-center w-100" data-bs-toggle="modal" data-bs-target="#featureModal">
                            <i class="fas fa-cogs me-2"></i> Edit Feature Form
                        </button>
                    </div>
                    <div class="col-md-6 mb-3">
                        <button type="button" class="btn btn-info btn-lg d-flex align-items-center justify-content-center w-100" data-bs-toggle="modal" data-bs-target="#servicesModal">
                            <i class="fas fa-concierge-bell me-2"></i> Edit Services
                        </button>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-md-6 mb-3">
                        <button type="button" class="btn btn-danger btn-lg d-flex align-items-center justify-content-center w-100" data-bs-toggle="modal" data-bs-target="#pricingModal">
                            <i class="fas fa-dollar-sign me-2"></i> Edit Pricing
                        </button>
                    </div>
                    <div class="col-md-6 mb-3">
                        <button type="button" class="btn btn-secondary btn-lg d-flex align-items-center justify-content-center w-100" data-bs-toggle="modal" data-bs-target="#contactModal">
                            <i class="fas fa-envelope me-2"></i> Edit Contact
                        </button>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-md-6 offset-md-3">
                        <button type="button" class="btn btn-dark btn-lg d-flex align-items-center justify-content-center w-100" data-bs-toggle="modal" data-bs-target="#footerModal">
                            <i class="fas fa-border-all me-2"></i> Edit Footer
                        </button>
                    </div>
                </div>
            </div>
            {{-- Home modal --}}
            <div class="modal fade" id="homeSettingsModal" tabindex="-1" aria-labelledby="homeSettingsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="homeSettingsModalLabel">Home Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('superadmin.homestore') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="section" value="home">
                                <!-- Favicon Section -->
                                <div class="mb-4">
                                    <h5>FAV ICON</h5>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-upload"></i>
                                        </span>
                                        <input type="file" name="favicon_image" class="form-control" id="fileInput10" accept="image/*">
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                        <img id="previewImage10"
                                             src="{{ old('favicon_image', asset($homepage->where('name', 'favicon_image')->first()->image_path ?? 'imgs/image_logo.png')) }}"
                                             alt="Favicon Image" class="img-thumbnail"
                                             style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                                        <div>
                                            <small class="d-block text-muted">Image Recommendations: 50x50px</small>
                                        </div>
                                    </div>
                                </div>
                                <!-- Navbar Logo -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <h5>NAVBAR LOGO</h5>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-upload"></i>
                                            </span>
                                            <input type="file" name="nav_image" class="form-control" id="fileInput" accept="image/*">
                                        </div>
                                        <div class="d-flex align-items-center mt-2">
                                            <img id="previewImage"
                                                  src="{{ old('nav_image', asset($homepage->where('name', 'nav_image')->first()->image_path ?? 'imgs/image_logo.png')) }}"
                                                 alt="Navbar Logo" class="img-thumbnail"
                                                 style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                                            <div>
                                                <small class="d-block text-muted">Image Recommendations: 50x50px</small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Home Title -->
                                    <div class="col-md-6">
                                        <h5>HOME TITLE</h5>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <textarea class="form-control" name="home_title" id="searchInput" placeholder="{{ old('home_title', $homepage->where('name', 'home_title')->first()->content ?? '') }}">{{ old('home_title', $homepage->where('name', 'home_title')->first()->content ?? '') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Home Page Image and Description -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <h5>HOME PAGE IMAGE</h5>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-upload"></i>
                                            </span>
                                            <input type="file" name="home_image" class="form-control" id="fileInput2" accept="image/*">
                                        </div>
                                        <div class="d-flex align-items-center mt-2">
                                            <img id="previewImage2"
                                                 src="{{ old('home_image', asset($homepage->where('name', 'home_image')->first()->image_path ?? 'imgs/image_logo.png')) }}"
                                                 alt="Home Page Image" class="img-thumbnail"
                                                 style="width: 200px; height: 200px; object-fit: cover; margin-right: 10px;">
                                            <div>
                                                <small class="d-block text-muted">Image Recommendations: 200x200px</small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Home Description -->
                                    <div class="col-md-6">
                                        <h5>HOME DESCRIPTION</h5>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <textarea class="form-control" name="home_description" id="homeDescription" value ="{{ old('home_subtitle', $homepage->where('name', 'home_subtitle')->first()->content ?? '') }}">{{ old('home_subtitle', $homepage->where('name', 'home_subtitle')->first()->content ?? '') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer text-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About us Modal -->
            <div class="modal fade" id="aboutUsModal" tabindex="-1" aria-labelledby="aboutUsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="aboutUsModalLabel">Edit About Us Section</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('superadmin.homestore') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="section" value="about_us">
                                <!-- About Us Title and Description -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="homeDescription1" class="form-label">About Us Title</label>
                                        <textarea class="form-control" name="about_us_title" id="homeDescription1" value ="{{ old('about_us_title', $homepage->where('name', 'about_us_title')->first()->content ?? '') }}"rows="3" required>{{ old('about_us_title', $homepage->where('name', 'about_us_title')->first()->content ?? '') }}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="homeDescription2" class="form-label">About Us Description</label>
                                        <textarea class="form-control" name="about_us_description" id="homeDescription2" rows="3" value="{{ old('about_us_description', $homepage->where('name', 'about_us_description')->first()->content ?? '') }}" required>{{ old('about_us_description', $homepage->where('name', 'about_us_description')->first()->content ?? '') }}</textarea>
                                    </div>
                                </div>

                                <!-- About Us Image -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="aboutUsImage" class="form-label">About Us Image</label>
                                        <input type="file" class="form-control" name="about_us_image" id="aboutUsImage" accept="image/*">
                                        <div class="d-flex align-items-center mt-2">
                                            <img id="previewAboutUsImage"
                                            src="{{ old('about_us_image', asset($homepage->where('name', 'about_us_image')->first()->image_path ?? 'imgs/image_logo.png')) }}"
                                            class="img-thumbnail"
                                                style="width: 200px; height: 200px; object-fit: cover; margin-right: 10px;">
                                            <div>
                                                <small class="text-muted">Recommendations: 200x200px</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- About Us Feature List -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="aboutUsList1" class="form-label">Feature List 1</label>
                                        <textarea class="form-control" name="about_us_list1" id="aboutUsList1" rows="3" value="{{ old('about_us_list1', $homepage->where('name', 'about_us_list1')->first()->content ?? '') }}">{{ old('about_us_list1', $homepage->where('name', 'about_us_list1')->first()->content ?? '') }}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="aboutUsList2" class="form-label">Feature List 2</label>
                                        <textarea class="form-control" name="about_us_list2" id="aboutUsList2" rows="3" value="{{ old('about_us_list2', $homepage->where('name', 'about_us_list2')->first()->content ?? '') }}">{{ old('about_us_list2', $homepage->where('name', 'about_us_list2')->first()->content ?? '') }}</textarea>
                                    </div>
                                </div>

                                <!-- About Us Images -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="aboutUsImage1" class="form-label">About Us Image 1</label>
                                        <input type="file" class="form-control" name="about_us_image1" id="aboutUsImage1" accept="image/*">
                                        <div class="d-flex align-items-center mt-2">
                                            <img id="previewAboutUsImage1"
                                            src="{{ old('about_us_image1', asset($homepage->where('name', 'about_us_image1')->first()->image_path ?? 'imgs/image_logo.png')) }}"
                                            class="img-thumbnail"
                                                style="width: 200px; height: 200px; object-fit: cover; margin-right: 10px;">
                                            <div>
                                                <small class="text-muted">Recommendations: 200x200px</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="aboutUsImage2" class="form-label">About Us Image 2</label>
                                        <input type="file" class="form-control" name="about_us_image2" id="aboutUsImage2" accept="image/*">
                                        <div class="d-flex align-items-center mt-2">
                                            <img id="previewAboutUsImage2"
                                            src="{{ old('about_us_image2', asset($homepage->where('name', 'about_us_image2')->first()->image_path ?? 'imgs/image_logo.png')) }}"
                                             class="img-thumbnail"
                                                style="width: 200px; height: 200px; object-fit: cover; margin-right: 10px;">
                                            <div>
                                                <small class="text-muted">Recommendations: 200x200px</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer text-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          <!-- Feature Modal -->
            <div class="modal fade" id="featureModal" tabindex="-1" aria-labelledby="featureModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="featureModalLabel">Feature Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('superadmin.homestore') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" name="section" value="feature">
                                <!-- Feature Title and Description -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="featureTitle" class="form-label">Feature Title</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <textarea class="form-control" name="feature_title" id="featureTitle" rows="3" placeholder="Enter feature title" required value="{{ old('feature_title', $homepage->where('name', 'feature_title')->first()->content ?? '') }}">{{ old('feature_title', $homepage->where('name', 'feature_title')->first()->content ?? '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="featureDescription" class="form-label">Feature Description</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <textarea class="form-control" name="feature_description" id="featureDescription" rows="3" placeholder="Enter feature description" required value="{{ old('feature_description', $homepage->where('name', 'feature_description')->first()->content ?? '') }}">{{ old('feature_description', $homepage->where('name', 'feature_description')->first()->content ?? '') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Navigation Titles -->
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label for="navigation1" class="form-label">Navigation Bar 1</label>
                                        <textarea class="form-control" name="feat_nav1" id="navigation1" rows="2" placeholder="Enter navigation title" required value="{{ old('feat_nav1', $homepage->where('name', 'feat_nav1')->first()->content ?? '') }}"> {{ old('feat_nav1', $homepage->where('name', 'feat_nav1')->first()->content ?? '') }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="navigation2" class="form-label">Navigation Bar 2</label>
                                        <textarea class="form-control" name="feat_nav2" id="navigation2" rows="2" placeholder="Enter navigation title" required value="{{ old('feat_nav1', $homepage->where('name', 'feat_nav1')->first()->content ?? '') }}">{{ old('feat_nav2', $homepage->where('name', 'feat_nav2')->first()->content ?? '') }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="navigation3" class="form-label">Navigation Bar 3</label>
                                        <textarea class="form-control" name="feat_nav3" id="navigation3" rows="2" placeholder="Enter navigation title" required>{{ old('feat_nav3', $homepage->where('name', 'feat_nav3')->first()->content ?? '') }}</textarea>
                                    </div>
                                </div>

                                <!-- Navigation Images -->
                                <div class="row mb-4">
                                    <div class="col-md-4 text-center">
                                        <label for="fileInput1" class="form-label">Navigation Image 1</label>
                                        <input type="file" name="nav_image1" class="form-control" id="fileInput1" accept="image/*" required>
                                        <img id="previewImage1" \
                                        src="{{ old('nav_image1', asset($homepage->where('name', 'nav_image1')->first()->image_path ?? 'imgs/image_logo.png')) }}"
                                        alt="Preview"
                                        class="img-thumbnail mt-2"
                                        style="width: 150px; height: 150px; object-fit: cover;">
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <label for="fileInput2" class="form-label">Navigation Image 2</label>
                                        <input type="file" name="nav_image2" class="form-control" id="fileInput2" accept="image/*" required>
                                        <img id="previewImage2"
                                          src="{{ old('nav_image2', asset($homepage->where('name', 'nav_image2')->first()->image_path ?? 'imgs/image_logo.png')) }}"
                                        alt="Preview"
                                        class="img-thumbnail mt-2"
                                         style="width: 150px; height: 150px; object-fit: cover;">
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <label for="fileInput3" class="form-label">Navigation Image 3</label>
                                        <input type="file" name="nav_image3" class="form-control" id="fileInput3" accept="image/*" required>
                                        <img id="previewImage3"
                                        src="{{ old('nav_image3', asset($homepage->where('name', 'nav_image3')->first()->image_path ?? 'imgs/image_logo.png')) }}"
                                         alt="Preview"
                                         class="img-thumbnail mt-2"
                                          style="width: 150px; height: 150px; object-fit: cover;">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label for="navDesc1" class="form-label">Navigation Title 1</label>
                                        <textarea class="form-control" name="nav_title1" id="navDesc1" rows="3" placeholder="Enter navigation description" required value="{{ old('nav_title1', $homepage->where('name', 'nav_title1')->first()->content ?? '') }}">{{ old('nav_title1', $homepage->where('name', 'nav_title1')->first()->content ?? '') }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="navDesc2" class="form-label">Navigation Title 2</label>
                                        <textarea class="form-control" name="nav_title2" id="navDesc2" rows="3" placeholder="Enter navigation description" required value="{{ old('nav_title2', $homepage->where('name', 'nav_title2')->first()->content ?? '') }}">{{ old('nav_title2', $homepage->where('name', 'nav_title2')->first()->content ?? '') }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="navDesc3" class="form-label">Navigation Title 3</label>
                                        <textarea class="form-control" name="nav_title3" id="navDesc3" rows="3" placeholder="Enter navigation description" required value ="{{ old('nav_title3', $homepage->where('name', 'nav_title3')->first()->content ?? '') }}">{{ old('nav_title3', $homepage->where('name', 'nav_title3')->first()->content ?? '') }}</textarea>
                                    </div>
                                </div>

                                <!-- Navigation Descriptions -->
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label for="navDesc1" class="form-label">Navigation Description 1</label>
                                        <textarea class="form-control" name="nav_desc1" id="navDesc1" rows="3" placeholder="Enter navigation description" required value ="{{ old('nav_desc1', $homepage->where('name', 'nav_desc1')->first()->content ?? '') }}">{{ old('nav_desc1', $homepage->where('name', 'nav_desc1')->first()->content ?? '') }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="navDesc2" class="form-label">Navigation Description 2</label>
                                        <textarea class="form-control" name="nav_desc2" id="navDesc2" rows="3" placeholder="Enter navigation description" required value="{{ old('nav_desc2', $homepage->where('name', 'nav_desc2')->first()->content ?? '') }}">{{ old('nav_desc2', $homepage->where('name', 'nav_desc2')->first()->content ?? '') }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="navDesc3" class="form-label">Navigation Description 3</label>
                                        <textarea class="form-control" name="nav_desc3" id="navDesc3" rows="3" placeholder="Enter navigation description" required value="{{ old('nav_desc3', $homepage->where('name', 'nav_desc3')->first()->content ?? '') }}">{{ old('nav_desc3', $homepage->where('name', 'nav_desc3')->first()->content ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Services Modal --}}
            <div class="modal fade" id="servicesModal" tabindex="-1" aria-labelledby="servicesSettingsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="homeSettingsModalLabel">Services Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('superadmin.homestore') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="section" value="service">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="featureTitle" class="form-label">Service Title </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <textarea class="form-control" name="service_title" id="featureTitle" rows="3" placeholder="Enter feature title" required value="{{ old('service_title', $homepage->where('name', 'service_title')->first()->content ?? '') }}">{{ old('service_title', $homepage->where('name', 'service_title')->first()->content ?? '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="featureDescription" class="form-label">Service Description </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <textarea class="form-control" name="service_description" id="featureDescription" rows="3" placeholder="Enter feature description" required value="{{ old('service_description', $homepage->where('name', 'service_description')->first()->content ?? '') }}">{{ old('service_description', $homepage->where('name', 'service_description')->first()->content ?? '') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row mb-4">
                                        <div class="col-md-3">
                                            <label for="serviceTitle1" class="form-label">Service Title 1</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fas fa-key"></i>
                                                </span>
                                                <textarea class="form-control" name="services_title1" id="serviceTitle1" rows="3" placeholder="Enter feature title" required>{{ old('services_title1', $homepage->where('name', 'services_title1')->first()->content ?? '') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="serviceTitle2" class="form-label">Service Title 2</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fas fa-key"></i>
                                                </span>
                                                <textarea class="form-control" name="services_title2" id="serviceTitle2" rows="3" placeholder="Enter feature title" required>{{ old('services_title2', $homepage->where('name', 'services_title2')->first()->content ?? '') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="serviceTitle3" class="form-label">Service Title 3</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fas fa-key"></i>
                                                </span>
                                                <textarea class="form-control" name="services_title3" id="serviceTitle3" rows="3" placeholder="Enter feature title" required>{{ old('services_title3', $homepage->where('name', 'services_title3')->first()->content ?? '') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="serviceTitle4" class="form-label">Service Title 4</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fas fa-key"></i>
                                                </span>
                                                <textarea class="form-control" name="services_title4" id="serviceTitle4" rows="3" placeholder="Enter feature title" required>{{ old('services_title4', $homepage->where('name', 'services_title4')->first()->content ?? '') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row mb-4">
                                        <div class="col-md-3">
                                            <label for="serviceTitle1" class="form-label">Service Description 1</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fas fa-key"></i>
                                                </span>
                                                <textarea class="form-control" name="services_desc1" id="serviceTitle1" rows="3" placeholder="Enter feature title" required>{{ old('services_title1', $homepage->where('name', 'services_title1')->first()->content ?? '') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="serviceTitle2" class="form-label">Service Description 2</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fas fa-key"></i>
                                                </span>
                                                <textarea class="form-control" name="services_desc2" id="serviceTitle2" rows="3" placeholder="Enter feature title" required>{{ old('services_title2', $homepage->where('name', 'services_title2')->first()->content ?? '') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="serviceTitle3" class="form-label">Service Description 3</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fas fa-key"></i>
                                                </span>
                                                <textarea class="form-control" name="services_desc3" id="serviceTitle3" rows="3" placeholder="Enter feature title" required>{{ old('services_title3', $homepage->where('name', 'services_title3')->first()->content ?? '') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="serviceTitle4" class="form-label">Service Description 4</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fas fa-key"></i>
                                                </span>
                                                <textarea class="form-control" name="services_desc4" id="serviceTitle4" rows="3" placeholder="Enter feature title" required>{{ old('services_title4', $homepage->where('name', 'services_title4')->first()->content ?? '') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer text-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Pricing --}}
            <div class="modal fade" id="pricingModal" tabindex="-1" aria-labelledby="pricingSettingsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="pricingSettingsModalLabel">Price Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('superadmin.homestore') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="section" value="price">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="featureTitle" class="form-label">Pricing Title </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <textarea class="form-control" name="price_title" id="featureTitle" rows="3" placeholder="Enter feature title" required value="{{ old('price_title', $homepage->where('name', 'price_title')->first()->content ?? '') }}">{{ old('price_title', $homepage->where('name', 'price_title')->first()->content ?? '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="featureDescription" class="form-label">Pricing Description </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <textarea class="form-control" name="price_description" id="featureDescription" rows="3" placeholder="Enter feature description" required value="{{ old('price_description', $homepage->where('name', 'price_description')->first()->content ?? '') }}">{{ old('price_description', $homepage->where('name', 'price_description')->first()->content ?? '') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label for="navigation1" class="form-label">Price Per day </label>
                                        <textarea class="form-control" name="price_day" id="navigation1" rows="2" placeholder="Enter navigation title" required value="{{ old('price_day', $homepage->where('name', 'price_day')->first()->content ?? '') }}"> {{ old('price_day', $homepage->where('name', 'price_day')->first()->content ?? '') }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="navigation2" class="form-label">Price Per Month</label>
                                        <textarea class="form-control" name="price_month" id="navigation2" rows="2" placeholder="Enter navigation title" required value="{{ old('price_month', $homepage->where('name', 'price_month')->first()->content ?? '') }}">{{ old('price_month', $homepage->where('name', 'price_month')->first()->content ?? '') }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="navigation3" class="form-label">Price Per Year</label>
                                        <textarea class="form-control" name="price_year" id="navigation3" rows="2" placeholder="Enter navigation title" required required="{{ old('price_year', $homepage->where('name', 'price_year')->first()->content ?? '') }}">{{ old('price_year', $homepage->where('name', 'price_year')->first()->content ?? '') }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label for="navigation1" class="form-label">Description Per Day</label>
                                        <textarea class="form-control" name="price_desc1" id="navigation1" rows="2" placeholder="Enter navigation title" required value="{{ old('price_desc1', $homepage->where('name', 'price_desc1')->first()->content ?? '') }}"> {{ old('price_desc1', $homepage->where('name', 'price_desc1')->first()->content ?? '') }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="navigation2" class="form-label">Description Per Month</label>
                                        <textarea class="form-control" name="price_desc2" id="navigation2" rows="2" placeholder="Enter navigation title" required value="{{ old('price_desc2', $homepage->where('name', 'price_desc2')->first()->content ?? '') }}">{{ old('price_desc2', $homepage->where('name', 'price_desc2')->first()->content ?? '') }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="navigation3" class="form-label">Description Per Year</label>
                                        <textarea class="form-control" name="price_desc3" id="navigation3" rows="2" placeholder="Enter navigation title" required value ="{{ old('price_desc3', $homepage->where('name', 'price_desc3')->first()->content ?? '') }}">{{ old('price_desc3', $homepage->where('name', 'price_desc3')->first()->content ?? '') }}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer text-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         {{-- Contact Form --}}
            <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="pricingSettingsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="pricingSettingsModalLabel">Contact Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('superadmin.homestore') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="section" value="contact">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="featureTitle" class="form-label">Contact Title </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <textarea class="form-control" name="contact_title" id="featureTitle" rows="3" placeholder="Enter feature title" required value="{{ old('contact_title', $homepage->where('name', 'contact_title')->first()->content ?? '') }}">{{ old('contact_title', $homepage->where('name', 'contact_title')->first()->content ?? '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="featureDescription" class="form-label">Contact Description </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <textarea class="form-control" name="contact_description" id="featureDescription" rows="3" placeholder="Enter feature description" required value="{{ old('contact_description', $homepage->where('name', 'contact_description')->first()->content ?? '') }}">{{ old('contact_description', $homepage->where('name', 'contact_description')->first()->content ?? '') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label for="navigation1" class="form-label">Location Address </label>
                                        <textarea class="form-control" name="location_ad" id="navigation1" rows="2" placeholder="Enter navigation title" required value="{{ old('location_ad', $homepage->where('name', 'location_ad')->first()->content ?? '') }}"> {{ old('location_ad', $homepage->where('name', 'location_ad')->first()->content ?? '') }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="navigation2" class="form-label">Phone Number1</label>
                                        <textarea class="form-control" name="phone_num1" id="navigation2" rows="2" placeholder="Enter navigation title" required value="{{ old('phone_num1', $homepage->where('name', 'phone_num1')->first()->content ?? '') }}">{{ old('phone_num1', $homepage->where('name', 'phone_num1')->first()->content ?? '') }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="navigation3" class="form-label">Phone Number 2</label>
                                        <textarea class="form-control" name="phone_num2" id="navigation3" rows="2" placeholder="Enter navigation title" required required="{{ old('phone_num2', $homepage->where('name', 'phone_num2')->first()->content ?? '') }}">{{ old('phone_num2', $homepage->where('name', 'phone_num2')->first()->content ?? '') }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label for="navigation1" class="form-label">Email Address</label>
                                        <textarea class="form-control" name="contact_email" id="navigation1" rows="2" placeholder="Enter navigation title" required value="{{ old('contact_email', $homepage->where('name', 'contact_email')->first()->content ?? '') }}"> {{ old('contact_email', $homepage->where('name', 'contact_email')->first()->content ?? '') }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="navigation1" class="form-label">Get In Touch Description </label>
                                        <textarea class="form-control" name="touch_desc" id="navigation1" rows="2" placeholder="Enter navigation title" required value="{{ old('touch_desc', $homepage->where('name', 'touch_desc')->first()->content ?? '') }}"> {{ old('touch_desc', $homepage->where('name', 'touch_desc')->first()->content ?? '') }}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer text-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

             {{-- Footer Form --}}
             <div class="modal fade" id="footerModal" tabindex="-1" aria-labelledby="pricingSettingsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="pricingSettingsModalLabel">Footer Form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('superadmin.homestore') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="section" value="footer">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="featureTitle" class="form-label">Footer Title </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-upload"></i>
                                            </span>
                                            <input type="file" name="footer_title" class="form-control" id="fileInput4" accept="image/*">
                                        </div>
                                        <div class="d-flex align-items-center mt-2">
                                            <img id="previewImage4"
                                                 src="{{ old('footer_title', asset($homepage->where('name', 'footer_title')->first()->image_path ?? 'imgs/image_logo.png')) }}"
                                                 alt="Favicon Image" class="img-thumbnail"
                                                 style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                                            <div>
                                                <small class="d-block text-muted">Image Recommendations: 50x50px</small>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="featureDescription" class="form-label">Footer Address </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <textarea class="form-control" name="footer_add" id="featureDescription" rows="3" placeholder="Enter feature description" required value="{{ old('footer_add', $homepage->where('name', 'footer_add')->first()->content ?? '') }}">{{ old('footer_add', $homepage->where('name', 'footer_add')->first()->content ?? '') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="featureTitle" class="form-label">Footer Phone </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <textarea class="form-control" name="footer_phone" id="featureTitle" rows="3" placeholder="Enter feature title" required value="{{ old('footer_phone', $homepage->where('name', 'footer_phone')->first()->content ?? '') }}">{{ old('footer_phone', $homepage->where('name', 'footer_phone')->first()->content ?? '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="featureDescription" class="form-label">Footer Email Address </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <textarea class="form-control" name="footer_email" id="featureDescription" rows="3" placeholder="Enter feature description" required value="{{ old('footer_email', $homepage->where('name', 'footer_email')->first()->content ?? '') }}">{{ old('footer_email', $homepage->where('name', 'footer_email')->first()->content ?? '') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer text-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
