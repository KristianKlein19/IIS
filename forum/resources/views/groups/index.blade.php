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
                                Settings
                            </th>
                            <th>
                                Removing
                            </th>
                        </thead>

                        <tbody>
                            @foreach($groups as $skupina)
                                <tr>
                                    <td>
                                        <a class="nav-link" href="/groups/{{ $skupina->id }}">{{ $skupina->nazev }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('group.edit', ['id' => $skupina->id]) }}" class="btn btn-xs btn-info">
                                            <span class="glyphicon glyphicon-pencil">
                                                Edit
                                            </span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('group.delete', ['id' => $skupina->id]) }}" class="btn btn-xs btn-danger">
                                            <span class="glyphicon glyphicon-trash">
                                                Delete
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                <tr>s</tr>
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
                        </thead>

                        <tbody>
                            @foreach($groups as $skupina)
                                <tr>
                                    <td>
                                        {{ $skupina->nazev }}
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
