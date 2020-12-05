




@extends('admin.admin_master')

@section('admin')

    <div class="py-12"> 
   <div class="container">
    <div class="row">

    <div class="col-12 pb-2 d-flex justify-content-between">
                    <div class="align-self-center">
                        <h4>Contact Page</h4>
                    </div>
                    <!-- <div>
                        <a href="{{route('add.contact')}}"><button class="btn btn-info">Add Contact</button></a>
                    </div> -->

                </div>


    <div class="col-md-12">
     <div class="card">


     @if(session('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session('success') }}</strong>  
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
   </div>
   @endif


          <div class="card-header"> All Contact </div>
    

    <table class="table">
  <thead>
    <tr>
      <th scope="col" width="5%">SL</th>
      
      <th scope="col" width="15%">Contact Email</th>
      <th scope="col" width="15%">Contact Phone</th>
      <th scope="col" width="25%">Contact Address</th>
      <th scope="col" width="15%">Action</th>
    </tr>
  </thead>
  <tbody>
          @php($i = 1)
    @foreach($contacts as $con) 
    <tr>
      <th scope="row"> {{ $i++  }} </th>
      <td> {{ $con->email }} </td>
      <td> {{ $con->phone }} </td>
      <td> {{ $con->address }} </td>
      
       <td> 
       <a href="{{ url('contact/edit/'.$con->id) }}" class="btn btn-info">Edit</a>
        
        </td> 


    </tr> 
    @endforeach


  </tbody>
</table>
 
  
       </div>
    </div>

 


    </div>
  </div> 

 


    </div>
 @endsection
