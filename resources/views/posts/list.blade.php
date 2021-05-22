@extends('layout')

@section('content')


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Age</th>
            <th scope="col">Created_at</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->first_name}}</td>
                <td>{{$post->last_name}}</td>
                <td>{{$post->age}}</td>
                <td>{{$post->created_at}}</td>
                <td><a href="{{route('posts.edit',$post->id)}}">Edit</a></td>
                <td>
                    <form action="{{route('posts.delete',$post->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button style="color: red">Delete</button>

                    </form>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>
    {{$posts->links()}}

@endsection
