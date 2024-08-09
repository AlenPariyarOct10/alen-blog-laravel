
@php
    use App\Models\User;
@endphp

@extends("template.main")

@section("title", "Projects")

@section("content")
    <div class="bg-blend-darken py-10 sm:py-10">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @forelse($allProjects as $project)

                    <article class="flex max-w-xl flex-col items-start justify-between bg-gray-700 p-5 rounded-3xl hover:bg-teal-950 cursor-pointer">
                        <div class="flex items-center gap-x-4 text-xs">
                            <time datetime="{{ \Carbon\Carbon::parse($project->created_at)->format('F d, Y') }}" class="text-gray-300">{{ \Carbon\Carbon::parse($project->created_at)->format('F d, Y') }}</time>
                        </div>
                        <a href="{{ route("frontend.projects.show", $project->id) }}">
                            <div class="group relative">
                                <img class="rounded-3xl pt-2" src="{{ asset('assets/uploads/project/' .$project->thumbnail)}}" alt="" srcset="">
                                <h2 class="text-2xl font-bold leading-2 text-white ">{!! $project->title !!}</h2>
                                <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-200">{!! Str::words(strip_tags($project->description), 20, '...') !!}</p>
                                <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-200">{!! Str::words(strip_tags($project->sub_description), 20, '...') !!}</p>
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
