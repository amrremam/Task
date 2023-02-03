@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Deleted posts</h1>
                <table>
                    <th>id</th>
                    <th>title</th>
                    <th>body</th>
                    <th>pro</th>
                    @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td>
                <a href="{{route('restore',$post->id)}}">Restore</a>
                    <form action="{{route('force',$post->id)}}" method="GET">
                            @method('DELETE')
                            @csrf
                            <button type="submit">DELETE</button>
                        </form>
                    </td>
            </tr>        
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
