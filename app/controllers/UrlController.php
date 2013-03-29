<?php

class UrlController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return kk7\URL::all();
	}

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
            return Redirect::to(URL::action('UrlController@create'))->withErrors($validator);
        } else {
            $url = new kk7\URL;
            $url->hash = uniqid();
            $url->url = Input::get('url');

            $url->save();

            $hashids = new Hashids(Config::get('app.key'));
            $url->hash = $hashids->encrypt($url->id);
            $url->save();

            return Redirect::to(URL::action('UrlController@index'));
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
            ++$url->views;
            $url->save();

            return Redirect::to($url->url, 302);
        }
	}

}