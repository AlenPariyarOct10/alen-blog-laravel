@extends("template.admin-dash")

@section("title", "Create Gallery")

@section("content")
    <form class="p-4" action="{{ route('backend.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="caption">Caption</label>
            <input type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" id="caption" placeholder="Enter caption of gallery image">
            @error('caption')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image_upload">Image</label>
            <input type="file" name="image_upload" class="form-control-file @error('image') is-invalid @enderror" id="image_upload">
            @error('image_upload')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="rank">Rank</label>
            <input type="number" max="100" class="form-control @error('rank') is-invalid @enderror" name="rank" id="rank" placeholder="Enter rank">
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
