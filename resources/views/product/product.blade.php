@extends('layout.master')

@section('title')
    Book
@endsection
@section('product')
    <div class="container">


        <!--create Modal -->
        <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Add Book</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">

                            <ul id="saveform_errlist"></ul>

                            <div class="mb-3">
                                <label for="">Book</label>
                                <input type="text" class="name form-control" name="name" id=""
                                    aria-describedby="helpId">
                            </div>
                            <div class="mb-3">
                                <label for="">Description</label>
                                <input type="text" class="description form-control" name="description" id=""
                                    aria-describedby="helpId">
                            </div>
                            <div class="mb-3">
                                <label for="">Price</label>
                                <input type="number" class="price form-control" name="price" id=""
                                    aria-describedby="helpId">
                            </div>
                            <div class="mb-3">
                                <label for="">Quentity</label>
                                <input type="number" class="quentity form-control" name="quentity" id=""
                                    aria-describedby="helpId">
                            </div>
                            <div class="mb-3">
                                <label for="">Tax</label>
                                <input type="number" class="gst form-control" name="gst" id=""
                                    aria-describedby="helpId">
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary add_product ">Save</button>
                    </div>
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

    </div>


    <!--update Modal -->
    <div class="modal fade" id="updatemodalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Update Book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">

                        <ul id="updateform_errlist"></ul>

                        <input type="hidden" id="edit_product_id">
                        <div class="mb-3">
                            <label for="">Book</label>
                            <input type="text" id="edit_name" class="name form-control" name="name" id=""
                                aria-describedby="helpId">
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <input type="text" id="edit_description" class="description form-control" name="description"
                                id="" aria-describedby="helpId" placeholder="desc">
                        </div>
                        <div class="mb-3">
                            <label for="">Price</label>
                            <input type="number" id="edit_price" class="price form-control" name="price"
                                id="" aria-describedby="helpId">
                        </div>
                        <div class="mb-3">
                            <label for="">Quentity</label>
                            <input type="number" id="edit_quentity" class="quentity form-control" name="quentity"
                                id="" aria-describedby="helpId">
                        </div>
                        <div class="mb-3">
                            <label for="">Tax</label>
                            <input type="number" id="edit_gst" class="gst form-control" name="gst" id=""
                                aria-describedby="helpId">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_product ">update</button>
                </div>
            </div>
        </div>
    </div>
    {{-- delete  products --}}

    <div class="modal fade" id="deletemodalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Delete Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <input type="hidden" id="delete_product_id">
                        <h4>Are You sure want to this book ? </h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary delete_product_btn ">Delete</button>
                </div>
            </div>
        </div>
    </div>



    {{-- display products --}}


    <div class="container card col-11 my-3">
        <div class="mb-2">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info btn-success float-end my-3" data-bs-toggle="modal"
                data-bs-target="#modalId">
                Add Book
            </button>
        </div>
        <div class="container col-5" id="success_message"></div>

        <h4>Choos A Book</h4>

        <div class="table-responsive text-center">
            <table class="table table-dark table-striped ">
                <thead>
                    <tr>
                        <th scope="col">Book Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quentity</th>
                        <th scope="col">Tax</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

    </div>
    {{-- //display end --}}
@endsection

@section('scriptproduct')
    <script>
        $(document).ready(function() {
            fetchproduct();


            // add to products
            $(document).on('click', '.add_product', function(e) {
                e.preventDefault();

                var data = {
                    'name': $('.name').val(),
                    'description': $('.description').val(),
                    'quentity': $('.quentity').val(),
                    'price': $('.price').val(),
                    'gst': $('.gst').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "post",
                    url: "/product/product",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {

                            $('#saveform_errlist').html("");
                            $('#saveform_errlist').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_vales) {

                                $('#saveform_errlist').append('<li>' +
                                    err_vales +
                                    '</li>');
                            });
                        } else {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message)
                            $('#modalId').modal('hide');
                            $('#modalId').find('input').val("");
                            fetchproduct();
                        }
                    }
                });
            });

            function fetchproduct() {

                $.ajax({
                    type: "GET",
                    url: "/product/show",
                    dataType: "json",
                    success: function(response) {
                        $('tbody').html("");
                        $.each(response.products, function(key, item) {
                            $('tbody').append('<tr class="">\
                                <td scope="row">' + item.name + '</td>\
                                <td>' + item.description + '</td>\
                                <td>' + item.price + '</td>\
                                <td>' + item.gst + '</td>\
                                <td>' + item.quentity + '</td>\
                                <td><button type="button" value="' + item.id + '" class="edit_product btn btn-info btn-sm" id="edit_product" >Update</button>\
                                <button type="button" value="' + item.id + '" class="delete_product btn btn-danger btn-sm" >Delete</button>\
                                </td>\
                            </tr>');

                        });
                    }
                });
            }

            // edit to product

            $(document).on('click', '.edit_product', function(e) {
                e.preventDefault();
                var prod_id = $(this).val();
                console.log(prod_id);
                $('#updatemodalId').modal('show');
                $.ajax({
                    type: "get",
                    url: "/product/edit/" + prod_id,
                    dataType: "json",
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 404) {

                            $('#success_message').html("");
                            $('#success_message').addClass("alert alert-danger");
                            $('#success_message').text(response.message);
                        } else {

                            $('#edit_name').val(response.products.name);
                            $('#edit_description').val(response.products
                                .description);
                            $('#edit_price').val(response.products.price);
                            $('#edit_quentity').val(response.products.quentity);
                            $('#edit_gst').val(response.products.gst);
                            $('#edit_product_id').val(prod_id);
                        }
                    }
                });
            });
            //delete button

            $(document).on('click', '.delete_product', function(e) {
                e.preventDefault();
                var prod_id = $(this).val();
                // alert(prod_id);
                $('#delete_product_id').val(prod_id);
                $('#deletemodalId').modal('show');
            });
            $(document).on('click', '.delete_product_btn', function(e) {
                e.preventDefault();
                var prod_id = $('#delete_product_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "DELETE",
                    url: "/product/delete/" + prod_id,
                    success: function(response) {
                        console.log(response);
                        $('#success_message').addClass("alert alert-success");
                        $('#success_message').text(response.message);
                        $('#deletemodalId').modal('hide');
                        fetchproduct();
                    }
                });

                // update to products
                $(document).on('click', '.update_product', function(e) {
                    e.preventDefault();

                    var prod_id = $('#edit_product_id').val();
                    var data = {

                        'name': $('#edit_name').val(),
                        'description': $('#edit_description').val(),
                        'quentity': $('#edit_price').val(),
                        'price': $('#edit_quentity').val(),
                        'gst': $('#edit_gst').val(),
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "PUT",
                        url: "/product/update/" + prod_id,
                        data: data,
                        dataType: "json",
                        success: function(response) {

                            // console.log(response);
                            if (response.status == 400) {
                                $('#updateform_errlist').html("");
                                $('#updateform_errlist').addClass('alert alert-danger');
                                $.each(response.errors, function(key, err_vales) {

                                    $('#updateform_errlist').append('<li>' +
                                        err_vales +
                                        '</li>');
                                });
                            } else if (response.status == 404) {
                                $('#updateform_errlist').html("");
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text(response.message)
                            } else {
                                $('#updateform_errlist').html("");
                                $('#success_message').html("");
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text(response.message)

                                $('#updatemodalId').modal('hide');
                                fetchproduct();
                            }
                        }
                    });

                });

            });
        });
    </script>
@endsection
