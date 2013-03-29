<h4>Last 10 URLs</h4>
<ol>
    @foreach($lastten as $url)
        <li><a href="{{ URL::action('UrlController@show', [$url->hash]) }}">{{ $url->hash }}</a></li>
    @endforeach
</ol>