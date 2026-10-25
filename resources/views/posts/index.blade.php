
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Management System</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Post Management System</h2>
        </div>

        <div class="card-body">

            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Validation Errors --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Create New Post Form --}}
            <h4 class="mb-3">Create New Post</h4>

            <form method="POST" action="{{ route('posts.store') }}"
                  class="mb-5">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Post Title</label>
                    <input type="text" name="title"
                           class="form-control"
                           placeholder="Enter post title"
                           value="{{ old('title') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Post Body</label>
                    <textarea name="body" class="form-control"
                              rows="3" placeholder="Write your post"
                              required>{{ old('body') }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Category:</label>
                    <select name="category_id">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">
                    Save Post
                </button>
            </form>

            <hr>

            {{-- All Posts --}}
            <h4 class="mb-3">All Posts</h4>

            @forelse($posts as $post)

                <div class="card mb-3">
                    <div class="card-body">

                        {{-- Edit Form --}}
                        @if(request('edit') == $post->id)

                            <h5>Edit Post</h5>

                            <form method="POST"
                                  action="{{ route('posts.update', $post->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title"
                                           class="form-control"
                                           value="{{ $post->title }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Body</label>
                                    <textarea name="body" class="form-control"
                                              rows="3" required>{{ $post->body }}</textarea>
                                </div>

                                <button class="btn btn-primary" type="submit">
                                    Update
                                </button>

                                <a href="{{ route('posts.index') }}"
                                   class="btn btn-secondary">Cancel</a>
                            </form>

                        @else

                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p>Category:<strong>{{ $post->category->name ?? 'No Category' }}</strong></p>
                            <p class="card-text">{{ $post->body }}</p>

                            <small class="text-muted">
                                {{ $post->created_at?->format('d M Y') }}
                            </small>

                            <div class="mt-3">

                                {{-- View Post --}}
                                <a href="{{ route('posts.show', $post->id) }}"
                                   class="btn btn-info btn-sm text-white">
                                    View
                                </a>

                                {{-- Edit Post --}}
                                <a href="{{ route('posts.index', ['edit' => $post->id]) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                {{-- Delete Post --}}
                                <form method="POST"
                                      action="{{ route('posts.destroy', $post->id) }}"
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this post?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </form>

                            </div>

                        @endif
                    </div>
                </div>

            @empty

                <div class="alert alert-info">
                    No posts found. Create your first post above!
                </div>

            @endforelse

        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
