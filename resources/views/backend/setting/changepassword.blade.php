@extends("template.admin-dash")

@section("title", "Change Password")

@section("content")
    <div>

        @if(Session::has('success'))
            {{Session::get('message')}}
        @endif
        <table class="table">
            <form action="{{route("backend.setting.updatepassword")}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <tr>
                    <th scope="col">Current Password</th>
                    <th scope="col">
                        <input type="text" name="current_password" id="current_password">
                    </th>
                    @error('current_password')
                    <div class="alert alert-danger m-1">
                        <strong>{{$message}}</strong>
                    </div>
                    @enderror

                </tr>
                <tr>
                    <th scope="col">New Password</th>
                    <th scope="col"> <input type="text" name="new_password" id="new_password"></th>
                </tr>
                <tr>
                    <th scope="col">Confirm new Password</th>
                    <th scope="col"> <input type="text" name="new_password_confirmation" id="new_password_confirmation"></th>
                </tr>

                <tr>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <input type="submit" class="btn btn-primary"></input>
                        </div>
                    </td>
                </tr>
            </form>


        </table>

    </div>
@endsection
