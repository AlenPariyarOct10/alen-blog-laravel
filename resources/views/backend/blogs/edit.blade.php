@extends("template.admin-dash")

@section("title", "Create Blogs")

@section("content")
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="p-4" action="{{ route('backend.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{$blog->title}}" placeholder="Enter title">
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea type="text" class="form-control @error('content') is-invalid @enderror" name="content" id="content" placeholder="Enter content">{!! $blog->content !!}</textarea>
            @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="thumbnail_upload">Thumbnail</label>
            <div>
            <img src="{{ asset('assets/uploads/blog/' . $blog->thumbnail) }}" alt="{{$blog->title}}Image"
                 style="max-width: 100px; height: auto;">
            <input type="file" name="thumbnail_upload" class="form-control-file @error('thumbnail_upload') is-invalid @enderror" value="{{ old('thumbnail') }}" id="thumbnail_upload">
            @error('thumbnail_upload')
            </div>
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="rank">Rank</label>
            <input placeholder="Enter rank" value="1" type="number" name="rank" value="{{$blog->rank}}" class="form-control-file @error('rank') is-invalid @enderror" id="rank">
            @error('rank')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="1">Highlighted</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="highlighted" id="true" value=1 {{ ($blog->highlighted ==  1)? 'checked':''}} >
                <label class="form-check-label" for="true">
                    Yes
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="highlighted" value=0 id="false" {{ ($blog->highlighted == 0)? 'checked':''}} >
                <label class="form-check-label" for="false">
                    No
                </label>
            </div>

            @error('rank')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>





        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section("js")
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        // Initialize CKEditor
        ClassicEditor
            .create(document.querySelector('textarea'), {
                ckfinder: {
                    uploadUrl:'{{route('ckeditor.upload').'?_token='.csrf_token()}}'
                }
            })
            .then(editor => {
                console.log('Editor was initialized', editor);
            })
            .catch(error => {
                console.error('Error during initialization of the editor', error);
            });
    </script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
@endsection
