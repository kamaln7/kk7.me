<?php

class UrlController extends BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('url.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $validator = Validator::make(
            ['url' => Input::get('url')],
            ['url' => 'required|url']
        );

        if($validator->fails()){
            return Redirect::to(URL::action('UrlController@create'))->withErrors($validator)->withInput();
        } else {
            $url = new kk7\URL;
            $url->hash = uniqid();
            $url->url = Input::get('url');

            $url->save();

            $hashids = new Hashids(Config::get('app.key'));
            $url->hash = $hashids->encrypt($url->id);
            $url->save();

            return Redirect::to(URL::action('UrlController@show', [$url->hash]));
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function show($hash)
    {
        $hashids = new Hashids(Config::get('app.key'));
        $id = $hashids->decrypt($hash);
        $url = kk7\URL::find($id)->first();

        if($url == null){
            App::abort(404, 'Page not found');
        } else {
            $date = new ExpressiveDate($url->created_at);
            $created = $date->getRelativeDate();
            return View::make('url.show', ['url' => $url, 'created' => $created]);
        }
    }

	public function redirect($hash)
	{
        $hashids = new Hashids(Config::get('app.key'));
        $id = $hashids->decrypt($hash);
		$url = kk7\URL::find($id)->first();

        if($url == null){
            App::abort(404, 'Page not found');
        } else {
            ++$url->views;
            $url->save();

            return Redirect::to($url->url, 302);
        }
	}

}