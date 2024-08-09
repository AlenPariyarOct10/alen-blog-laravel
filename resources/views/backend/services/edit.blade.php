@extends("template.admin-dash")

@section("title", "Create Services")

@section("content")
    <form class="p-4" action="{{ route('backend.services.update', $userService->id) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="title" id="name" value="{{ $userService->title }}" placeholder="Enter name">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="icon">Icon</label>
            <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" id="icon" value="{{ $userService->icon }}" placeholder="Enter icon class">
            @error('icon')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{  $userService->description }}" placeholder="Enter description">
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="rank">Rank</label>
            <input type="number" class="form-control @error('rank') is-invalid @enderror" name="rank" id="rank" value="{{ $userService->rank }}" placeholder="Enter rank">
            @error('rank')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{--
    bg-red-600
    bg-green-600
    bg-blue-600
    bg-orange-600
    bg-yellow-600
--}}
        <div class="form-group">
            <label for="color_class">Color Class</label>
            <select class="form-control @error('color_class') is-invalid @enderror" name="color_class" id="color_class" >
                @php
                    $colors = [
                        ['bg-green-600','Green'],
                        ['bg-red-600','Red'],
                        ['bg-yellow-600','Yellow'],
                        ['bg-orange-600','Orange'],
                        ['bg-blue-600','Blue'],
                    ];
                @endphp

                @foreach($colors as $color)
                    <option value="{{$color[0]}}" {{$userService->color_class===$color[0]?'selected':''}} >{{$color[1]}}</option>

                @endforeach

            </select>
            @error('color_class')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
