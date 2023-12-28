@extends('frontend.main_master')
@section('main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Inner Banner -->
<div class="inner-banner inner-bg6">
    <div class="container">
        <div class="inner-title">
            <ul>
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>User Dashboard </li>
            </ul>
            <h3>User Dashboard</h3>
        </div>
    </div>
</div>
<!-- Inner Banner End -->

<!-- Service Details Area -->
<div class="service-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('frontend.dashboard.user_menu')
            </div>
            <div class="col-lg-9">
                <div class="service-article">
                    <section class="checkout-area pb-70">
                        <div class="container">
                            <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-details">
                                            <h3 class="title">User Profile </h3>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Name <span class="required">*</span></label>
                                                        <input type="text" name="name" id="name" class="form-control" value="{{ $profileData->name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Email <span class="required">*</span></label>
                                                        <input type="email" name="email" id="email" class="form-control" value="{{ $profileData->email }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Address <span class="required">*</span></label>
                                                        <input type="text" name="address" id="address" class="form-control" value="{{ $profileData->address }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone <span class="required">*</span></label>
                                                        <input type="text" name="phone" id="phone" class="form-control" value="{{ $profileData->phone }}">
                                                    </div>
                                                </div>
                                                <div class="row d-flex align-items-center">
                                                    <div class="col-lg-10 col-md-10">
                                                        <div class="form-group">
                                                            <label>User Profile Picture<span class="required">*</span></label>
                                                            <input type="file" name="photo" id="image" class="form-control" >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-md-2">
                                                        <img src="{{ empty($profileData->photo) ? asset('upload/no_image.jpg') : asset('upload/user_images/'.$profileData->photo)}}"
                                                                alt="Admin" class="rounded-circle p-1 bg-primary" width="80" id="showImage">
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <button type="submit" class="btn btn-danger w-100">Save Changes </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service Details Area End -->

<script src="{{ asset('js/preview_image.js') }}"></script>
@endsection