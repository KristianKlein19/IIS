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
                                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="bio">User description</label>
                                <textarea name="bio" cols="10" rows="5" class="form-control" id="bio">{{ $user->bio }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="viditelnost">Profile visibility</label>
                                <select name="viditelnost" id="viditelnost">
                                    @if ($user->viditelnost == 0)
                                        <option value="0" selected>Visible for all</option>
                                    @else
                                        <option value="0">Visible for all</option>
                                    @endif
                                    @if ($user->viditelnost == 1)
                                        <option value="1" selected>Visible for registered users</option>
                                    @else
                                        <option value="1">Visible for registered users</option>
                                    @endif
                                    @if ($user->viditelnost == 2)
                                        <option value="2" selected>Visible for members of groups</option>
                                    @else
                                        <option value="2">Visible for members of groups</option>
                                    @endif
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
