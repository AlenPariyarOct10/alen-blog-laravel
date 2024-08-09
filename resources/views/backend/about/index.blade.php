@extends("template.admin-dash")

@section("title", "About")

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
                   <th scope="col">Icon</th>
                   <th scope="col">Description</th>
                   <th scope="col">Sub-description</th>
                   <th scope="col">Rank</th>
                   <th scope="col">Color class</th>
                   <th scope="col">Actions</th>
               </tr>
               </thead>
               <tbody>

               @forelse($aboutInfo as $about)
                   <tr scope="row">

                   <td>{{$about->title}}</td>
                   <td>{{$about->icon}}</td>
                   <td>{{$about->description}}</td>
                   <td>{{$about['sub-description']}}</td>
                   <td>{{$about->rank}}</td>
                   <td>{{$about->color_class}}</td>




                       <td>
                           <div class="btn-group" role="group" aria-label="Basic example">
                               <a href="{{route('backend.about.edit', $about->id)}}" class="btn btn-primary">Edit</a>
                               <form action="{{route('backend.about.destroy', $about->id)}}" method="post">
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
