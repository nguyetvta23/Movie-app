<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
    public $movieDetail;
    public function __construct($movieDetail)
    {
        $this->movieDetail = $movieDetail;
    }
    public function movieDetail()
    {
        return collect($this->movieDetail)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $this->movieDetail['poster_path'],
            'vote_average' => $this->movieDetail['vote_average'] * 10 . ' %',
            'release_date' => \Carbon\Carbon::parse($this->movieDetail['release_date'])->format('M d,Y'),
            'genres' => collect($this->movieDetail['genres'])->pluck('name')->implode(', '),
            'crew' => collect($this->movieDetail['credits']['crew'])->take(2),
            'casts' => collect($this->movieDetail['credits']['cast'])->take(5),
            'images' => collect($this->movieDetail['images']['backdrops'])->take(9),
        ]);
    }
}
