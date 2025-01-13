@extends('superadmin.dashboard')

@section('content')
<div class="main">
    <div class="topbar">
        <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
        </div>
    </div>
<div class="container-fluid">
    <div class="row">

        <!-- Main content -->
        <div class="col-md-10">
            <h1 class="mt-4 h1-title">Admin | Home Page CRM</h1>
            <div class="row">
                <div class="col-md-4 ">
                    <h5 class="mt-4">SITE LOGO</h5>
                </div>
                <div class="col-md-4 offset-md-2">
                    <h5 class="mt-4">META DESCRIPTION</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-upload"></i>
                        </span>
                        <input type="file" class="form-control" id="fileInput" accept="image/*">
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <img id="previewImage" src="{{asset('imgs/image_logo.png')}}" alt="Image Logo" class="img-thumbnail"
                             style="width: 200px; height: 200px; object-fit: cover; margin-right: 10px;">
                        <div>
                            <small class="d-block text-muted">Image</small>
                            <small class="d-block text-muted">Recommendations</small>
                            <small class="d-block text-muted">200x200px</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 offset-md-2">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-key"></i>
                        </span>
                        <textarea class="form-control" id="searchInput" placeholder="" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <h5 class="mt-4">HOMEPAGE BANNER</h5>
                </div>
                <div class="col-md-4 offset-md-2">
                    <h5 class="mt-4">META TITLE</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-upload"></i>
                        </span>
                        <input type="file" class="form-control" id="fileInput2" accept="image/*">
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <img id="previewImage2" src="{{asset('imgs/image_logo.png')}}" alt="Image Logo" class="img-thumbnail"
                             style="width: 200px; height: 200px; object-fit: cover; margin-right: 10px;">
                        <div>
                            <small class="d-block text-muted">Image</small>
                            <small class="d-block text-muted">Recommendations</small>
                            <small class="d-block text-muted">200x200px</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 offset-md-2">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-key"></i>
                        </span>
                        <textarea class="form-control" id="searchInput" placeholder="" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <h5 class="mt-4">MOBILE BANNER</h5>
                </div>
                <div class="col-md-4 offset-md-2">
                    <h5 class="mt-4">FAVICON</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-upload"></i>
                        </span>
                        <input type="file" class="form-control" id="fileInput3" accept="image/*">
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <img id="previewImage3" src="{{asset('imgs/image_logo.png')}}" alt="Image Logo" class="img-thumbnail"
                             style="width: 200px; height: 200px; object-fit: cover; margin-right: 10px;">
                        <div>
                            <small class="d-block text-muted">Image</small>
                            <small class="d-block text-muted">Recommendations</small>
                            <small class="d-block text-muted">200x200px</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 offset-md-2">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-upload"></i>
                        </span>
                        <input type="file" class="form-control" id="fileInput4" accept="image/*">
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <img id="previewImage4" src="{{asset('imgs/image_logo.png')}}" alt="Image Logo" class="img-thumbnail"
                             style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                        <div>
                            <small class="d-block text-muted">Image</small>
                            <small class="d-block text-muted">Recommendations</small>
                            <small class="d-block text-muted">200x200px</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                </div>
                <div class="col-md-4 offset-md-2">
                    <h5 class="mt-4">SOCIAL SHARE IMAGE</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4 offset-md-2">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-upload"></i>
                        </span>
                        <input type="file" class="form-control" id="fileInput5" accept="image/*">
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <img id="previewImage5" src="{{asset('imgs/image_logo.png')}}" alt="Image Logo" class="img-thumbnail"
                             style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                        <div>
                            <small class="d-block text-muted">Image</small>
                            <small class="d-block text-muted">Recommendations</small>
                            <small class="d-block text-muted">16x16px</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <h5 class="mt-4">HEADING 1:</h5>
                </div>
                <div class="col-md-4 offset-md-2">
                    <h5 class="mt-4">PARAGRAPH</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-key"></i>
                        </span>
                        <input type="text" class="form-control" id="searchInput" placeholder="">
                    </div>
                </div>
                <div class="col-md-4 offset-md-2">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-key"></i>
                        </span>
                        <textarea class="form-control" id="searchInput" placeholder="" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <h5 class="mt-4">SECTION 1:</h5>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-key"></i>
                        </span>
                        <input type="text" class="form-control" id="searchInput" placeholder="">
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <h3 class="mt-4">GALLERY</h3>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="row">
                <!-- Upload Section -->
                <div class="col-md-4 ">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-key"></i>
                        </span>
                        <input type="file" class="form-control" id="Gallery" accept="image/*" placeholder="Upload gallery">
                    </div>
                    <button class="btn btn-primary mt-2" id="uploadButton">Upload Image</button>
                </div>

                <div class="col-md-5 offset-md-2 ">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody id="imageGallery">
                                <tr>
                                    <td><img src="{{asset('imgs/image_logo.png')}}" class="img-thumbnail" alt="Photo 1"></td>
                                    <td><img src="{{asset('imgs/image_logo.png')}}" class="img-thumbnail" alt="Photo 2"></td>
                                    <td><img src="{{asset('public/imgs/image_logo.png')}}" class="img-thumbnail" alt="Photo 3"></td>
                                    <td><img src="{{asset('public/imgs/image_logo.png')}}" class="img-thumbnail" alt="Photo 4"></td>
                                </tr>
                                <tr>
                                    <td><img src="{{asset('imgs/image_logo.png')}}" class="img-thumbnail" alt="Photo 5"></td>
                                    <td><img src="{{asset('imgs/image_logo.png')}}" class="img-thumbnail" alt="Photo 6"></td>
                                    <td><img src="{{asset('imgs/image_logo.png')}}" class="img-thumbnail" alt="Photo 7"></td>
                                    <td><img src="{{asset('imgs/image_logo.png')}}" class="img-thumbnail" alt="Photo 8"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-secondary" id="prevButton">Previous</button>
                        <button class="btn btn-secondary" id="nextButton">Next</button>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <h5 class="mt-4">FOOTER: </h5>
                </div>
                <div class="col-md-4 offset-md-2">
                    <h5 class="mt-4">FOOTER COLUMN 2</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-key"></i>
                        </span>
                        <input type="text" class="form-control" id="searchInput" placeholder="">
                    </div>
                </div>
                <div class="col-md-4 offset-md-2">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-key"></i>
                        </span>
                        <textarea class="form-control" id="searchInput" placeholder="" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <h5 class="mt-4">FOOTER LOGO: </h5>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-upload"></i>
                        </span>
                        <input type="file" class="form-control" id="fileInput5" accept="image/*">
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <img id="previewImage5" src="{{asset('imgs/image_logo.png')}}" alt="Image Logo" class="img-thumbnail"
                             style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">
                        <div>
                            <small class="d-block text-muted">Image</small>
                            <small class="d-block text-muted">Recommendations</small>
                            <small class="d-block text-muted">200x200px</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
