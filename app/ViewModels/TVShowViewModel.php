<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class TVShowViewModel extends ViewModel
{
    public $tvshow;
    public $credit;
    public function __construct($tvshow, $credit)
    {
        $this->tvshow = $tvshow;
        $this->credit = $credit;
    }
    public function tvshow()
    {
        return collect($this->tvshow)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $this->tvshow['poster_path'],
            'vote_average' => $this->tvshow['vote_average'] * 10 . ' %',
            'first_air_date' => \Carbon\Carbon::parse($this->tvshow['first_air_date'])->format('M d,Y'),
            'genres' => collect($this->tvshow['genres'])->pluck('name')->flatten()->implode(', '),
            'created_by' => collect($this->credit['cast'])->take(5),
        ])->only([
            'id', 'poster_path', 'genres', 'name', 'vote_average', 'overview',
            'first_air_date', 'created_by',
        ]);
    }
}
