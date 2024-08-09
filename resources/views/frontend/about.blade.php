@extends("template.main")

@section("title", "About")

@section("content")
    @forelse($allInfo as $info)
    <div class="m-8">
        <div class="{{$info->color_class}} border-t-4 border-teal-500 rounded-b text-teal-200 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div class="py-1"><i class="{!! $info->icon !!} fill-current h-6 w-6 text-teal-200 mr-4"></i></div>
                <div>
                    <p class="font-bold">{{$info->title}}</p>
                    <p class="text-sm">{{$info->description}}</p>
                    <p class="text-sm">{{$info['sub-description']}}</p>
                </div>
            </div>
        </div>
    </div>
    @empty
        <div class="m-8">
            <div class="bg-red-950 border-t-4 border-teal-500 rounded-b text-teal-200 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1">Not available</div>
                </div>
            </div>
        </div>
    @endforelse
@endsection
