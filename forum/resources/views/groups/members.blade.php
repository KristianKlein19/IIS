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
                            @foreach($userlist as $clen)
                                <tr>
                                    <td>
                                        <a class="nav-link" href="/profiles/{{ $clen->id_users }}">{{ $clen->getUser()->name }}</a>
                                    </td>
                                    <td>
                                        @if ($clen->getUser() == $skupina->getAdmin()))
                                            <b>Owner<b/>
                                        @elseif ($clen->getUser()->isModFor($skupina))
                                            <i>Moderator<i/>
                                        @else
                                            Member
                                        @endif
                                    </td>
                                    <td>
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
