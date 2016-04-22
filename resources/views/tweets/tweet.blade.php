<div class="media">
    <div class="media-left">
        <img class="img-thumbnail media-object" src="{{ $tweet->user_avatar_url }}" alt="Avatar">
    </div>
    <div class="media-body">
        <h4 class="media-heading">{{ '@' . $tweet->user_screen_name }}</h4>
        <p>{{ $tweet->tweet_text }}</p>
        <p><a target="_blank" href="https://twitter.com/{{ $tweet->user_screen_name }}/status/{{ $tweet->id }}">
            View on Twitter
        </a></p>
    </div>
</div>