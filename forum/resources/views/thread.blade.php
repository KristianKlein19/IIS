@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

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

                <br><br>

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
                            <div class="card" style="margin-left:15px;margin-right:15px;">
                                <div class="card-body">{{ $share->text }}</div>
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
                                    <span style="font-size:10px;float:right">at {{ $share->created_at }}</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif

                <br><br>

                <textarea></textarea>
            </div>
        </div>
    </div>
@endsection
