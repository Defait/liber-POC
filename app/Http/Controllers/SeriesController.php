<?php

namespace App\Http\Controllers;

use App\Series;
use App\Information;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = Series::where('visability_status', 0)->get();

        return view('series.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('series.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Series::create([
            'name'     => $request->name,
            'slug'      => str_slug($request->name),
            'user_id'   => \Auth::user()->id,
        ]);

        $this->storeInformation($request);

        return redirect('/');
    }

    public function storeInformation($data)
    {
        Information::create([
            'author'             => $data->author,
            'user_is_author'     => true,
            'synopsis'           => $data->synopsis,
            'cover_img_location' => 'img/wukong.jpg',
            'series_id'          => Series::where('slug', str_slug($data->name))->first()->id,
            'user_id'            => \Auth::user()->id,
        ]);

        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function show($seriesSlug)
    {
        $series = Series::where('slug', $seriesSlug)->first();

        return view('series.show', compact('series'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function edit(Series $series)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Series $series)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function destroy(Series $series)
    {
        //
    }
}
