@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <div class="row pt-4">
            <div class="col-10 offset-1">
                <div class="card text-center">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Edit Project</a>
                            </li>
                        </ul>
                    </div>

                    <div class="container">
                        {{ $project->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
