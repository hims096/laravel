@extends('layout.master')

@section('title')
    Home Page
@endsection

<style>
    .container {

        background-position: fixed;

    }
</style>
@section('welcomepage')
    <div>
        <div class="card mb-3">
            <img src="{{ url('/images/collage.jpg') }}" class="card-img-top " alt="..." height="400px" width="1200px">
            <div class="card-body">
                <h5 class="card-title">KIRC Institute Of Management </h5>
                <p class="card-text"><i> ipsum dolor sit amet consectetur adipisicing elit. Aliquid amet, praesentium officia
                        quaerat aperiam maiores itaque sequi quod libero voluptatibus laboriosam, error, inventore id
                        dignissimos minima eveniet enim numquam iste.</i></p>
            </div>
        </div>

        <div class=" container ">
            <p>
                <center>
                    <button class="my-1 btn btn-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#contentId" aria-expanded="false" aria-controls="contentId">
                        Our Facilities
                    </button>
                </center>
            </p>
            <div class="collapse" id="contentId">
                <table class="text-center table">
                    <tr>
                        <th><b>
                                <h3>Facilities</h3>
                            </b></th>
                    </tr>

                    <tr class="row">
                        <td>Hostel</td>
                        <td>Canteen & Cafeteria</td>
                        <td>Mess</td>
                        <td>Sports</td>
                        <td>Workshop</td>
                        <td>Auditorium</td>
                        <td>Medical Facilities</td>
                        <td>Transportation </td>
                    </tr>

                </table>
            </div>

        </div>

        <div class="container card my-3">
            <center>
                <h2><b>Bolgs Update...</b></h2>
                <hr>
            </center>
            <div class="">
                <a class="btn btn-primary btn-sm float-end" href="{{ route('blog') }}">Add Blog</a>
                <form class="form-inline col-6" action="" method="GET">
                    <input type="search" class="form-control mr-sm-2 " name="search_blog"
                        placeholder="search by Blog Title" value="{{ $search_blog }}">
                    <button class="btn btn-outline-success my-2 my-sm-2">Search</button>
                    <a href="{{ url('student/welcome') }}" class="btn btn-outline-danger my-sm-2 my-2">Reset</a>
                </form>

                @foreach ($blogPosts as $post)
                    <div class="mx-4 row col-12">
                        <div class="  col-7">
                            <h4>{{ $post->title }}</h4>
                            <p>{{ Str::limit($post->content, 450) }}...
                                @if ($post->content)
                                    <a class="btn btn-info btn-sm " style="width: 100px"
                                        href="{{ route('blog.comments', $post->slug) }}">Read More</a>
                                @endif
                            </p>
                        </div>

                        <div class=" col-5">
                            <img src="https://source.unsplash.com/user/c_v_r/1900x800" alt="blog Image" width="350px"
                                height="200px">
                        </div>
                        <p><b>Blog Post... {{ $post->created_at->diffForHumans() }}</b></p>

                    </div>
                @endforeach

                <div>
                    {{ $blogPosts->links() }}
                </div>


            </div>
        </div>
    @endsection

    