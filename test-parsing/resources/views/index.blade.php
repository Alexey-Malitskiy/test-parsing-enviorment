@extends('welcome')

@section('content')
    <div class="">
        <table class="col-12 p-5">
            <thead class="">
            <tr class="col-12 row p-5 d-flex justify-content-around">
                <th class="col-3 text-center">Id</th>
                <th class="col-3 text-center">Post</th>
                <th class="col-3 text-center">Post number</th>
                <th class="col-3 text-center">Created at</th>
            </tr>
            </thead>
            <tbody class="p-5">
            @foreach ($allPosts as $post)
                <tr class="col-12 row p-5 d-flex justify-content-around">
                    <td class="col-3 text-center">{{ $post->id }}</td>
                    <td class="col-3 text-center"><a href="{{url('/post/show/' . $post->post_number)}} ">Show posts</a></td>
                    <td class="col-3 text-center">{{ $post->post_number }}</td>
                    <td class="col-3 text-center">{{ $post->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
