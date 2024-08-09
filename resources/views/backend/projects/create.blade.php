@extends("template.admin-dash")

@section("title", "Add Projects")

@section("content")

    <form class="p-4" action="{{ route('backend.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter title">
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="editor">Description</label>
            <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Enter description"></textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="editor">Sub-Description</label>
            <textarea type="text" class="form-control @error('sub_description') is-invalid @enderror" name="sub_description" placeholder="Enter sub-description"></textarea>
            @error('sub_description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="editor">GitHub Link</label>
            <textarea type="text" class="form-control @error('github_link') is-invalid @enderror" name="github_link" placeholder="Enter github link"></textarea>
            @error('github_link')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="editor">Technologies used</label>
            <textarea type="text" class="form-control @error('technologies') is-invalid @enderror" name="technologies" placeholder="Enter technologies used"></textarea>
            @error('technologies')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="thumbnail_upload">Thumbnail</label>
            <img style="display: none" class="rounded" id="thumbnail_preview" height="150px" src="" alt="" srcset="">
            <input type="file" name="thumbnail_upload" class="form-control-file @error('thumbnail_upload') is-invalid @enderror" id="thumbnail_upload" onchange="showPreview(event)">
            @error('thumbnail_upload')

            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection



@section("js")

    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        ClassicEditor.create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        function showPreview(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById('thumbnail_preview');
                preview.src = src;
                preview.style.display = 'block';
            }
        }
    </script>

@endsection
