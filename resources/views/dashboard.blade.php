@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'dashboard') }}</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            padding: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 15px;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            border-radius: 5px;
        }

        .sidebar ul li a:hover {
            background-color: #495057;
        }

        .profile {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile img {
            width: 70px;
            height: 70px;
            margin-bottom: 10px;
        }

        /* Main Content Styling */
        .content {
            flex: 1;
            padding: 40px;
            background-color: #f8f9fa;
        }

        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card i {
            font-size: 2.5rem;
        }

        .card h2 {
            margin: 15px 0;
            font-size: 2rem;
        }

        .card p {
            font-size: 1.2rem;
            margin: 0;
        }

        .card-primary {
            background-color: #007bff;
        }

        .card-danger {
            background-color: #dc3545;
        }

        .card-success {
            background-color: #28a745;
        }

        .card-warning {
            background-color: #ffc107;
        }

        /* Navbar Styling */
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .navbar .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar .navbar-brand span {
            color: #6c757d;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="profile">
            <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile" class="img-fluid rounded-circle">
            <p>{{ Auth::user()->name }}</p>
            <p class="text-success">Online</p>
        </div>
        <hr>
        <ul>
            <li><a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="{{ route('informasi.index') }}"><i class="bi bi-info-circle-fill"></i> Informasi</a></li>
            <li><a href="{{ route('agenda.index') }}"><i class="bi bi-calendar"></i> Agenda</a></li>
            <li><a href="{{ route('photo.index') }}"><i class="bi bi-journal-album"></i> Photo</a></li>
            <li><a href="{{ route('kategori.index') }}"><i class="bi bi-card-checklist"></i> Kategori</a></li>
            <li><a href="{{ route('galery.index') }}"><i class="bi bi-journal-album"></i> Galery</a></li>
            <li><a href="{{ route('profile.edit') }}"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="{{ route('users.index') }}"><i class="fas fa-user"></i> Manajemen Admin</a></li>
        </ul>
        <hr>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mx-3">Dashboard</span>
        </nav>

        <!-- Dashboard Cards -->
        <div class="dashboard-cards mt-4">
            <div class="card text-white card-primary text-center">
                <div class="card-body">
                    <i class="bi bi-info-circle-fill"></i>
                    <h2>11</h2>
                    <p>Informasi</p>
                </div>
            </div>
            <div class="card text-white card-danger text-center">
                <div class="card-body">
                    <i class="bi bi-calendar"></i>
                    <h2>3</h2>
                    <p>Agenda</p>
                </div>
            </div>
            <div class="card text-white card-success text-center">
                <div class="card-body">
                    <i class="bi bi-journal-album"></i>
                    <h2>11</h2>
                    <p>Photo</p>
                </div>
            </div>
            <div class="card text-white card-success text-center">
                <div class="card-body">
                    <i class="bi bi-journal-album"></i>
                    <h2>11</h2>
                    <p>Galery</p>
                </div>
            </div>
            <div class="card text-white card-warning text-center">
                <div class="card-body">
                    <i class="bi bi-card-checklist"></i>
                    <h2>4</h2>
                    <p>Kategori</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
@endsection
