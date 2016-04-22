@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="tweet-list">
                @if(Auth::check())
                    @include('tweets.list-admin')
                @else
                    @include('tweets.list')
                @endif
            </div>

        </div>
    </div>
</div>
@endsection
