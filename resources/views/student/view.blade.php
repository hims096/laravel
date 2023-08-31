@extends('layout.master')
@section('title')
    Details
@endsection
@section('stdview')
    <div class="container my-4 dropdown">
        <div class="container">
            <center>
                <h2 style="font-family: Verdana, Geneva, Tahoma, sans-serif">Students Data</h2>
            </center>
        </div>
        <a class="btn btn-info btn-sm float-end" style="margin-left: 4px" href="{{ route('student.form') }}">Add Student</a>

        <table class="table table-dark table-striped table-hover border text-center ">
            <div class=" b-3 my-2 col-3 ">
                <form class="form-inline" action="" method="GET">
                    <input type="search" class="form-control mr-sm-2" name="search"
                        placeholder="search by name or surname..." value="{{ $search }}">
                    <button class="btn btn-outline-success my-2 my-sm-2">Search</button>
                    <a href="{{ url('student/view') }}" class="btn btn-outline-danger my-sm-2 my-2">Reset</a>
                </form>
            </div>
            <thead>
                <tr class="border  border-dark ">   
                    <th scope="col">Sr No</th>
                    <th scope="col">Frist Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email ID</th>
                    <th scope="col">Phone </th>
                    <th scope="col">Address</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Action</th>
                    <th scope="col">More</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $sr = ($Students->currentpage() - 1) * $Students->perpage();
                @endphp

                @if ($search !== null)
                    @if ($Students->isEmpty())
                        <center>
                            <h3>"Data Is Not Found...!"</h3>
                        </center>
                    @else
                        @foreach ($Students as $Student)
                            <tr class="card-body">
                                <td scope="row">{{ $sr += 1 }}</td>
                                <td>{{ $Student->fname }}</td>
                                <td>{{ $Student->lname }}</td>
                                <td>{{ $Student->email }}</td>
                                <td>{{ $Student->phone }}</td>
                                <td>{{ $Student->address }}</td>
                                <td>{{ $Student->dob }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm"
                                        href="{{ url('/student/edit/') }}/{{ $Student->id }}">Update</a>
                                    <a class="btn btn-danger btn-sm"
                                        href="{{ url('/student/delete/') }}/{{ $Student->id }}"
                                        onclick="return confirm('Are sure Want A Delete it ?')">Delete</a>
                                </td>
                                <td><a class="btn btn-success btn-sm"
                                        href="{{ url('/student/details/') }}/{{ $Student->id }}">Go</a></td>
                                <td>
                                    <a href="{{ url('/storage/uploads/' . $Student->image) }}"><img
                                            src="{{ url('/storage/uploads/' . $Student->image) }}"class="card-img-top"
                                            alt="student image" height="50px" width="50px"></a>
                                </td>

                            </tr>
                        @endforeach
                    @endif
                @endif
            </tbody>
        </table>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{ $Students->links() }}
            </ul>
        </nav>
    </div>
    </div>
@endsection
