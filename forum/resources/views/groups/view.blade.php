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
                            @if ($skupina->zabezpeceni_profilu == 0 || auth()->user()->isMember($skupina))
                                <a href="{{ route('group.members', ['id' => $skupina->id]) }}" class="btn btn-xs btn-info">
                                    <span class="glyphicon glyphicon-info">
                                        Members
                                    </span>
                                </a>
                            @endif
                            @if (auth()->user()->isModFor($skupina))
                                <a href="{{ route('group.requests', ['id' => $skupina->id]) }}" class="btn btn-xs btn-warning">
                                    <span class="glyphicon glyphicon-warning">
                                        Manage requests
                                    </span>
                                </a>
                                <a href="{{ route('group.edit', ['id' => $skupina->id]) }}" class="btn btn-xs btn-info">
                                    <span class="glyphicon glyphicon-pencil">
                                        Edit Group Profile
                                    </span>
                                </a>
                                <a href="{{ route('group.delete', ['id' => $skupina->id]) }}" class="btn btn-xs btn-danger">
                                    <span class="glyphicon glyphicon-trash">
                                        Delete Group
                                    </span>
                                </a>
                            @elseif (auth()->user()->isMember($skupina))
                                <a href="{{ route('moderator-form', ['id' => $skupina->id]) }}" class="btn btn-xs btn-warning">
                                    <span class="glyphicon glyphicon-warning">
                                        Become moderator
                                    </span>
                                </a>
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
