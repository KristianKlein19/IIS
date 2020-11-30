@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $skupina->nazev }}</div>

                    <div class="card-body">
                        {{ $skupina->popis }}
                    </div>

                    @if (auth()->user() != null)
                        <div class="card-footer">
                            @if (auth()->user()->isModFor($skupina))
                                <a href="{{ route('group.requests', ['id' => $skupina->id]) }}" class="btn btn-xs btn-info">
                                    <span class="glyphicon glyphicon-info">
                                        Manage requests
                                    </span>
                                </a>
                            @elseif (auth()->user()->isMember($skupina))
                                Mod request
                            @else
                                <a href="{{ route('membership-form', ['id' => $skupina->id]) }}" class="btn btn-xs btn-info">
                                    <span class="glyphicon glyphicon-info">
                                        Join
                                    </span>
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
