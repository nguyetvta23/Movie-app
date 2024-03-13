@extends('layout.main')
@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto py-16 px-16 flex flex-col md:flex-row">
            <img src="{{$movieDetail['poster_path']}}" class="md:w-96 w-100" alt="">
            <div class="mt-16 md:mt-0 md:ml-24">
                <h2 class="text-4xl font-semibold">{{$movieDetail['original_title']}}</h2>
                <div class="flex items-center text-sm text-gray-400">
                    <span>
                        <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                    </span>
                    <span class="ml-1">{{$movieDetail['vote_average']}}</span>
                    <span class="mx-2">|</span>
                    <span>{{$movieDetail['release_date']}}</span>
                    <span class="mx-2">|</span>
                    <span>
                        {{$movieDetail['genres']}}
                    </span>
                </div>
                <p class="text-gray-300 mt-8">
                    {{$movieDetail['overview']}}
                </p>
                <div class="mt-12">
                    <h4 class="text-white font-semibold">
                        Featured Cast
                    </h4>
                    <div class="flex mt-4">
                        @foreach ($movieDetail['crew'] as $crew)
                        <div class="mr-3">
                            <div>
                                <div>{{$crew['name']}}</div>
                            </div>
                            <div class="text-sm text-gray-400">
                                {{$crew['job']}}
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
                @if (count($movieDetail['videos']['results'])>0)
                <div class="mt-12 row">
                    <a class="w-25" href="https://www.youtube.com/watch?v={{$movieDetail['videos']['results'][0]['key']}}">
                        <button class="flex items-center bg-orange-500 text-gray-900 rounded font-semibold 
                        px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-300">
                        <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                        <span class="ml-2">Play Trailer</span>
                        </button>
                    </a>
                </div>
                @endif
                
            </div>
            
        </div>
    </div>
    <div class="movie-casts border-b border-gray-800">
        <div class="container mx-auto py-16 px-16">
            <h2 class="uppercase tracking-wide
            text-orange-400 text-lg font-semibold">Casts</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($movieDetail['casts'] as $cast)
                    <div class="mt-8">
                        <a  href="http://">
                            <img class="hover:opacity-75 transition ease-in-out duration-300" src="https://image.tmdb.org/t/p/w500/{{$cast['profile_path']}}" alt="">
                        </a>
                        <div class="mt-2">
                            <a href="" class="text-lg mt-2 hover:text-gray-300">
                                {{$cast['original_name']}}
                            </a>
                            <div class="text-gray-400">
                                {{$cast['character']}}
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>
    <div class="movie-images border-b border-gray-800">
        <div class="container mx-auto py-16 px-16">
            <h2 class="uppercase tracking-wide
            text-orange-400 text-lg font-semibold">Backdrops</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-3">
                @foreach ($movieDetail['images'] as $img)
                    <div class="">
                        <a  href="http://">
                            <img class="hover:opacity-75 transition ease-in-out duration-300" src="https://image.tmdb.org/t/p/w500/{{$img['file_path']}}" alt="">
                        </a>
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>
@endsection