@extends('admin.admin_master')

@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="col-12 row mx-0">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">Edit Testimonial</div>
                        <div class="card-body">
                            <form action="{{ url('testimonial/update/'.$testimonials->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{$testimonials->user_profile}}">
                                <div class="form-group">
                                    <img src="{{asset($testimonials->user_profile)}}" style="width:400px;height:200px;" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update User Image</label>
                                    <input type="file" name="user_profile" class="form-control" value="{{$testimonials->user_profile}}">
                                    @error('user_profile')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update User Name</label>
                                    <input type="text" name="user_name" class="form-control" value="{{$testimonials->user_name}}">
                                    @error('user_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update User Title</label>
                                    <input type="text" name="user_title" class="form-control" value="{{$testimonials->user_title}}">
                                    @error('user_title')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Update User Comment</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="user_comment">
                                    {{ $testimonials->user_comment }}
                                    </textarea>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Update Brand</button>
                            </form>
                        </div>

                    </div>
                </div>

                
            </div>
        </div>
    </div>
@endsection