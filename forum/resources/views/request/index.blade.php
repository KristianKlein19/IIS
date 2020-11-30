@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Requests for <b>{{ $skupina->nazev }}</b></div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <th>User</th>
                            <th>Request type</th>
                            <th>Message</th>
                            <th>Confirm</th>
                            <th>Reject</th>
                            </thead>
                            <tbody>
                            @foreach($requests as $request)
                                @if($request->stav == 0)
                                    <tr>
                                        <td>
                                            <a class="nav-link" href="/profiles/{{ $request->od }}">{{ $request->getUser()->name }}</a>
                                        </td>
                                        <td>
                                            @if ($request->typ == 0)
                                                Member
                                            @else
                                                Moderator
                                            @endif
                                        </td>
                                        <td>
                                            {{ $request->text }}
                                        </td>
                                        @if ($request->typ == 0)
                                            <td>
                                                <a href="{{ route('request.accept', ['id' => $request->id]) }}" class="btn btn-xs btn-success">
                                                    <span class="glyphicon glyphicon-success">
                                                        Accept
                                                    </span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('request.reject', ['id' => $request->id]) }}" class="btn btn-xs btn-danger">
                                                    <span class="glyphicon glyphicon-trash">
                                                        Reject
                                                    </span>
                                                </a>
                                            </td>
                                        @elseif ($request->getGroup()->getAdmin() == auth()->user() || auth()->user()->isAdmin())
                                            <td>
                                                <a href="{{ route('request.accept', ['id' => $request->id]) }}" class="btn btn-xs btn-warning">
                                                    <span class="glyphicon glyphicon-success">
                                                        Make Moderator
                                                    </span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('request.reject', ['id' => $request->id]) }}" class="btn btn-xs btn-danger">
                                                    <span class="glyphicon glyphicon-trash">
                                                        Reject
                                                    </span>
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
