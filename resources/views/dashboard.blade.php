<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{--
         Hi.. <b class="w-5">{{Auth::user()-> name}}</b><br>
--}}
           <b style="float: right">Users Count
        <span class="badge badge-light bg-green-500">{{count($users)}}</span>
            </b>
        </h2>
    </x-slot>

    <div class="py-12 container">
        <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">created_at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user['id']}}</th>
                <td>{{$user['name']}}</td>
                <td>{{$user['email']}}</td>
                <td>{{$user['created_at']-> diffForHumans()}}</td>

            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
</x-app-layout>
