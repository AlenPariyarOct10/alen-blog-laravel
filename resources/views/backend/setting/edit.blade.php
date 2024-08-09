@extends("template.admin-dash")

@section("title", "Edit Setting")

@section("content")
    <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('success'))
            {{Session::get('message')}}
        @endif
        <table class="table">
            <form action="{{route("backend.setting.update")}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                @csrf
            <tr>
                <th scope="col">Name</th>
                <th scope="col">
                    <input type="text" name="name" id="name" value="{{$user->name}}">
                </th>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </tr>
            <tr>
                <th scope="col">Email</th>
                <th scope="col"> <input type="text" name="email" id="email" value="{{$user->email}}"></th>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </tr>

            <tr>
                <th scope="col">Bio</th>
                <th scope="col">
                    <textarea name="bio" id="bio">{!! $user->bio !!}</textarea>
                </th>
                @error('bio')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </tr>
            <tr>
                <th scope="col">Profile Image</th>

                <th scope="col">
                <div class="form-group">
                    <div>
                        <img src="{{ asset('assets/uploads/setting/' . $user->profile_image) }}" alt="{{$user->profile_image}}-Image"
                             style="max-width: 100px; height: auto;">
                        <input type="file" name="profile_img_upload" class="form-control-file @error('profile_img_upload') is-invalid @enderror" value="{{ old('profile_img_upload') }}" id="profile_img_upload">
                        @error('profile_img_upload')
                    </div>
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                </th>



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
