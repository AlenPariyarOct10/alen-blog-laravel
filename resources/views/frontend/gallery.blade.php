@extends("template.main")
@section("title", "Gallery")

@section("images")


    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 p-12">
        @foreach($images as $image)
            <div>
                <img class="h-auto max-w-full rounded-lg" src="{{ asset('assets/uploads/gallery/' . $image->image) }}" alt="{{$image->caption}}">
            </div>
        @endforeach

    </div>

@endsection


