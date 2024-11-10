@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <h1 class="mb-4">Edit Profile</h1>

    @if (session('status') === 'profile-updated')
        <div class="alert alert-success">
            Profile updated successfully.
        </div>
    @endif

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
            <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('default-image.jpg') }}" class="card-img-top" alt="Profile Image">

            <div class="card-body">
    <h5 class="card-title">{{ Auth::user()->name }}</h5> <!-- Menggunakan Auth::user() -->
    <p class="card-text">Email: {{ Auth::user()->email }}</p>

    <p class="card-text"><span class="badge bg-success">Verified</span></p>
</div>

            </div>
        </div>
        <div class="col-md-8">
        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data"> <!-- Pastikan enctype ini ada -->
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
    </div>

    <div class="mb-3">
        <label for="profile_image" class="form-label">Profile Image</label>
        <input type="file" class="form-control" id="profile_image" name="profile_image"> <!-- Pastikan ini ada -->
    </div>

    <div class="mb-3">
    <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('default-image.jpg') }}" class="card-img-top" alt="Profile Image" style="width: 150px; height: 150px;">

    </div>

    <button type="submit" class="btn btn-primary">Update Profile</button>
</form>


            <form action="{{ route('profile.destroy') }}" method="POST" class="mt-4">
                @csrf
                @method('DELETE')
                <div class="mb-3">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-danger">Delete Account</button>
            </form>
        </div>
    </div>
</div>
<div class="mb-3 mx-12 mt-4">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a> <!-- Sesuaikan dengan route dashboard Anda -->
        </div>
    </div>
@endsection
