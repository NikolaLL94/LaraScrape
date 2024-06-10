@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <div class="row pt-4">
            <div class="col-6 offset-3">
                <div class="card text-center">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Provider</a>
                            </li>
                        </ul>
                    </div>
                    <div class="container">
                        <form action="/provider" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        <input type="text" name="name" class="form-control" placeholder="Name">
                                        @error('name')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <strong>Mailer:</strong>
                                        <input type="text" name="mailer" class="form-control" placeholder="Mailer">
                                        @error('mailer')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <strong>Host:</strong>
                                        <input type="text" name="host" class="form-control" placeholder="Host">
                                        @error('host')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <strong>Port:</strong>
                                        <input type="text" name="port" class="form-control" placeholder="Port">
                                        @error('port')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <strong>Username:</strong>
                                        <input type="text" name="username" class="form-control" placeholder="Username">
                                        @error('username')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <strong>Password:</strong>
                                        <input type="text" name="password" class="form-control" placeholder="Password">
                                        @error('password')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <strong>Encryption:</strong>
                                        <input type="text" name="encryption" class="form-control" placeholder="Encryption">
                                        @error('encryption')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <strong>From Address:</strong>
                                        <input type="text" name="from_address" class="form-control"
                                               placeholder="From Address">
                                        @error('from_address')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <strong>From Name:</strong>
                                        <input type="text" name="from_name" class="form-control" placeholder="From Name">
                                        @error('from_name')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <strong>Is Default:</strong>
                                        <select class="form-select form-select-sm" name="default" aria-label=".form-select-sm example">
                                            <option value="null">-- Select Default Value --</option>
                                            <option selected value="1">-- Yes --</option>
                                            <option value="0">-- No --</option>
                                        </select>
                                        @error('default')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <strong>Webhook Url:</strong>
                                        <input type="text" name="webhook_url" class="form-control" placeholder="Webhook Url">
                                        @error('webhook_url')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col">
                                    <div class="form-group">
                                        <strong>Webhook Response Format:</strong>
                                        <input type="text" name="webhook_format" class="form-control"
                                               placeholder="Webhook Response Format">
                                        @error('webhook_format')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <strong>Project Id:</strong>
                                    <select class="form-select form-select-sm" name="project_id" aria-label=".form-select-sm example">
                                        <option value="null">-- Select Project --</option>
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('from_name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row p-4">
                                <div class="col">
                                    <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
