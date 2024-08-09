@extends("template.admin-dash")

@section("title", "Projects")

@section("content")
    <div>

        @if (session('success'))
            <div class="alert alert-success m-1">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger m-1">
                <strong>{{ session('error') }}</strong>
            </div>
        @endif
           <table class="table">
               <thead>
               <tr>
                   <th scope="col">Title</th>
                   <th scope="col">Description</th>
                   <th scope="col">Sub-description</th>
                   <th scope="col">Thumbnail</th>
                   <th scope="col">Technologies</th>
                   <th scope="col">GitHub</th>
                   <th scope="col">Action</th>
               </tr>
               </thead>
               <tbody>

               @forelse($projects as $project)
                   <tr scope="row">

                   <td>{{$project->title}}</td>
                   <td>{!! Str::words(strip_tags($project->description), 20, '...') !!}</td>
                    <td>{!! Str::words(strip_tags($project->sub_description), 20, '...') !!}</td>
                   <td> <img src="{{ asset('assets/uploads/project/' . $project->thumbnail) }}" alt="Image"
                             style="max-width: 100px; height: auto;"></td>
                       <td>{{$project->technologies}}</td>
                       <td>{{$project->github_link}}</td>


                       <td>
                           <div class="btn-group" role="group" aria-label="Basic example">
                               <a href="{{route('backend.projects.edit', $project->id)}}" class="btn btn-primary">Edit</a>
                               <form action="{{route('backend.projects.destroy', $project->id)}}" method="post">
                                   @csrf
                                   <input type="hidden" name="_method" value="DELETE">
                                   <input type="Submit" class="btn btn-danger" value="Delete">
                               </form>
                           </div>
                       </td>
                       @empty
                           <tr scope="row">
                               <td class="text-center" colspan="7">Empty</td>
                           </tr>
               @endforelse


               </tr>

               </tbody>
           </table>


    </div>
@endsection
