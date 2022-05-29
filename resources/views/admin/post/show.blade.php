@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-column align-items-center">
        <h1>{{ $post->title }}</h1>
        <h3>{{ $post->author }}</h3>
        <h5>{{ (new DateTime($post->created_at))->format('d/m/Y') }}</h5>

        @if ($post->img)
        <img src="{{ $post->img }}" alt="post-title">
        @endif

        <p class="mt-3 px-5 fs-3">
            {{ $post->text }}
        </p>
    </div>
</div>
@endsection
