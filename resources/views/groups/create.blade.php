@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Group') }}</div>

                <div class="card-body">
                    <form action="{{ route('group.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nazev">Title</label>

                            <input type="text" class="form-control" name="nazev" value="">
                        </div>
                        <div class="form-group">
                            <label for="popis">Description</label>

                            <textarea name="popis" id="popis" cols="5" rows="5" class="form-control"></textarea>
                        </div>
                        <ul>
                            <li>
                                <input id="zabezpeceni_profilu" name="zabezpeceni_profilu" type="checkbox" class="switch">
                                <label for="zabezpeceni_profilu">Hide membership for non-members</label>
                            </li>
                            <li>
                                <input id="zabezpeceni_obsahu" name="zabezpeceni_obsahu" type="checkbox" class="switch">
                                <label for="zabezpeceni_obsahu">Hide discusion for non-members</label>
                            </li>
                        </ul>
                        <button type="submit" class="btn btn-success">Create Group</button>
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
