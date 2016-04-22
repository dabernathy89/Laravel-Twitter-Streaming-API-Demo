@foreach($tweets as $tweet)
    <div class="tweet">
        @include('tweets.tweet')
    </div>
@endforeach