
@php
use App\Models\User;
 @endphp

@extends("template.main")

@section("title", "Blog")

@section("content")
    <div class="bg-blend-darken py-10 sm:py-10">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @forelse($blogs as $post)

                    <article class="flex max-w-xl flex-col items-start justify-between @if($post->highlighted) bg-green-800 @else bg-gray-700 @endif  p-5 rounded-3xl hover:bg-teal-950 cursor-pointer">
                        <div class="flex items-center gap-x-4 text-xs">
                            <time datetime="{{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y') }}" class="text-gray-300">{{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y') }}</time>
                            @if($post->highlighted)
                                <i class="text-yellow-600 fa-solid fa-star"></i>
                            @endif
                        </div>
                        <a href="{{$post->slug}}">
                        <div class="group relative">
                            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-100 group-hover:text-gray-100">
                                <a href="{{route("frontend.blogs.show", $post->slug)}}">
                                    <span class="absolute inset-0"></span>
                                    {{$post->title}}
                                </a>

                            </h3>
                            <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-200">{!! Str::words(strip_tags($post->content), 20, '...') !!}</p>
                        </div>
                        </a>
                        <div class="relative mt-8 flex items-center gap-x-4">
                            <img src="{{asset('/assets/uploads/setting/'.User::first()->profile_image)}}" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                            <div class="text-sm leading-6">
                                <p class="font-semibold text-gray-200">
                                    <a href="#">
                                        <span class="absolute inset-0"></span>
                                        {{User::first()->name}}
                                    </a>
                                </p>
                                <p class="text-gray-300">Developer</p>
                            </div>
                        </div>
                    </article>


                @empty
                    <p>No posts</p>
                @endforelse




                <!-- More posts... -->
            </div>
        </div>
    </div>
@endsection
