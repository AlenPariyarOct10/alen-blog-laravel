@extends("template.admin-dash")

@section("title", "Blog")

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
                   <th scope="col">Content</th>
                   <th scope="col">Rank</th>
                   <th scope="col">Slug</th>
                   <th scope="col">Highlighted</th>
                   <th scope="col">Thumbnail</th>
                   <th scope="col">Action</th>
               </tr>
               </thead>
               <tbody>

               @forelse($blogs as $blog)
                   <tr scope="row">

                   <td>{{$blog->title}}</td>
                   <td>{!! Str::words(strip_tags($blog->content), 20, '...') !!}</td>
                   <td>{{$blog->rank}}</td>
                   <td>{{$blog->slug}}</td>
                   <td>{{($blog->highlighted=="0")?"Yes":"No"}}</td>
                   <td> <img src="{{ asset('assets/uploads/blog/' . $blog->thumbnail) }}" alt="Image"
                             style="max-width: 100px; height: auto;"></td>


                       <td>
                           <div class="btn-group" role="group" aria-label="Basic example">
                               <a href="{{route('backend.blogs.edit', $blog->id)}}" class="btn btn-primary">Edit</a>
                               <form action="{{route('backend.blogs.destroy', $blog->id)}}" method="post">
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
           {{$blogs->links()}}

    </div>
@endsection
