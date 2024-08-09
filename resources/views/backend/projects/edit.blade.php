@extends("template.admin-dash")

@section("title", "Edit Projects Info")

@section("content")
    <form class="p-4" action="{{ route('backend.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{$project->title}}" placeholder="Enter title">
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Enter description">{!! $project->description !!}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Github Link</label>
            <textarea type="text" class="form-control @error('github_link') is-invalid @enderror" name="github_link" placeholder="Enter github link">{!! $project->github_link !!}</textarea>
            @error('github_link')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="sub_description">Sub-Description</label>
            <textarea type="text" class="form-control @error('sub_description') is-invalid @enderror" name="sub_description" placeholder="Enter sub-description">{!! $project->sub_description !!}</textarea>
            @error('sub_description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="technologies">Technologies Used</label>
            <textarea type="text" class="form-control @error('technologies') is-invalid @enderror" name="technologies" placeholder="Enter technologies used">{!! $project->technologies !!}</textarea>
            @error('technologies')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="thumbnail_upload">Thumbnail</label>
            <div>
            <img src="{{ asset('assets/uploads/project/' . $project->thumbnail) }}" alt="{{$project->title}}Image"
                 style="max-width: 100px; height: auto;">
            <input type="file" name="thumbnail_upload" class="form-control-file @error('thumbnail_upload') is-invalid @enderror" value="{{ old('thumbnail') }}" id="thumbnail_upload">
            @error('thumbnail_upload')
            </div>
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>







        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section("js")

@endsection
