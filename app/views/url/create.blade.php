<h1>Shorten a URL</h1>
{{ Form::open(['action' => 'UrlController@store', 'method' => 'post']) }}
    @if(count($errors) > 0)
        <p>
            <ul>
                @foreach($errors->all('<li>:message</li>') as $error)
                    {{ $error }}
                @endforeach
            </ul>
        </p>
    @endif
    {{ Form::input('text', 'url', Input::old('url'), ['maxlength' => 255, 'size' => 30]) }}
    <button type="submit">Shorten!</button>
{{ Form::close() }}