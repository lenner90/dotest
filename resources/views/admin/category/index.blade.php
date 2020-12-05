<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           All Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="col-12 row mx-0">
                <div class="col-8">
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('success')}}</strong> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-header"> All Category</div>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">User</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- @php($i=1) -->
                                @foreach($Category as $cat)
                                <tr>
                                    <th scope="row">{{$Category->firstItem()+$loop->index}}</th>
                                    <td>{{$cat->category_name}}</td>
                                    <td>{{$cat->user->name}}</td>
                                    <td>{{Carbon\Carbon::parse($cat->created_at)->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{ url('category/edit/'.$cat->id) }}" class="btn btn-info"> Edit</a>
                                        <a href="{{ url('softdelete/category/'.$cat->id) }}" class="btn btn-danger"> Delete</a>
                                    </td>

                                </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                        <div class="card-body">{{$Category->links()}}</div>
       
                    </div>
                </div>

                <div class="col-4">
                    <div class="card">

                        <div class="card-header">Add Category</div>
                        <div class="card-body">
                            <form action="{{route('store.category')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    @error('category_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>

                    </div>
                </div>

                
            </div>
        </div>


        <!-- Trash part -->
        <div class="container">
            <div class="col-12 row mx-0">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header"> Trash Category</div>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">User</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- @php($i=1) -->
                                @foreach($trashCat as $cat)
                                <tr>
                                    <th scope="row">{{$Category->firstItem()+$loop->index}}</th>
                                    <td>{{$cat->category_name}}</td>
                                    <td>{{$cat->user->name}}</td>
                                    <td>{{Carbon\Carbon::parse($cat->created_at)->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{ url('category/restore/'.$cat->id) }}" class="btn btn-info"> Restore</a>
                                        <a href="{{ url('pdelete/category/'.$cat->id) }}" class="btn btn-danger"> P Delete</a>
                                    </td>

                                </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                        <div class="card-body">{{$trashCat->links()}}</div>
       
                    </div>
                </div>


                
            </div>
        </div>
    </div>
</x-app-layout>
