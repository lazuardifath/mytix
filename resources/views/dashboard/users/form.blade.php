@extends('layouts.dashboard')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">{{ $active }}</li>
    <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
  </ol>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                        <h3>{{ __('Users') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a class="btn btn-sm btn-danger text-default" data-toggle="modal" data-target="#deleteModal">
                                Delete
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8"><br>
                                <form method="post" action="{{ url('dashboard/user/update/'.$user->id) }}">
                                @csrf
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" value="{{ $user->name }}" name="name" id="name" aria-describedby="nameHelp">
                                        @error('name')
                                        <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="InputEmail">Email</label>
                                        <input type="email" name="email" class="form-control" id="InputEmail" value="{{ old('email') ?? $user->email }}" aria-describedby="emailHelp">
                                        @error('email')
                                        <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Delete</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus user <b>{{ $user->name }}</b></p>
            </div>
            <div class="modal-footer">
                <form action="{{ url('dashboard/user/delete') }}" method="post">
                @csrf
                <button class="btn btn-sm btn-danger text-default">Delete</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection

