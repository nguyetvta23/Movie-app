@extends('layout.main')
@section('content')
    <div class="container px-16 pt-16">
        <h2 class="trackimg-wide uppercase text-orange-400 text-lg font-semibold">popular TV Shows</h2>
        <div class="gap-4 px-3 py-4">
            {{-- <div class="filter mb-4">
                <select class="w-44 border rounded-md bg-gray-900 p-2" name="" id="">
                    <option value="">Popularity Descending</option>
                    <option value="">Name A-Z</option>
                    <option value="">1</option>
                </select>
            </div> --}}
            <div class="tvshows px-4 grid grid-cols-4 gap-8">
                @foreach ($tvShows as $tvshow)
                <div class="block rounded-lg shadow-secondary-1 dark:bg-surface-dark">
                    <a href="{{route('tvshow.show',$tvshow['id'])}}">
                        <img
                        class="rounded-t-lg"
                        src="{{$tvshow['backdrop_path']}}"
                        alt="" />
                    </a>
                    <div class="text-surface p-2">
                        <a href="{{route('tvshow.show',$tvshow['id'])}}">
                            <h5 class="text-lg mt-2 font-semibold hover:text-gray-300">{{$tvshow['original_name']}}</h5>
                        </a>
                        <span>{{$tvshow['first_air_date']}}</span>
                        <span class="mx-2">|</span>
                        <span>Rating: {{$tvshow['vote_average']}}</span>
                    </div>
                </div>
                    
                @endforeach
            </div>
        </div>
    </div>
@endsection