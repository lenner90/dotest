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
                        <div class="card-header">Edit Category</div>
                        <div class="card-body">
                            <form action="{{ url('category/update/'.$categories->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Update Category</label>
                                    <input type="text" name="category_name" class="form-control" value="{{$categories->category_name}}">
                                    @error('category_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Update Category</button>
                            </form>
                        </div>

                    </div>
                </div>

                
            </div>
        </div>
    </div>
</x-app-layout>
