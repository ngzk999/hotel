<div class="service-side-bar">
    <div class="services-bar-widget">
        <h3 class="title">Others Services</h3>
        <div class="side-bar-categories">
            <img src="{{ empty($profileData->photo) ? asset('upload/no_image.jpg') :  asset('upload/user_images/'.$profileData->photo) }}"
                class="rounded mx-auto d-block" alt="Image" style="width:100px; height:100px;">
            <div class="mt-3">
                @auth
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <h4 class="mb-0">{{ auth()->user()->name }}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <p class="text-secondary">{{ auth()->user()->email }}</p>
                    </div>
                </div>
                @endauth
            </div>

            <ul>

                <li>
                    <a href="{{ route('dashboard') }}">User Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('user.profile') }}">User Profile </a>
                </li>
                <li>
                    <a href="{{ route('user.password.change') }}">Change Password</a>
                </li>
                <li>
                    <a href="#">Booking Details </a>
                </li>
                <li>
                    <a href="{{ route('user.logout') }}">Logout </a>
                </li>
            </ul>
        </div>
    </div>
</div>