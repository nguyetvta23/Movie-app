@extends('layout.main')
@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto py-16 px-16 flex flex-col md:flex-row">
            <div class="actor-info">
                <img src="{{$actorDetail['profile_path']}}" class="md:w-96 w-100 mb-8" alt="">
                <h1 class="text-white text-xl font-semibold mb-8">
                    Personal info:
                </h1>
                <h4 class="text-white font-semibold mb-8">
                    Known for: <span class="text-md font-normal">Actors</span>
                </h4>
                <h4 class="text-white font-semibold mb-8 ">
                    Known credits: <span class="text-md font-normal">Actors</span>
                </h4>
                <h4 class="text-white font-semibold mb-8 ">
                    Gender: <span class="text-md font-normal">{{$actorDetail['gender']}}</span>
                </h4>
                <h4 class="text-white font-semibold mb-8 ">
                    Also known as: <span class="text-md font-normal">
                        <br>
                        {{$actorDetail['also_know_as']}}
                    </span>
                </h4>
            </div>
            <div class="mt-16 md:mt-0 md:ml-24">
                <h2 class="text-4xl font-semibold">{{$actorDetail['name']}}</h2>
                <div class="flex mt-3 items-center text-sm text-gray-400">
                    <span class="ml-1">
                        <a href="{{$social['facebook']}}" class="fa fa-facebook"></a>
                    </span>
                    <span class="mx-2">|</span>
                    <span><a href="{{$social['twitter']}}" class="fa fa-twitter"></a></span>
                    <span class="mx-2">|</span>
                    <span><a href="{{$social['instagram']}}" class="fa fa-instagram"></a></span>
                    <span class="mx-2">|</span>
                    <span><a href="#" class="fa fa-globe"></a></span>
                    <span class="mx-2">|</span>
                    <span class="flex gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-6">
                            <path d="m4.75 1-.884.884a1.25 1.25 0 1 0 1.768 0L4.75 1ZM11.25 1l-.884.884a1.25 1.25 0 1 0 1.768 0L11.25 1ZM8.884 1.884 8 1l-.884.884a1.25 1.25 0 1 0 1.768 0ZM4 7a2 2 0 0 0-2 2v1.034c.347 0 .694-.056 1.028-.167l.47-.157a4.75 4.75 0 0 1 3.004 0l.47.157a3.25 3.25 0 0 0 2.056 0l.47-.157a4.75 4.75 0 0 1 3.004 0l.47.157c.334.111.681.167 1.028.167V9a2 2 0 0 0-2-2V5.75a.75.75 0 0 0-1.5 0V7H8.75V5.75a.75.75 0 0 0-1.5 0V7H5.5V5.75a.75.75 0 0 0-1.5 0V7ZM14 11.534a4.749 4.749 0 0 1-1.502-.244l-.47-.157a3.25 3.25 0 0 0-2.056 0l-.47.157a4.75 4.75 0 0 1-3.004 0l-.47-.157a3.25 3.25 0 0 0-2.056 0l-.47.157A4.748 4.748 0 0 1 2 11.534V13a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-1.466Z" />
                        </svg> {{$actorDetail['birthday']}} ( {{$actorDetail['age']}} years old ) in {{$actorDetail['place_of_birth']}}
                    </span>
                </div>
                <div class="biography my-8">
                    <h2 class="font-semibold">Biography: </h2>
                    <p class="text-gray-300 mt-8">
                        {{$actorDetail['biography']}}
                    </p>
                </div>
                <div class="known-for">
                    <h4 class="text-white font-semibold">
                        Known for:
                    </h4>
                    <div class="overflow-x-scroll space-x-8 flex my-4 gap-4">
                        @foreach ($knowForMovies as $movie)   
                        <div class="mt-8 flex-shrink-0 w-1/4">
                            <a  href="{{route('movies.show',$movie['id'])}}">
                                <img  src="{{$movie['poster_path']}}" class="hover:opacity-75 transition ease-in-out duration-300" alt="">
                            </a>
                            <div class="mt-2">
                                <a href="{{route('movies.show',$movie['id'])}}" class="text-lg mt-2 hover:text-blue-500">
                                    {{$movie['title']}}
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-12">
                    <h4 class="text-white font-semibold">
                        Credits
                    </h4>
                    @foreach ($credits as $credit)
                    <div class="p-2 flex">
                        <div class="pr-4">
                        <p class="text-xl font-bold">{{$credit['release_year']}}</p>
                        </div>
                        <div>
                        <div class="uppercase hover:text-blue-600 tracking-wide text-sm text-white font-semibold">{{$credit['title']}}</div>
                        <p class="mt-2 text-gray-500">as {{$credit['character']}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
        </div>
    </div>
    
@endsection