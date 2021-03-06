@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('List of all users') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>Nickname</th>
                                <th>e-mail</th>
                                <th>action</th>
                            </thead>
                            <tbody>
                                @foreach($userlist as $user)
                                    <tr>
                                        <td>
                                            <a class="nav-link" href="/profiles/{{ $user->id }}">{{ $user->name }}</a>
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            @if ($user->admin)
                                                <b>Admin<b/>
                                            @else
                                            <a href="{{ route('users.ban', ['id' => $user->id]) }}" class="btn btn-xs btn-danger">
                                                <span class="glyphicon glyphicon-trash">
                                                    Ban
                                                </span>
                                            </a>
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
