@extends("template.admin-dash")

@section("title", "Contact Form")

@section("content")
    <div>
       @if(Session::has('success'))
           {{Session::get('message')}}
        @endif
           <table class="table">
               <thead>
               <tr>
                   <th scope="col">Email</th>
                   <th scope="col">Subject</th>
                   <th scope="col">Message</th>
                   <th scope="col">Date</th>

{{--                   <th scope="col">Action</th>--}}
               </tr>
               </thead>
               <tbody>

               @forelse($allForm as $form)
                   <tr scope="row">

                   <td>{{$form->email}}</td>
                   <td>{{$form->subject}}</td>
                   <td>{{$form->message}}</td>
                   <td>{{$form->created_at}}</td>


                       @empty
                           <tr scope="row">
                               <td class="text-center" colspan="7">Empty</td>
                           </tr>
               @endforelse

               </tr>

               </tbody>
           </table>
           {{$allForm->links()}}


    </div>
@endsection
