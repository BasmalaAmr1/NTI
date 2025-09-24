@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 class="mb-4">Articles</h2>
            @foreach($articles as $article)
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ Str::limit($article->content, 400) }}</p>
                        <p class="mb-1"><small class="text-muted">By {{ $article->user->name }} — {{ $article->created_at->format('d M Y, H:i') }}</small></p>

                        @auth
                            @if(auth()->user()->role === 'admin')
                                <form action="{{ url('/articles/'.$article->id) }}" method="POST" onsubmit="return confirm('Delete this article?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            @endforeach
            <div class="mt-3">{{ $articles->links() }}</div>
        </div>

        <div class="col-md-4">
            @auth
                <div class="card mb-3">
                    <div class="card-header">Add New Article</div>
                    <div class="card-body">
                        <form action="/articles" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="title" class="form-control" placeholder="Title" required>
                            </div>
                            <div class="mb-3">
                                <textarea name="content" class="form-control" rows="6" placeholder="Content" required></textarea>
                            </div>
                            <button class="btn btn-primary w-100">Add Article</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-body">
                        <p>Please <a href="{{ route('login') }}">login</a> to add an article.</p>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</div>
@endsection
