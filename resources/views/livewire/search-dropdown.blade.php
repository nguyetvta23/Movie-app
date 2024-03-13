<div class="relative mt-3 z-1000 md:mt-0">
    <input wire:model.live.debounce.100ms="search" type="text" 
    class="bg-gray-600 rounded-full w-64 py-1 px-4 focus:outline-none focus:shadown-outline pl-9" placeholder="Search">
    <div class="absolute top-0">
            <svg class="fill-current w-6 text-gray-500 mt-1 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
    </div>
    <div wire:loading class="spinner mr-5 mt-4"></div>
    <div class="absolute text-sm bg-gray-800 rounded w-64 mt-3">
        <ul>
            @if (empty($searchResults))
                <li class="border-b hidden border-gray-700">
                </li>
            @else
                @foreach ($searchResults as $movieOption)
                    <li class="border-b border-gray-700">
                        <a href="{{route('movies.show',$movieOption['id'])}}" 
                        class="block flex items-center gap-2 hover:bg-gray-700 px-3 py-3">
                            <img src="https://image.tmdb.org/t/p/w45/{{$movieOption['poster_path']}}" alt="">
                            {{ $movieOption['title'] }}</a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>