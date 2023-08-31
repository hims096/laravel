@extends('layout.master')

@section('aboutstudent')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalId">
        Attendance
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('attendance.post') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" @required(true)>

                        </div>
                        <div class="container-fluid">
                            <
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var modalId = document.getElementById('modalId');

        modalId.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            let button = event.relatedTarget;
            // Extract info from data-bs-* attributes
            let recipient = button.getAttribute('data-bs-whatever');

            // Use above variables to manipulate the DOM
        });
    </script>


    <!-- Optional: Place to the bottom of scripts -->
    <script>
        const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
    </script>
    <div class="container">
        <div class="table-responsive">
            <table
                class="table table-striped
            table-hover	
            table-borderless
            table-primary
            align-middle">
                <thead class="table-light">
                    <caption>Attendance Record</caption>
                    <tr>
                        <th>Student Name</th>
                        <th>Attendance Date</th>
                        <th>Status</th>
                        <th>Teacher Note</th>
                    </tr>
                </thead>
                <tr></tr>
                <tbody class="table-group-divider">

                    @foreach ($attedances as $Student)
                        <tr class="table-primary">
                            <td>{{ $Student->name }}</td>
                            <td>{{ $Student->date }}</td>
                            <td>{{ $Student->status }}</td>
                            <td>{{ $Student->remark }}</td>
                        </tr>
                    @endforeach


                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>

    </div>
@endsection
