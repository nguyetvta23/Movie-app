<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\ViewModels\TvShowsViewModel;
use App\ViewModels\TVShowViewModel;

use Illuminate\Http\Request;

class TvShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tvshows = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/tv/popular')
            ->json()['results'];
        // dd($tvshows);
        $tvshowsViewModel = new TvShowsViewModel($tvshows);
        return view('tvshows.index', $tvshowsViewModel);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tvshow = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/tv/' . $id)
            ->json();
        $credit = Http::withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/tv/' . $id . '/credits')
            ->json();
        $tvshowsViewModel = new TvShowViewModel($tvshow, $credit);
        return view('tvshows.show', $tvshowsViewModel);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
