@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        {{-- <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div> --}}

                    </div>
                </div>
            </div>

            <!-- end page title -->
            <h4 class="card-title mb-4">Appointments</h4>
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    @foreach ($books as $book)
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <h5 class="font-size-14 mb-2 fw-normal">Date</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="font-size-14 mb-2 fw-normal">{{ $book->date_of_use }}</h5>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <h5 class="font-size-14 mb-2 fw-normal">Sport</h5>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($book->sport)
                                            <h5 class="font-size-14 mb-2 fw-normal">{{ $book->sport->name }}</h5>
                                        @else
                                            <p>Nil</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <h5 class="font-size-14 mb-2 fw-normal">Field</h5>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($book->field)
                                            <h5 class="font-size-14 mb-2 fw-normal">{{ $book->field->name }}</h5>
                                        @else
                                            <p>Nil</p>
                                        @endif

                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <h5 class="font-size-14 mb-2 fw-normal">Address</h5>
                                    </div>
                                    <div class="col-md-6">
                                        @if ($book->field)
                                            <h5 class="font-size-14 mb-2 fw-normal">{{ $book->field->address }}</h5>
                                        @else
                                            <p>Nil</p>
                                        @endif

                                    </div>
                                </div>

                            </div><!-- end cardbody -->
                        </div><!-- end card -->
                    @endforeach

                </div><!-- end col -->


                <div class="row">

                    <!-- end col -->
                </div>
                <!-- end row -->

                {{-- <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            

                            <h4 class="card-title mb-4">Latest Transactions</h4>

                            <div class="table-responsive">
                                <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Status</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th style="width: 120px;">Salary</th>
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">Charles Casey</h6>
                                            </td>
                                            <td>Web Developer</td>
                                            <td>
                                                <div class="font-size-13"><i
                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active
                                                </div>
                                            </td>
                                            <td>
                                                23
                                            </td>
                                            <td>
                                                04 Apr, 2021
                                            </td>
                                            <td>$42,450</td>
                                        </tr>
                                        <!-- end -->
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">Alex Adams</h6>
                                            </td>
                                            <td>Python Developer</td>
                                            <td>
                                                <div class="font-size-13"><i
                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive
                                                </div>
                                            </td>
                                            <td>
                                                28
                                            </td>
                                            <td>
                                                01 Aug, 2021
                                            </td>
                                            <td>$25,060</td>
                                        </tr>
                                        <!-- end -->
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">Prezy Kelsey</h6>
                                            </td>
                                            <td>Senior Javascript Developer</td>
                                            <td>
                                                <div class="font-size-13"><i
                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active
                                                </div>
                                            </td>
                                            <td>
                                                35
                                            </td>
                                            <td>
                                                15 Jun, 2021
                                            </td>
                                            <td>$59,350</td>
                                        </tr>
                                        <!-- end -->
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">Ruhi Fancher</h6>
                                            </td>
                                            <td>React Developer</td>
                                            <td>
                                                <div class="font-size-13"><i
                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active
                                                </div>
                                            </td>
                                            <td>
                                                25
                                            </td>
                                            <td>
                                                01 March, 2021
                                            </td>
                                            <td>$23,700</td>
                                        </tr>
                                        <!-- end -->
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">Juliet Pineda</h6>
                                            </td>
                                            <td>Senior Web Designer</td>
                                            <td>
                                                <div class="font-size-13"><i
                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active
                                                </div>
                                            </td>
                                            <td>
                                                38
                                            </td>
                                            <td>
                                                01 Jan, 2021
                                            </td>
                                            <td>$69,185</td>
                                        </tr>
                                        <!-- end -->
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">Den Simpson</h6>
                                            </td>
                                            <td>Web Designer</td>
                                            <td>
                                                <div class="font-size-13"><i
                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive
                                                </div>
                                            </td>
                                            <td>
                                                21
                                            </td>
                                            <td>
                                                01 Sep, 2021
                                            </td>
                                            <td>$37,845</td>
                                        </tr>
                                        <!-- end -->
                                        <tr>
                                            <td>
                                                <h6 class="mb-0">Mahek Torres</h6>
                                            </td>
                                            <td>Senior Laravel Developer</td>
                                            <td>
                                                <div class="font-size-13"><i
                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active
                                                </div>
                                            </td>
                                            <td>
                                                32
                                            </td>
                                            <td>
                                                20 May, 2021
                                            </td>
                                            <td>$55,100</td>
                                        </tr>
                                        <!-- end -->
                                    </tbody><!-- end tbody -->
                                </table> <!-- end table -->
                            </div>
                        </div><!-- end card -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
                <!-- end col -->
            </div> --}}
                <!-- end row -->
            </div>

        </div>
    @endsection
