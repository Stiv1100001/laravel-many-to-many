@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            @if(session('deleted-message'))
            <div class="col-12">
                <div class="alert alert-warning">
                    {{session('deleted-message')}}
                </div>
            </div>
            @endif

            @if(session('message'))
            <div class="col-12">
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            </div>
            @endif

            <div class="col-12 d-flex justify-content-end mb-3">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-info">New Post</a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Text</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Created</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td><a href="{{ route('admin.posts.show', ['post' => $post]) }}">{{ $post->title }}</a></td>
                        <td>{{ $post->author }}</td>
                        <td>{{ Str::of($post->text)->limit(60, '...') }}</td>
                        <td>
                            @foreach ($post->categories as $cat)
                            <span class="badge badge-pill">{{$cat->name}}</span>
                            @endforeach
                        </td>
                        <td>{{ (new DateTime($post->created_at))->format('d/m/Y h:m') }}</td>
                        <td>
                            <a href="{{ route('admin.posts.edit', ['post' => $post])}}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.posts.destroy', $post)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No posts to show</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
