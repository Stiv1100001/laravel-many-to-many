@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <form action="{{ route('admin.posts.store') }}" method="POST">
                @csrf
                <input type="text" name="title" class=" form-control mb-3" placeholder="Title">
                <input type="text" name="author" class=" form-control mb-3" placeholder="Author">
                <textarea name="text" placeholder="Content" class=" form-control mb-3"></textarea>
                <input type="text" name="img" class=" form-control mb-3" placeholder="Image URL">

                @foreach ($categories as $category)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $category->id }}" id="flexCheckDefault"
                        name="categories[]">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ $category->name}}
                    </label>
                </div>
                @endforeach

                <input type="submit" value="Post" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection
