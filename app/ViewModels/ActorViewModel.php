<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class ActorViewModel extends ViewModel
{
    public $actorDetail;
    public $actorCredits;
    public $social;
    public function __construct($actorDetail, $social, $actorCredits)
    {
        $this->actorDetail = $actorDetail;
        $this->actorCredits = $actorCredits;
        $this->social = $social;
    }
    public function actorDetail()
    {
        return collect($this->actorDetail)->merge([
            'profile_path' => $this->actorDetail['profile_path']
                ? 'https://image.tmdb.org/t/p/w300/' . $this->actorDetail['profile_path']
                : 'https://via.placeholder.com/300x450',
            'birthday' => \Carbon\Carbon::parse($this->actorDetail['birthday'])->format('M d,Y'),
            'age' => \Carbon\Carbon::parse($this->actorDetail['birthday'])->age,
            'also_know_as' => collect($this->actorDetail['also_known_as'])->implode(', '),
            'gender' => $this->actorDetail['gender'] == 1 ? 'Female' : 'Male',
        ]);
    }
    public function social()
    {
        return collect($this->social)->merge([
            'twitter' => $this->social['twitter_id']
                ? 'https://twitter.com/' . $this->social['twitter_id'] : null,
            'instagram' => $this->social['instagram_id']
                ? 'https://instagram.com/' . $this->social['instagram_id'] : null,
            'facebook' => $this->social['facebook_id']
                ? 'https://facebook.com/' . $this->social['facebook_id'] : null,
        ])->dump();
    }
    public function knowForMovies()
    {
        $castMovies = collect($this->actorCredits)->get('cast');
        return  collect($castMovies)->where('media_type', 'movie')->sortByDesc('popularity')->take(5)
            ->map(function ($movie) {
                return collect($movie)->merge([
                    'poster_path' => $movie['poster_path'] ? 'https://image.tmdb.org/t/p/w185/' . $movie['poster_path']
                        : 'http:://via/placeholder.com/186x278',
                    'title' => isset($movie['title']) ? $movie['title'] : 'Untitled',

                ]);
            });
    }
    public function credits()
    {
        $castMovies = collect($this->actorCredits)->get('cast');
        return  collect($castMovies)->map(function ($movie) {
            if (isset($movie['release_date'])) {
                $releaseDate = $movie['release_date'];
            } elseif (isset($movie['first_air_date'])) {
                $releaseDate = $movie['first_air_date'];
            } else {
                $releaseDate = '';
            }
            if (isset($movie['title'])) {
                $title = $movie['title'];
            } elseif (isset($movie['name'])) {
                $title = $movie['name'];
            } else {
                $title = 'Untitled';
            }
            return collect($movie)->merge([
                'release_date' => $releaseDate,
                'release_year' => isset($releaseDate) ? \Carbon\Carbon::parse($releaseDate)->format('Y') : 'Future',
                'title' => $title,
                'character' => isset($movie['character']) ? $movie['character'] : 'unknown',
            ]);
        })->sortByDesc('release_date');
    }
}
