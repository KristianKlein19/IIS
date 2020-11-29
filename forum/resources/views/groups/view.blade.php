@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $skupina->nazev }}</div>

                    <div class="card-body">
                        {{ $skupina->popis }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
