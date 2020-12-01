@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit profile') }}</div>

                    <div class="card-body">
                        <form action="{{ route('update-profile') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input required maxlength="32" type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="bio">User description</label>
                                <textarea maxlength="5000" name="bio" cols="10" rows="5" class="form-control" id="bio">{{ $user->bio }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="viditelnost">Profile visibility</label>
                                <select name="viditelnost" id="viditelnost">
                                    <option value="0" @if ($user->viditelnost == 0) selected @endif>Visible for all</option>
                                    <option value="1" @if ($user->viditelnost == 1) selected @endif>Visible for registered</option>
                                    <option value="2" @if ($user->viditelnost == 2) selected @endif>Visible for group members</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Update</button>
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
