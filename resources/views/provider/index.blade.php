@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <div class="row float-right">
            <div class="col-2 offset-10">
                <a href="/provider/create" class="btn btn-secondary btn-sm">Create New</a>
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-10 offset-1">
                <div class="card text-center">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Providers</a>
                            </li>
                        </ul>
                    </div>
                    <div class="container">
                        <div class="row pt-4">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    {{ $message }}
                                </div>
                            @endif
                        </div>
                        <table class="table caption-top">
                            <caption>List of Providers</caption>
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($providers as $provider)
                                <tr>
                                    <td>{{ $provider->subject }}</td>
                                    <td>{{ $provider->body }}</td>
{{--                                    <td>--}}
{{--                                        <a href="/provider/{{ $provider->id }}" class="btn btn-secondary btn-sm">Show</a>--}}
{{--                                        <a href="/provider/{{ $provider->id }}/edit" class="btn btn-secondary btn-sm">Edit</a>--}}
{{--                                    </td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
