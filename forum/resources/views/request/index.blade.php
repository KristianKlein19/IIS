@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Requests for {{ __('List of all users') }}</div>

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
                                        <td>
                                            {{ $request->text }}
                                        </td>
                                        <td>
                                            {{ $request->text }}
                                        </td>
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
