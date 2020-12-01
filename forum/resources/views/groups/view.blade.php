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

                    <div class="card-footer">
                        @if (auth()->user() != null)
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
                        @endif
                    </div>
                </div>

                @if (auth()->user() != null)
                    @if ($skupina->zabezpeceni_obsahu == 0 || auth()->user()->isMember($skupina))
                        <table class="table table-hover">
                            <thead>
                            <th>
                                Threads
                            </th>
                            <th style="text-align:right">
                                From
                            </th>
                            </thead>

                            <tbody>
                            @foreach($threads as $thread)
                                <tr>
                                    <td>
                                        <a class="nav-link" href="{{ route('thread', ['id1' => $thread->soucast, 'id2' => $thread->id]) }}">
                                            {{ $thread->nazev }}
                                        </a>
                                    </td>
                                    <td style="text-align:right">
                                        @foreach($users as $user)
                                            @if($user->id == $thread->zakladatel)
                                                {{ $user->name }}
                                                @break
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="container py-4" style="text-align:center;color:#ff0000">This group's content is private and you are not member. You can request join to the group.</div>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
