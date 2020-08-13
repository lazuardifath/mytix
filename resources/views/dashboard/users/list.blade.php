@extends('layouts.dashboard')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $active }}</li>
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
                        <div class="col-4">
                            <form method="get" action="{{ url('dashboard/users') }}">
                                <div class="input-group">
                                    <input type="text" name="q" value="{{ $request['q'] ?? '' }}" class="form-control">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-secondary btn-sm">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table table-borderless table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Registered</th>
                        <th>Edited</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)

                    <tr>
                        <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            <a type="button" class="btn btn-info" href="{{ url('dashboard/user/edit/'.$user->id) }}">Edit</a>
                            <a id="delete" class="btn btn-danger btn-sm text-default" data-toogle="modal" data-target="#deleteModal">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $users->appends($request)->links() }}


                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Modal header</h3>
                                <h5>Delete</h5>
                            </div>
                            <div class="modal-body">
                                <p>Anda yakin ingin hapus user {{ $user->name }} ?</p>
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
            </div>
        </div>
    </div>
</div>


@endsection
