@extends('layout.main')
@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto py-16 px-16 flex flex-col
        md:flex-row">
            <img src="{{$tvshow['poster_path']}}" class="md:w-96 w-100" alt="">
            <div class="mt-16 md:mt-0 md:ml-24">
                <h2 class="text-4xl font-semibold">{{$tvshow['name']}}</h2>
                <div class="flex items-center text-sm text-gray-400">
                    <span>
                        <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                    </span>
                    <span class="ml-1">{{$tvshow['vote_average']}}</span>
                    <span class="mx-2">|</span>
                    <span>{{$tvshow['first_air_date']}}</span>
                    <span class="mx-2">|</span>
                    <span>
                        {{$tvshow['genres']}}
                    </span>
                </div>
                <p class="text-gray-300 mt-8">
                {{$tvshow['overview']}}
                </p>
                <div class="mt-12">
                    <h4 class="text-white font-semibold">
                        Created By:
                    </h4>
                    <div class="flex mt-4">
                        @foreach ($tvshow['created_by'] as $name)
                        <div class="mr-3">
                            {{$name['name'].','}}
                        </div>   
                        @endforeach
                    </div>
                </div>
{{--             
                <div class="mt-12 row">
                    <a class="w-25" href="https://www.youtube.com/watch?v=">
                        <button class="flex items-center bg-orange-500 text-gray-900 rounded font-semibold 
                        px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-300">
                        <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                        <span class="ml-2">Play Trailer</span>
                        </button>
                    </a>
                </div> --}}
            </div>
            
        </div>
    </div>
@endsection