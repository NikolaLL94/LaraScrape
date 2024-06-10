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
                        <form action="/template" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <strong>Subject:</strong>
                                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                                        @error('subject')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <strong>Body:</strong>
                                        <input type="text" name="body" class="form-control" placeholder="Body">
                                        @error('body')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
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
