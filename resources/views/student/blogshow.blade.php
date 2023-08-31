@extends('layout.master')

@section('blogshow')
    <div>
        <div class="container card my-4">
            <div>
                <center><img class="my-3 img-fluid" src="https://source.unsplash.com/user/c_v_r/1900x800" alt="blog Image"
                        width="500px" height="200px"></center>

                <h4 class="my-2">{{ $post->title }}</h4>
                <p>{{ $post->content }}...</p>
                <div class="my-2">
                    <h6 class="float-end">Blog Posted... {{ $post->created_at->diffForHumans() }}</h6>
                </div>

            </div>

            <form action="{{ route('blog.comments', $post->slug) }}" method="post">
                @csrf
                <div>
                    <textarea name="content" rows="" placeholder="comment..."></textarea>
                </div>
                <div>
                    <button class="btn btn-success btn-sm" type="submit">Submit Comment</button>
                </div>
            </form>

            <h3>Comments</h3>

            @foreach ($commets as $comment)
                <h6>
                    <p class="mb-2">{{$comment->user_id }}</p>
                </h6>
                <hr>
                <p style="margin-left: 950px">{{ $comment->created_at->diffForHumans() }}</p>
                <p>{{ $comment->comment }}</p>
            @endforeach
        </div>
    </div>
@endsection
