<h4>Last 5 Shortened URLs</h4>
<ol>
    @foreach($lastfive as $url)
        <li><a href="{{ URL::action('UrlController@show', [$url->hash]) }}">{{ $url->hash }}</a></li>
    @endforeach
</ol>