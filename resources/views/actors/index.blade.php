@extends('layout.main')
@section('content')
    <div class="container mx-auto px-16 pt-16">
        <!--Begin popular actors-->
        <div class="popular-actor">
            <h2 class="uppercase tracking-wide
            text-orange-400 text-lg font-semibold">Popular Actors</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularActors as $actor)
                <div class="actors">
                    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
                    <div class="mt-8">
                        <a  href="{{route('actors.show',$actor['id'])}}">
                            <img class="hover:opacity-75 transition ease-in-out duration-300" src="{{$actor['profile_path']}}" alt="">
                        </a>
                        <div class="mt-2">
                            <a href="{{route('actors.show',$actor['id'])}}" class="text-lg mt-2 hover:text-gray-300">
                                {{$actor['name']}}
                            </a>
                            <div class="flex items-center text-sm text-gray-400">
                                <span>{{$actor['known_for']}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- End popular actors -->
        {{-- <div class="page-load-status flex justify-between my-8">
            <p class="infinite-scroll-request spinner my-8 text-4xl">&nbsp;</p>
            <p class="infinite-scroll-last">End of content</p>
            <p class="infinite-scroll-error">Error</p>
        </div> --}}
    </div>  
    
@endsection
@section('scripts')
    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
    <script>
        let elem = document.querySelector('.grid');
        let infScroll = new InfiniteScroll( elem, {
        // options
        path: '/actors/pages/@{{#}}',
        append: '.actors',
        status: '.page-load-status',
    // history: false,
    });
    </script>
@endsection