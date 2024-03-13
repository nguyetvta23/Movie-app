<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class TVShowsViewModel extends ViewModel
{    public $tvShows;
    public function __construct($tvShows)
    {
        $this->tvShows = $tvShows;
    }
    public function tvShows()
    {
        return $this->formatTvShows($this->tvShows);
    }
    public function formatTvShows($tvshow)
    {
        return collect($tvshow)->map(function ($tvshow) {
            return collect($tvshow)->merge([
                'backdrop_path' => 'https://image.tmdb.org/t/p/w500/' . $tvshow['poster_path'],
                'vote_average' => $tvshow['vote_average'] * 10 . ' %',
                'first_air_dae' => \Carbon\Carbon::parse($tvshow['first_air_date'])->format('M d,Y'),
            ]);
        });
    }
}
