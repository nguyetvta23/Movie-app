<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public $popularMovie;
    public $nowPlayingMovies;
    public $genres;

    public function __construct($popularMovie, $nowPlayingMovies, $genres)
    {
        $this->popularMovie = $popularMovie;
        $this->nowPlayingMovies = $nowPlayingMovies;
        $this->genres = $genres;
    }
    public function popularMovie()
    {
        return $this->formatMovies($this->popularMovie);
    }
    public function nowPlayingMovies()
    {
        return $this->formatMovies($this->nowPlayingMovies);
    }
    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }
    private function formatMovies($movie)
    {

        return collect($movie)->map(function ($movie) {
            $genresFormatted = collect($movie['genre_ids'])->mapWithKeys(function ($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');
            return collect($movie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'],
                'vote_average' => $movie['vote_average'] * 10 . ' %',
                'release_date' => \Carbon\Carbon::parse($movie['release_date'])->format('M d,Y'),
                'genres' => $genresFormatted,
            ])->only([
                'id', 'poster_path', 'genres', 'title', 'vote_average', 'overview',
                'release_date', 'credits', 'videos', 'images', 'crew', 'cast', 'original_title'
            ]);
        });
    }
}
