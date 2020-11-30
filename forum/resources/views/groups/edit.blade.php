@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{ __('Group Profile') }}</div>

                <div class="card-body">
                    <form action="{{ route('group.update', ['id' => $skupina->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nazev">Title</label>

                            <input type="text" class="form-control" name="nazev" value="{{ $skupina->nazev }}">
                        </div>
                        <div class="form-group">
                            <label for="popis">Description</label>

                            <textarea name="popis" id="popis" cols="5" rows="5" class="form-control">{{ $skupina->popis }}</textarea>
                        </div>
                        <ul>
                            <li>
                                <input id="zabezpeceni_profilu" name="zabezpeceni_profilu" type="checkbox" value="{{ $skupina->zabezpeceni_profilu }}" class="switch">
                                <label for="zabezpeceni_profilu">Group Profile Visibility</label>
                            </li>
                            <li>
                                <input id="zabezpeceni_obsahu" name="zabezpeceni_obsahu" type="checkbox" value="{{ $skupina->zabezpeceni_obsahu }}" class="switch">
                                <label for="zabezpeceni_obsahu">Content Visibility</label>
                            </li>
                        </ul>
                        <button type="submit" class="btn btn-success">Update Group Profile</button>
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