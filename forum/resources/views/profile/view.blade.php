@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $user->name }}</div>

                    <div class="card-body">
                        @if ($user->canViewProfile())
                            {{ $user->bio }}
                        @else
                            <div class="alert-danger">You are not allowed to view this profile</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
