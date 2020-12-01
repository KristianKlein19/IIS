@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="border-width:5px">
                    <div class="card-header" style="text-align:center"><b>{{ $thread->nazev }}</b></div>
                    <div class="card-body">{{ $thread->popis }}</div>
                    <div class="card-footer">
                        By
                        <b>
                            @foreach($users as $user)
                                @if($user->id == $thread->zakladatel)
                                    {{ $user->name }}
                                    @break
                                @endif
                            @endforeach
                        </b>
                        <span style="font-size:10px;float:right">at {{ $thread->created_at }}</span>
                    </div>
                </div>

                <br>

                <?php $flag = true ?>
                @foreach($shares as $share)
                    @if($share->soucast == $thread->id)
                        <?php $flag = false ?>
                        @break
                    @endif
                @endforeach
                @if($flag)
                    <div class="container py-4" style="text-align:center;color:#ff0000">No replies yet.</div>
                @else
                    @foreach($shares as $share)
                        @if($share->soucast == $thread->id)
                            <br>
                                <div class="card" style="margin-left:17px;margin-right:17px;">
                                    <div class="card-body">
                                        <div style="float: left; width: 16%">
                                            <table class="table">
                                                <thead>
                                                    <th style="text-align:center; border-top: 0px">
                                                        @if($share->karma < 0)
                                                            <span style="color: #AA0000">{{ $share->karma }}</span>
                                                        @elseif($share->karma > 0)
                                                            <span style="color: #1c7430">{{ $share->karma }}</span>
                                                        @else
                                                            <span>{{ $share->karma }}</span>
                                                        @endif
                                                    </th>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td style="text-align:center">
                                                        <span style="float: left">
                                                            <a href="{{ route('thread.karma', ['id' => $thread->soucast, 'id2' => $thread->id]) }}" class="btn btn-success">+</a>
                                                        </span>
                                                        <span style="float: right">
                                                            <a href="{{ route('thread.karma', ['id' => $thread->soucast, 'id2' => $thread->id]) }}" class="btn btn-danger">-</a>
                                                        </span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div style="float: right; width: 79%">
                                            {{ $share->text }}
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        By
                                        <b>
                                            @foreach($users as $user)
                                                @if($user->id == $share->prispevatel)
                                                    {{ $user->name }}
                                                    @break
                                                @endif
                                            @endforeach
                                        </b>
                                        <span style="font-size:10px; float:right;">at {{ $share->created_at }}</span>
                                    </div>
                                </div>
                        @endif
                    @endforeach
                @endif

                <br><br>
                @if (auth()->user() != null)
                    @if (auth()->user()->isMember($group))
                        <div class="card">
                            <div class="card-header">{{ __('Add Comment') }}</div>
                            <div class="card-body">
                                <form action="{{ route('thread.store', ['id' => $thread->soucast, 'id2' => $thread->id]) }}" method="POST">
                                    @csrf
                                    <div class="form-text">
                                        <textarea name="text" id="text" cols="5" rows="5" class="form-control"></textarea>
                                    </div>
                                    <br>
                                    <input type="hidden" name="thread_id" id="thread_id" value="{{ $thread->id }}" />
                                    <input type="hidden" name="group_id" id="group_id" value="{{ $thread->soucast }}" />
                                    <button type="submit" class="btn btn-success">Add comment</button>
                                </form>
                                @if($errors->any())
                                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                                @endif
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
