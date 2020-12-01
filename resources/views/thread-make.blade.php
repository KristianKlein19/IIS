@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Thread') }}</div>

                    <div class="card-body">
                        <form action="{{ route('thread.save', ['id' => $group->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nazev">Title</label>

                                <input type="text" class="form-control" name="nazev" value="">
                            </div>
                            <div class="form-group">
                                <label for="popis">Description</label>

                                <textarea name="popis" id="popis" cols="5" rows="5" class="form-control"></textarea>
                            </div>
                            <input type="hidden" name="group_id" id="group_id" value="{{ $group->id }}" />
                            <button type="submit" class="btn btn-success">Create Thread</button>
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
