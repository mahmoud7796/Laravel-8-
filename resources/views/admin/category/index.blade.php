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
                        All Category
                    </div>

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Category name</th>
                    <th scope="col">User</th>
                    <th scope="col">created_at</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$categories -> firstItem()+$loop->index}}</th>
                        <td>{{$category -> category_name}}</td>
                        <td>{{$category -> users -> name}}</td>
                        <td>{{Carbon\Carbon::parse($category -> created_at)-> diffForHumans()}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('category.edit',$category -> id)}}">Edit</a>
                            <a class="btn btn-danger" href="{{route('category.trash',$category -> id)}}">
                                Move to trash
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                    {!! $categories->links() !!}
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Add Category
                    </div>
                    <div class="card-body">
                        <form action="{{route('category.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Category Name</label>
                                <input name="category_name" class="form-control" id="">
                                @error('category_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                    {{--      <div class="mb-3">
                                <label for="projectinput1"> اسم المستخدم</label>
                                <select name="user_id" class="select2 form-control">
                                    <optgroup label="من فضلك أختر اسم المستخدم">
                                        @if($users && $users -> count() > 0 )
                                            @foreach($users as $user)
                                                <option value="{{$user -> id}}"> {{$user -> name}} </option>
                                            @endforeach
                                        @endif
                                    </optgroup>

                                </select>
                                @error('user_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>--}}

                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>


            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Trash
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Category name</th>
                                <th scope="col">User</th>
                                <th scope="col">created_at</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trash as $category)
                                <tr>
                                    <th scope="row">{{$categories -> firstItem()+$loop->index}}</th>
                                    <td>{{$category -> category_name}}</td>
                                    <td>{{$category -> users -> name}}</td>
                                    <td>{{Carbon\Carbon::parse($category -> created_at)-> diffForHumans()}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{route('category.restore',$category -> id)}}">Restore</a>
                                        <a class="btn btn-danger" href="{{route('category.delete',$category -> id)}}">Delete</a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $categories->links() !!}
                    </div>
                </div>
            </div>


    </div>
</x-app-layout>
