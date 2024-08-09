@extends("template.admin-dash")

@section("title", "Edit Options")

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
    <form class="p-4" action="{{ route('backend.options.update', $allOptions->id) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        @csrf

        <div class="form-group">
            <label for="title">Auto Typer Prefix</label>
            <input type="text" value="{{$allOptions->dynamic_typer_prefix}}" class="form-control @error('dynamic_typer_prefix') is-invalid @enderror" name="dynamic_typer_prefix" id="dynamic_typer_prefix" placeholder="Enter dynamic_typer_prefix">
            @error('dynamic_typer_prefix')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="dynamic_typer_array">Auto Typer Array</label>
            <input type="text" value="{{$allOptions->dynamic_typer_array}}" class="form-control @error('dynamic_typer_array') is-invalid @enderror" name="dynamic_typer_array" id="dynamic_typer_array" placeholder="Enter dynamic_typer_array">
            @error('dynamic_typer_array')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="facebook">Facebook</label>
            <input type="text" value="{{$allOptions->facebook}}" class="form-control @error('facebook') is-invalid @enderror" name="facebook" id="facebook" placeholder="Enter facebook link">
            @error('facebook')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="instagram">Instagram</label>
            <input type="text" value="{{$allOptions->instagram}}" class="form-control @error('instagram') is-invalid @enderror" name="instagram" id="instagram" placeholder="Enter instagram link">
            @error('instagram')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="linkedin">LinkedIn</label>
            <input type="text" value="{{$allOptions->linkedin}}" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" id="linkedin" placeholder="Enter linkedin link">
            @error('linkedin')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
