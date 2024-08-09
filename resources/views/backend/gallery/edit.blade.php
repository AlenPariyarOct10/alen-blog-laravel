@extends("template.admin-dash")

@section("title", "Edit Gallery")

@section("content")
    <form class="p-4" action="{{ route('backend.gallery.update', $galleryItem->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="caption">Caption</label>
            <input type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" id="caption" value="{{$galleryItem->caption}}" placeholder="Enter caption of gallery image">
            @error('caption')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image_upload">Image</label>
            <div>
            <img src="{{ asset('assets/uploads/gallery/' . $galleryItem->image) }}" alt="Image"
                 style="max-width: 100px; height: auto;">
            <input type="file" name="image_upload" class="form-control-file @error('image') is-invalid @enderror" id="image_upload">
            @error('image_upload')
            </div>
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="rank">Rank</label>
            <input type="number" max="100" class="form-control @error('rank') is-invalid @enderror" name="rank" id="rank" value="{{$galleryItem->rank}}" placeholder="Enter rank">
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
