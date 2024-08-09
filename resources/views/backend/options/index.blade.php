@extends("template.admin-dash")

@section("title", "Options Edit")

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
                   <th scope="col">Dynamic Typer Prefix</th>
                   <th scope="col">Dyanamic Typer Array</th>
                   <th scope="col">Facebook</th>
                   <th scope="col">Instagram</th>
                   <th scope="col">LinkedIn</th>

               </tr>
               </thead>
               <tbody>


               <tr scope="row">
                   <td>{{$allOptions->dynamic_typer_prefix}}</td>
                   <td>{{$allOptions->dynamic_typer_array}}</td>
                   <td>{{$allOptions->facebook}}</td>
                   <td>{{$allOptions->instagram}}</td>
                   <td>{{$allOptions->linkedin}}</td>
               </tr>


               </tbody>
           </table>


    </div>

    <a class="btn btn-primary" href="{{route("backend.options.edit")}}">
        Edit
    </a>

@endsection
