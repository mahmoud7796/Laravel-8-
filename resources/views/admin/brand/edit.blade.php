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
                        Add Category
                    </div>
                    <div class="card-body">
                        <form action="{{route('brand.update',$brands ->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input name="id" value="{{$brands ->brand_image}}" type="hidden">
                            <input name="oldImage" value="{{$brands ->brand_image}}" type="hidden">
                            <div class="form-group">
                                <div class="text-center">
                                    <img
                                        src="{{$brands-> brand_image}}"
                                        class="rounded-circle  w-25 p-3" alt="صورة القسم  ">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Brand Image</label>
                                <input type="file" name="brand_image" value="{{$brands->brand_image}}" class="form-control" id="">
                                @error('brand_image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Brand Name</label>
                                <input name="brand_name" value="{{$brands->brand_name}}" class="form-control" id="">
                                @error('brand_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">update brand</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
