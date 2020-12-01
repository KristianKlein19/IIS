@extends('layouts.app')

@section('content')

@auth
    <div class="container py-4">
        <div class="panel panel-default">
            <div class="card">
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <th>
                                Group name
                            </th>
                            <th>
                                Created
                            </th>
                            <th>
                                Updated
                            </th>
                        </thead>

                        <tbody>
                            @foreach($groups as $skupina)
                                <tr>
                                    <td>
                                        <a class="nav-link" href="/groups/{{ $skupina->id }}">{{ $skupina->nazev }}</a>
                                    </td>
                                    <td>
                                        {{ $skupina->created_at}}
                                    </td>
                                    <td>
                                        {{ $skupina->updated_at}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="container">
        <div class="panel panel-default">
            <div class="card">
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <th>
                                Group name
                            </th>
                            <th>
                                Created
                            </th>
                            <th>
                                Updated
                            </th>
                        </thead>
                        
                        <tbody>
                            @foreach($groups as $skupina)
                                <tr>
                                    <td>
                                        <a class="nav-link" href="/groups/{{ $skupina->id }}">{{ $skupina->nazev }}</a>
                                    </td>
                                    <td>
                                        {{ $skupina->created_at}}
                                    </td>
                                    <td>
                                        {{ $skupina->updated_at}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endauth

@endsection
