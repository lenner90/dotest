@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
<div class="card card-default">
     <div class="card-header card-header-border-bottom">
          <h2>Create Testimonial</h2>
     </div>
     <div class="card-body">
     <form action="{{ route('store.testimonial') }}" method="POST" enctype="multipart/form-data">
          @csrf

                <div class="form-group">
                    <label for="exampleInputEmail1">User Image</label>
                    <input type="file" name="user_profile" class="form-control">
                    @error('user_profile')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

               <div class="form-group">
                <label for="exampleFormControlInput1">User name </label>
                <input type="text" name="user_name" class="form-control" id="exampleFormControlInput1" placeholder="Email">
               </div>

               <div class="form-group">
                <label for="exampleFormControlInput1">User Title </label>
                <input type="text" name="user_title" class="form-control" id="exampleFormControlInput1" placeholder="Email">
               </div>

               
                
               <div class="form-group">
                    <label for="exampleFormControlTextarea1">User Comment</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="user_comment">

                    </textarea>
               </div>

        
               <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    
               </div>
          </form>
     </div>
</div>
 


@endsection
