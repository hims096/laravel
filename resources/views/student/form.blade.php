@extends('layout.master')

@section('title')
    Student Form
@endsection 
@section('stdform')
    <div class="row container my-4 col-sm ">
        <div class="col-sm-4">

            <div class="">
                <center>
                    <h3>{{ $title }}</h3>
                </center>
            </div>

            <form action="{{ $url }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="fname" id="" aria-describedby="helpId"
                        placeholder="" value="{{ old('fname', $Students->fname ?? '') }}">
                    <span class="text-danger">
                        @error('fname')
                            {{ $message }}
                        @enderror
                    </span>

                </div>
                <div class="mb-3">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lname" id="" aria-describedby="helpId"
                        placeholder="" value="{{ old('lname', $Students->lname ?? '') }}">
                    <span class="text-danger">
                        @error('lname')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email ID</label>
                    <input type="email" class="form-control" name="email" id="" aria-describedby="helpId"
                        placeholder="" value="{{ old('email', $Students->email ?? '') }}">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" class="form-control" name="phone" id="" aria-describedby="helpId"
                        placeholder="" value="{{ old('phone', $Students->phone ?? '') }}">
                    <span class="text-danger">
                        @error('phone')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" id="" aria-describedby="helpId"
                        placeholder="" value="{{ old('address', $Students->address ?? '') }}">
                    <span class="text-danger">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Date Of Birth</label>
                    <input type="date" class="form-control" name="dob" id="" aria-describedby="helpId"
                        placeholder="" value="{{ old('dob', $Students->dob ?? '') }}">
                    <span class="text-danger">
                        @error('dob')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Upload Documets</label>
                    <input type="file" class="form-control"
                        name="image"value="{{ old('image') or $Students->image ?? '' }}">
                    <span class="text-danger">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                {{-- <button type="submit">Submit</button> --}}
                <button class="btn btn-light" type="submit">Submit</button>
            </form>
        </div>
        <div class="col-sm-8 my-5">
            <p class="border border-dark">
            <h5>Header 1</h5>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum exercitationem ab autem animi iure, dolor
            magni suscipit alias aliquam voluptates minima, dolores illo modi sint quam, saepe similique molestias dicta

            Perspiciatis, quas vitae minus consequatur natus at praesentium id cumque
            voluptatibus at facere officia cumque incidunt
            iure porro cupiditate saepe quis praesentium obcaecati consectetur? Debitis eius, dignissimos totam
            voluptatem dolorem veniam similique officia, iste sequi repudiandae recusandae fuga voluptate at eos.
            </p>
            <p class="border border-dark">
            <h5>Header 2</h5>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum e
            provident accusantium neque. Sed deleniti nihil voluptas qui, accusamus adipisci iure tempore. Nesciunt
            cumque totam libero molestias maiores voluptate distinctio numquam voluptatem, reiciendis facere laboriosam?
            Quisquam quae ab ipsa voluptatum nostrum quam blanditiis, voluptatibus at facere officia cumque incidunt
            iure porro cupiditate saepe quis praesentium obcaecati consectetur? Debitis eius, dignissimos totam
            voluptatem dolorem veniam similique officia, iste sequi repudiandae recusandae fuga voluptate at eos.
            </p>

        </div>
    </div>
@endsection
