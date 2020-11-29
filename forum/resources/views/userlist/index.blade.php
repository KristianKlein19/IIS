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
                                <th>admin</th>
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
                                                <b>Yes<b/>
                                            @else
                                                No
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
