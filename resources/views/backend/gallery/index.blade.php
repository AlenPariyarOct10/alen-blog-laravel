@extends("template.admin-dash")

@section("title", "Gallery")

@section("content")
    <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            @if (session('failed'))
            <div class="alert alert-danger">
                {{ session('failed') }}
            </div>
        @endif
        <table class="table">
            <thead class="bg-gray-900 text-gray-300 rounded">
            <tr>

                <th scope="col">Caption</th>
                <th scope="col">Image</th>
                <th scope="col">Rank</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($images as $image)
                <tr scope="row">

                    <td>{{$image->caption}}</td>
                    <td>
                        <img src="{{ asset('assets/uploads/gallery/' . $image->image) }}" alt="Image"
                             style="max-width: 100px; height: auto;">
                    </td>
                <td>
                    {{$image->rank}}
                </td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{route('backend.gallery.edit', $image->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('backend.gallery.destroy', $image->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="Submit" class="btn btn-danger" value="Delete">
                        </form>

                    </div>
                </td>
            @empty
                <tr scope="row">
                    <td colspan="4">Empty List</td>
                </tr>
                @endforelse

                </tr>

            </tbody>
        </table>

    </div>
@endsection
