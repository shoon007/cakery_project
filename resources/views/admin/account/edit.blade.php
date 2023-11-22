@extends('admin.layouts.master')
@section('content')
    {{-- admin account update page --}}
    <div class="main">
        <a href="{{ route('admin#detailsPage') }}">
            <button class="back-btn">
                <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024">
                    <path
                        d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z">
                    </path>
                </svg>
                <span>Back</span>
            </button>
        </a>
        @if (session('updateSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top:6rem">
                <p class="text-success">{{ session('updateSuccess') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="edit-container">
            <form action="{{ route('admin#update') }}" method="post" enctype="multipart/form-data" class="edit-form"
                id="form">
                @csrf
                <div class="profile-div">
                    @if (Auth::user()->image == null)
                        <img src="{{ asset('img/default-male.png') }}" alt="" id="profile-img">
                    @else
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="" id="profile-img">
                    @endif
                    <div class="upload">
                        <input type="file" id="real-file" hidden="hidden" name="image"
                            onchange="document.getElementById('profile-img').src = window.URL.createObjectURL(this.files[0])" />
                        <button type="button" id="custom-button">choose a profile </button>
                        @if (Auth::user()->image == null)
                            <span id="custom-text">Not a photo chosen, yet.</span>
                        @endif
                    </div>

                </div>

                <div class="d-flex flex-column align-content-center justify-content-center">
                    <div class="inputs-container">
                        <div class="inputs">
                            <label for="">Name<br>
                                <input type="text" placeholder="name" name="name" id="name"
                                    value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <br>
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </label>

                            <label for="" class="move">Email<br>
                                <input type="text" placeholder="email" name="email"
                                    value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <br>
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </label>

                        </div>
                        <div class="inputs">
                            <label for="">Phone<br>
                                <input type="text" placeholder="phone" name="phone"
                                    value="{{ old('phone', $user->phone) }}">
                                @error('phone')
                                    <br>
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </label>

                            <label for="" class="move">Gender<br>
                                <input type="text" placeholder="gender" name="gender"
                                    value="{{ old('gender', $user->gender) }}">
                                @error('gender')
                                    <br>
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </label>

                        </div>
                        <div class="inputs">
                            <label for="">Address<br>
                                <textarea id="textarea" cols="30" rows="4" name="address" placeholder="address">{{ old('address', $user->address) }}</textarea>
                                @error('address')
                                    <br><small class="text-danger">{{ $message }}</small>
                                @enderror
                            </label>

                            <label for="">Role<br>
                                <input type="text" placeholder="role" class="role" value="{{ $user->role }}"
                                    disabled>
                            </label>

                        </div>
                    </div>
                    <button class="button">Update
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection
