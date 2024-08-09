@php
    use App\Models\Setting;
 @endphp

@extends("template.main")

@section("title", "Blog")

@section("content")
    <div class="bg-blend-darken py-10 sm:py-10">
        <div class="mx-auto w-full px-6 lg:px-8">
            <!-- Post Section -->
            <section class="w-full flex flex-col items-center px-3">
{{--    {{dd($blogInfo)}}--}}
                <article class="flex flex-col shadow my-4">
                    <!-- Article Image -->
                    <a href="#" class="hover:opacity-75">
                        <img class="object-cover h-48 min-w-full" src="{{asset("assets/uploads/blog/".$blogInfo->thumbnail)}}">
                    </a>
                    <div class="bg-dark flex flex-col justify-start p-6">

                        <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{$blogInfo->title}}</a>
                        <p href="#" class="text-sm pb-8">
                            By <a href="#" class="font-semibold hover:text-gray-800">{{$blogInfo->author->name}}</a>, Published on {{ \Carbon\Carbon::parse($blogInfo->created_at)->format('F d, Y') }}
                        </p>

                        <div class="pb-3">
                            {!! $blogInfo->content !!}
                        </div>
                    </div>
                </article>



                <div class="w-full flex flex-col text-center md:text-left md:flex-row shadow bg-dark mt-10 mb-10 p-6">
                    <div class="w-full md:w-1/5 flex justify-center md:justify-start pb-4">
                        <img src="{{asset("assets/uploads/setting/".$blogInfo->author->profile_image)}}" class="rounded-full shadow h-32 w-32">
                    </div>
                    <div class="flex-1 flex flex-col justify-center md:justify-start">
                        <p class="font-semibold text-2xl">{{$blogInfo->author->name}}</p>
                        <p class="pt-2">{{$blogInfo->author->bio}}</p>
                        <div class="flex items-center justify-center md:justify-start text-2xl no-underline text-blue-800 pt-4">
                            <a class="" target="_blank" href="{!! Setting::first()->facebook !!}">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a target="_blank" class="pl-4" href="{!! Setting::first()->instagram !!}">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a target="_blank" class="pl-4" href="{!! Setting::first()->linkedin !!}">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </div>
@endsection
