@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Members of {{ $skupina->nazev }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <th>Nickname</th>
                            <th>Role</th>
                            <th>Action</th>
                            </thead>
                            <tbody>

                            <tr>
                                <td>
                                    <a class="nav-link" href="/profiles/{{ $skupina->spravce }}">{{ $skupina->getAdmin()->name }}</a>
                                </td>
                                <td>
                                    <b>Owner</b>
                                </td>
                                <td>
                                    @if (auth()->user()->isAdmin())
                                        <a href="{{ route('group.takeover', ['id' => $skupina->id]) }}" class="btn btn-xs btn-warning">
                                            <span class="glyphicon glyphicon-warning">
                                                Take Over
                                            </span>
                                        </a>
                                    @endif
                                </td>
                            </tr>

                            @foreach($userlist as $clen)
                                <tr>
                                    <td>
                                        <a class="nav-link" href="/profiles/{{ $clen->id_users }}">{{ $clen->getUser()->name }}</a>
                                    </td>
                                    <td>
                                        @if ($clen->getUser()->isModFor($skupina))
                                            <i>Moderator<i/>
                                        @else
                                            Member
                                        @endif
                                    </td>
                                    <td>
                                        @if ($clen->getUser()->isModFor($skupina))
                                            @if (auth()->user() == $skupina->getAdmin() || auth()->user()->isAdmin())
                                                <a href="{{ route('group.unmod', ['id' => $skupina->id, 'member' => $clen->getUser()->id]) }}" class="btn btn-xs btn-warning">
                                                    <span class="glyphicon glyphicon-warning">
                                                        Remove Moderator
                                                    </span>
                                                </a>
                                            @endif
                                        @else
                                            @if (auth()->user()->isModFor($skupina))
                                            <a href="{{ route('group.boot', ['id' => $skupina->id, 'member' => $clen->getUser()->id]) }}" class="btn btn-xs btn-danger">
                                                <span class="glyphicon glyphicon-trash">
                                                    Boot
                                                </span>
                                            </a>
                                            @endif
                                        @endif
                                    </td>
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
