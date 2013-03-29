@extends('template.master')

@section('content')
    <h2>Shorten a URL</h2>
    @if(count($errors) > 0)
        <div class="alert alert-error">
            <ul>
                @foreach($errors->all('<li>:message</li>') as $error)
                {{ $error }}
                @endforeach
            </ul>
        </div>
    @endif
    {{ Form::open(['action' => 'UrlController@store', 'method' => 'post']) }}
        <div class="input-append">
            {{ Form::input('text', 'url', Input::old('url'), ['maxlength' => 255, 'class' => 'span6']) }}
            {{ Form::button('Shorten!', ['class' => 'btn btn-success', 'type' => 'submit']) }}
        </div>
    {{ Form::close() }}
@stop