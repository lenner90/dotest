@extends('admin.admin_master')

@section('admin')

<div class="col-lg-12">
<div class="card card-default">
     <div class="card-header card-header-border-bottom">
          <h2>Create About</h2>
     </div>
     <div class="card-body">
     <form action="{{ route('store.about') }}" method="POST">
          @csrf
               <div class="form-group">
                <label for="exampleFormControlInput1">About Title </label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Slider Title">
               </div>
                
               
                
               <div class="form-group">
                    <label for="exampleFormControlTextarea1">About Short Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="shortdesc">

                    </textarea>
               </div>

               <div class="form-group">
                    <label for="exampleFormControlTextarea1">About Long Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="longdesc">

                    </textarea>
               </div>

               <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    
               </div>
          </form>
     </div>
</div>
 


@endsection
