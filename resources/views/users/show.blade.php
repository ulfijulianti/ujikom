@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3>Detail User</h3>
        </div>

        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">ID:</dt>
                <dd class="col-sm-9">{{ $user->id }}</dd>

                <dt class="col-sm-3">Nama:</dt>
                <dd class="col-sm-9">{{ $user->name }}</dd>

                <dt class="col-sm-3">Email:</dt>
                <dd class="col-sm-9">{{ $user->email }}</dd>

                <dt class="col-sm-3">Status:</dt>
                <dd class="col-sm-9">
                    @if($user->status == 'active')
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </dd>
            </dl>
        </div>

        <div class="card-footer text-center">
            <a href="{{ route('users.index') }}" class="btn btn-primary">Kembali ke Daftar User</a>
        </div>
    </div>
</div>
@endsection
