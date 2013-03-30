<h4>Top 5 Shortened URLs</h4>
<ol>
    @foreach($topfive as $url)
        <li><a href="{{ URL::action('UrlController@show', [$url->hash]) }}">{{ $url->hash }}</a></li>
    @endforeach
</ol>