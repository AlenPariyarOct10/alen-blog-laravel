@extends("template.admin-dash")

@section("title", "Setting")

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

               <tr>
                   <th scope="col">Name</th>
                   <th scope="col">{{$user->name}}</th>
               </tr>
               <tr>
                   <th scope="col">Email</th>
                   <th scope="col">{{$user->email}}</th>
               </tr>

               <tr>
                   <th scope="col">Profile Image</th>

                   <th scope="col">
                       <div class="form-group">

                           <div>
                               <img class="rounded" src="{{ asset('assets/uploads/setting/' . $user->profile_image) }}" alt="{{$user->name}}Image"
                                    style="max-width: 100px; height: auto;">

                           </div>

                       </div>
                   </th>
               </tr>
               <tr>
                   <td>
                       <div class="btn-group" role="group" aria-label="Basic example">
                           <a href="{{route('backend.setting.edit')}}" class="btn btn-primary">Edit</a>
                           <a href="{{route('backend.setting.changepassword')}}" class="btn btn-success">Change Password</a>
                       </div>
                   </td>
               </tr>


           </table>

    </div>
@endsection
