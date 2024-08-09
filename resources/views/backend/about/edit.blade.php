@extends("template.admin-dash")

@section("title", "Edit About")

@section("content")
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form class="p-4" action="{{ route('backend.about.update', $aboutInfo->id) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" value="{{$aboutInfo->title}}" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter title">
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="icon">Icon</label>
            <input value="{{$aboutInfo->icon}}" type="text" class="form-control @error('title') is-invalid @enderror" name="icon" id="icon" placeholder="Enter icon tag">
            @error('icon')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="rank">Rank</label>
            <input value="{{$aboutInfo->rank}}" placeholder="Enter rank" value="1" type="number" name="rank" class="form-control-file @error('rank') is-invalid @enderror" id="rank">
            @error('rank')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea placeholder="Enter description" name="description" class="form-control-file @error('description') is-invalid @enderror" id="description">{!! $aboutInfo->description !!}</textarea>
            @error('rank')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="sub-description">Sub-Description</label>
            <textarea placeholder="Enter sub-description" name="sub-description" class="form-control-file @error('sub-description') is-invalid @enderror" id="sub-description">{!! $aboutInfo['sub-description'] !!}</textarea>
            @error('sub-description')
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
                    <option value="{{$color[0]}}" {{$aboutInfo->color_class===$color[0]?'selected':''}} >{{$color[1]}}</option>

                @endforeach

            </select>
            @error('color_class')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
