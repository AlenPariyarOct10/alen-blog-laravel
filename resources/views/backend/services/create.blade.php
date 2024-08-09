@extends("template.admin-dash")

@section("title", "Create Services")

@section("content")
    <form class="p-4" action="{{ route('backend.services.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="title" id="name" value="{{ old('name') }}" placeholder="Enter name">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="icon">Icon</label>
            <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" id="icon" value="{{ old('icon') }}" placeholder="Enter icon class">
            @error('icon')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ old('description') }}" placeholder="Enter description">
            @error('description')
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
                <option value="bg-green-600" default>Green</option>
                <option value="bg-red-600">Red</option>
                <option value="bg-yellow-600">Yellow</option>
                <option value="bg-orange-600">Orange</option>
                <option value="bg-blue-600">Blue</option>
            </select>
            @error('color_class')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
