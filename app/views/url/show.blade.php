@extends('template.master')

@section('content')
    <h2>{{ Html::link(URL::action('UrlController@redirect', [$url->hash])) }}</h2>
    <h5>Usage</h5>
    <p>
        HTML: <code>{{ e(Html::link(URL::action('UrlController@redirect', [$url->hash]))) }}</code><br>
        BBCode: <code>[url]{{ URL::action('UrlController@redirect', [$url->hash]) }}[/url]</code>
    </p>
    <h5>Statistics</h5>
    <p>
        Redirects to <code>{{ $url->url }}</code><br>
        Created {{ $created }}.<br>
        {{ $url->views }} views.
    </p>
@stop