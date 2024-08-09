@extends("template.admin-dash")

@section("title", "Create Blogs")

@section("content")
{{--{"title",--}}
{{--"content",--}}
{{--"slug",--}}
{{--"thumbnail",--}}
{{--"rank",--}}
{{--"highlighted"}--}}
    <form class="p-4" action="{{ route('backend.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter title">
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div id="check_title"></div>
        </div>

        <div class="form-group">
            <label for="editor">Content</label>
            <textarea type="text" class="form-control @error('content') is-invalid @enderror" name="content" id="editor" placeholder="Enter content"></textarea>
            @error('content')
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
        <div class="form-group">
            <label for="rank">Rank</label>
            <input placeholder="Enter rank" value="1" type="number" name="rank" class="form-control-file @error('rank') is-invalid @enderror" id="rank">
            @error('rank')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="1">Highlighted</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="highlighted" id="true" value="1">
                <label class="form-check-label" for="true">
                    Yes
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="highlighted" value="0" id="false" checked>
                <label class="form-check-label" for="false">
                    No
                </label>
            </div>

            @error('rank')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
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
        ClassicEditor.create( document.querySelector( '#editor' ), {
            ckfinder: {
                uploadUrl:'{{route('ckeditor.upload').'?_token='.csrf_token()}}'
            }
        } )
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
    <script>
        document.getElementById("title").addEventListener("keyup", (event)=>{

            $.ajax({
                url: '{{route("backend.blogs.checkTitle")}}',
                method: "get",
                data: {
                    title: event.target.value,
                    _token: '{{csrf_token()}}',
                },

                success: (message)=>{
                    console.log(message.available);
                    if(message.available)
                    {
                        document.getElementById("check_title").innerHTML = "<p class='text-success'>Title is available</p>";

                    }else{
                        document.getElementById("check_title").innerHTML = "<p class='text-danger'>Title is unavailable</p>";
                        document.getElementById("submitBtn").disabled = true;

                    }
                }
            })
        })
    </script>

@endsection
