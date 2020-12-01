@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Moderator request for <b>{{ $skupina->nazev }}</b></div>

                    <div class="card-body">
                        <form action="{{ route('request.moderator', [ 'id' => $skupina->id]) }}" method="POST">
                            @csrf

                            <input name="skupina" type="hidden" value="{{ $skupina->id }}">

                            <div class="form-group">
                                <label for="msg">Message (optional)</label>

                                <textarea name="msg" id="msg" cols="5" rows="5" class="form-control" maxlength="200"></textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Send Request</button>
                        </form>
                        @if($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
