@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Book Field</h4><br>
                            <form method="POST" action="create" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Date of Use</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" value="date_of_use" id="date_of_use"
                                            name="date_of_use">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Select Sport</label>
                                    <div class="col-sm-10">
                                        <select id="sport" class="form-select" aria-label="Default select example"
                                            name="sport">
                                            <option selected="">Choose Sport</option>
                                            @foreach ($data as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Select Court</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" id="field_name" aria-label="Default select example"
                                            name="field">

                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Amount</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" class="price" name="price"
                                            value="" id="price" readonly>
                                    </div>
                                </div>
                                <!-- end row -->

                                <!-- end row -->
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Book">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sport').on('change', function() {
                var field_id = $(this).val();
                // var div = $(this).parent();

                // var op = " ";

                if (field_id) {
                    $.ajax({
                        type: 'get',
                        url: '{{ URL::to('findField') }}',
                        data: {
                            'id': field_id
                        },
                        success: function(data) {
                            //console.log('success');

                            //console.log(data);
                            $('#field_name').empty();
                            $('#field_name').append(
                                '<option value=""selected disabled>Select Product</option>');
                            $.each(data, function(key, value) {
                                $('#field_name').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                            //console.log(data.length);
                            // op += '<option value="0" selected disabled>chose product</option>';
                            // for (var i = 0; i < data.length; i++) {
                            //     op += '<option value="' + data[i].id + '">' + data[i].field_name +
                            //         '</option>';
                            // }

                            // div.find('#field_name').html(" ");
                            // div.find('#field_name').append(op);
                        },
                        // error: function() {

                        // }
                    });
                } else {
                    $('#field_name').empty();
                    $('#field_name').append('<option value="">Select Product</option>');
                }


            })



            $('#field_name').on('change', function() {
                var price_id = $(this).val();


                $.ajax({
                    type: 'get',
                    url: '{{ route('findPrice') }}',
                    data: {
                        'id': price_id
                    },
                    dataType: 'json',
                    success: function(data) {

                        //console.log(data.price);
                        $('#price').val(data.price);

                    },

                });


            })

            $('#date_of_use').on('change', function() {

                var selectedDate = $(this).val();
                var selectedSport = $('#sport').val();

                if (selectedDate && selectedSport) {
                    $.ajax({
                        type: 'get',
                        url: '{{ route('getAvailableFields') }}',
                        data: {
                            date: selectedDate,
                            sport: selectedSport
                        },
                        success: function(data) {

                            $('#field').empty();
                            if (data.length > 0) {
                                console.log('Ready')
                                $.each(data, function(key, value) {
                                    $('#field').append('<option value="' + value.id +
                                        '">' + value.name + '</option>');
                                });
                            } else {
                                $('#field').append(
                                    '<option disabled>No available fields for this date</option>'
                                    );
                            }
                        }
                    });
                }
            });

        })
    </script>
@endsection
