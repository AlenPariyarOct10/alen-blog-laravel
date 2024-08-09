@extends("template.admin-dash")

@section("title", "Services")

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
                   <th scope="col">Color</th>
                   <th scope="col">Description</th>
                   <th scope="col">Rank</th>
                   <th scope="col">Actions</th>
               </tr>
               </thead>
               <tbody>
               @foreach($userServices as $us)
                   <tr scope="row">

                   <td>{{$us->title}}</td>
                   <td>{!! $us->icon !!}</td>
                   <td>{{ $us->color_class }}</td>
                   <td>{{$us->description}}</td>
                   <td>{{$us->rank}}</td>
                       <td>
                           <div class="btn-group" role="group" aria-label="Basic example">
                               <a href="{{route('backend.services.edit', $us->id)}}" class="btn btn-primary">Edit</a>
                               <form action="{{route('backend.services.destroy', $us->id)}}" method="post">
                                   @csrf
                                   <input type="hidden" name="_method" value="DELETE">
                                   <input type="Submit" class="btn btn-danger" value="Delete">
                               </form>

                           </div>
                       </td>
               @endforeach

               </tr>

               </tbody>
           </table>
           {{$userServices->links()}}
    </div>
@endsection
