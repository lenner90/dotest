@extends('admin.admin_master')

@section('admin')
<div class="py-12">
        <div class="container">
            <div class="col-12 row mx-0">
                <div class="col-12 pb-2 d-flex justify-content-between">
                    <div class="align-self-center">
                        <h4>Testimonial Page</h4>
                    </div>
                    <div>
                        <a href="{{route('add.testimonial')}}"><button class="btn btn-info">Add Testimonial</button></a>
                    </div>

                </div>
                <div class="col-12">
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('success')}}</strong> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-header"> All Tesimonial</div>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">User Profile</th>
                                <th scope="col">User Name</th>
                                <th scope="col">User Title</th>
                                <th scope="col">User Comment</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- @php($i=1) -->
                                @foreach($testimonials as $testimonial)
                                <tr>
                                    <th scope="row">{{$testimonials->firstItem()+$loop->index}}</th>
                                    <td><img src="{{asset($testimonial->user_profile)}}" style="height:40px;with:70px" alt=""></td>
                                    <td>{{$testimonial->user_name}}</td>
                                    <td>{{$testimonial->user_title}}</td>
                                    <td>{{$testimonial->user_comment}}</td>
                   
                                    <td>{{Carbon\Carbon::parse($testimonial->created_at)->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{ url('testimonial/edit/'.$testimonial->id) }}" class="btn btn-info"> Edit</a>
                                        <a href="{{ url('testimonial/delete/'.$testimonial->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger"> Delete</a>
                                    </td>

                                </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                        <div class="card-body">{{$testimonials->links()}}</div>
       
                    </div>
                </div>

           

                
            </div>
        </div>
    </div>
@endsection