@php
    use App\Models\Setting;
@endphp

@extends("template.main")

@section("title", "Project : ".$project->title)

@section("content")
    <div class="bg-blend-darken py-10 sm:py-10">
        <div class="mx-auto w-full px-6 lg:px-8">
            <!-- Post Section -->
            <section class="w-full flex flex-col items-center px-3">

                <article class="flex flex-col shadow my-4">
                    <!-- Article Image -->
                    <a href="#" class="hover:opacity-75 flex justify-center">
                        <img class="object-fill h-72" src="{{asset("assets/uploads/project/".$project->thumbnail)}}">
                    </a>
                    <div class="bg-dark flex flex-col justify-start p-6">

                        <p class="text-3xl font-bold pb-4">{{$project->title}}</p>
                        <a aria-label="Visit GitHub" target="_blank" class="mb-5 relative flex-none text-sm text-center font-semibold text-white py-2.5 px-4 rounded-lg bg-slate-900 dark:bg-green-500 dark:text-white focus:outline-none hover:bg-slate-700 focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 dark:highlight-white/20 dark:hover:bg-green-400 dark:focus:ring-2 dark:focus:ring-green-600 dark:focus:ring-offset-slate-900" href="{{$project->github_link}}">View project on GitHub<span aria-hidden="true">→</span></a>

                        Technologies Used :
                        <ul class="border-t border-b list-disc pl-5">
                            @foreach(explode(" ", $project->technologies) as $tech)
                            <li>{{$tech}}</li>
                            @endforeach
                        </ul>
                        <br>

                        <p class="pb-4">{{$project->description}}</p>
                        <p class="pb-4">
                            @foreach(explode(".", $project->sub_description) as $line)
                                {{$line}}<br>
                            @endforeach
                        </p>
                        <p href="#" class="text-sm pb-8">
                            By <a href="#" class="font-semibold">{{$project->author->name}}</a>, Published on {{ \Carbon\Carbon::parse($project->created_at)->format('F d, Y') }}
                        </p>

                        <div class="pb-3">
                            {{$project->content}}
                        </div>
                    </div>
                </article>



                <div class="w-full flex flex-col text-center md:text-left md:flex-row shadow bg-dark mt-10 mb-10 p-6">
                    <div class="w-full md:w-1/5 flex justify-center md:justify-start pb-4">
                        <img src="{{asset("assets/uploads/setting/".$project->author->profile_image)}}" class="rounded-full shadow h-32 w-32">
                    </div>
                    <div class="flex-1 flex flex-col justify-center md:justify-start">
                        <p class="font-semibold text-2xl">{{$project->author->name}}</p>
                        <p class="pt-2">{{$project->author->bio}}</p>
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
