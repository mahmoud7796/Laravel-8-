<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Category
        </h2>
    </x-slot>

    <div class="py-12 container">
        @if(Session('success'))
            <div class="row mr-2 ml-2 py-2">
                <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                        id="type-error">{{Session('success')}}
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        All brand
                    </div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">brand name</th>
                    <th scope="col">brand image</th>
                    <th scope="col">created_at</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($brands as $brand)
                    <tr>
                        <th scope="row">{{$brand -> id}}</th>
                        <td>{{$brand -> brand_name}}</td>
                        <td>  <img style="width: 100px; height: 100px" src="{{$brand -> brand_image}}"></td>
                        <td>{{Carbon\Carbon::parse($brand -> created_at)-> diffForHumans()}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('brand.edit',$brand ->id)}}">Edit</a>
                            <a class="btn btn-danger" href="{{route('brand.delete',$brand ->id)}}">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{--        {!! $brands -> links() !!}--}}
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Add Category
                    </div>
                    <div class="card-body">
                        <form action="{{route('brand.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Brand Name</label>
                                <input name="brand_name" class="form-control" id="">
                                @error('brand_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Brand Image</label>
                                <input type="file" name="brand_image" class="form-control" id="">
                                @error('brand_image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add brand</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
