@extends("template.main")
@section("title", "Services")

@section("content")

    <div class="dark:text-slate-100 bg-white dark:bg-slate-900 py-5 sm:py-5">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                    @foreach($userServices as $services)
                        <div class="relative pl-16">
                            <dt class="text-base font-semibold leading-7 text-gray-300">
                                <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg {!! $services->color_class !!}">
                                    {!! $services->icon !!}
                                </div>
                                {{$services->title}}
                            </dt>
                            <dd class="mt-2 text-base leading-7 text-gray-600">{{$services->description}}</dd>
                        </div>
                    @endforeach
                        


{{--
    bg-red-600
    bg-green-600
    bg-blue-600
    bg-orange-600
    bg-yellow-600
--}}

                </dl>
            </div>
        </div>
    </div>


@endsection
