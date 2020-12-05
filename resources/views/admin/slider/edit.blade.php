@extends('admin.admin_master')

@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="col-12 row mx-0">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">Edit Slider</div>
                        <div class="card-body">
                            <form action="{{ url('slider/update/'.$sliders->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{$sliders->image}}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Slider Title</label>
                                    <input type="text" name="title" class="form-control" value="{{$sliders->title}}">
                                    @error('title')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Slider Description</label>
                                    <input type="text" name="description" class="form-control" value="{{$sliders->description}}">
                                    <!-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" >
                                        {{$sliders->description}}
                                    </textarea> -->
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Slider Image(size suggest : 1900*1100)</label>
                                    <input type="file" name="slider_image" class="form-control" value="{{$sliders->image}}">
                                    @error('slider_image')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <img src="{{asset($sliders->image)}}" style="width:400px;height:200px;" alt="">
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Update Slider</button>
                            </form>
                        </div>

                    </div>
                </div>

                
            </div>
        </div>
    </div>
@endsection