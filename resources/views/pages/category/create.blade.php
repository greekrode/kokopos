@extends('layouts.default')

@section('title', 'Category')

@section('content')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <form class="form-horizontal">
                        <div class="card-body">
                            <h4 class="card-title">Personal Info</h4>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">First Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="fname" placeholder="First Name Here">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Last Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="lname" placeholder="Last Name Here">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="lname" placeholder="Password Here">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email1" class="col-sm-3 text-right control-label col-form-label">Company</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email1" placeholder="Company Name Here">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Contact No</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="cono1" placeholder="Contact No Here">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Message</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="button" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title m-b-0">Form Elements</h5>
                        <div class="form-group m-t-20">
                            <label>Date Mask <small class="text-muted">dd/mm/yyyy</small></label>
                            <input type="text" class="form-control date-inputmask" id="date-mask" placeholder="Enter Date">
                        </div>
                        <div class="form-group">
                            <label>Phone <small class="text-muted">(999) 999-9999</small></label>
                            <input type="text" class="form-control phone-inputmask" id="phone-mask" placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group">
                            <label>International Number <small class="text-muted">+19 999 999 999</small></label>
                            <input type="text" class="form-control international-inputmask" id="international-mask" placeholder="International Phone Number">
                        </div>
                        <div class="form-group">
                            <label>Phone / xEx <small class="text-muted">(999) 999-9999 / x999999</small></label>
                            <input type="text" class="form-control xphone-inputmask" id="xphone-mask" placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group">
                            <label>Purchase Order <small class="text-muted">aaaa 9999-****</small></label>
                            <input type="text" class="form-control purchase-inputmask" id="purchase-mask" placeholder="Enter Purchase Order">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Elements</h5>
                        <div class="row mb-3 align-items-center">
                            <div class="col-lg-4 col-md-12 text-right">
                                <span>Tooltip Input</span>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <input type="text" data-toggle="tooltip" title="A Tooltip for the input !" class="form-control" id="validationDefault05" placeholder="Hover For tooltip" required>
                            </div>
                        </div>
                        <div class="row mb-3 align-items-center">
                            <div class="col-lg-4 col-md-12 text-right">
                                <span>Type Ahead Input</span>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <input type="text" class="form-control" placeholder="Type here for auto complete.." required>
                            </div>
                        </div>
                        <div class="row mb-3 align-items-center">
                            <div class="col-lg-4 col-md-12 text-right">
                                <span>Prepended Input</span>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">#</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Prepend" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 align-items-center">
                            <div class="col-lg-4 col-md-12 text-right">
                                <span>Appended Input</span>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="5.000" aria-label="Recipient 's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">$</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 align-items-center">
                            <div class="col-lg-4 col-md-12 text-right">
                                <span class="text-success">Input with Sccess</span>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <input type="text" class="form-control is-valid" id="validationServer01">
                                <div class="valid-feedback">
                                    Woohoo!
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 align-items-center">
                            <div class="col-lg-4 col-md-12 text-right">
                                <span class="text-danger">Input with Error</span>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <input type="text" class="form-control is-invalid" id="validationServer01">
                                <div class="invalid-feedback">
                                    Please correct the error
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <input type="text" class="form-control" placeholder="col-md-12">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-11">
                                <input type="text" class="form-control" placeholder="col-md-11">
                            </div>
                            <div class="col-lg-1 p-l-0">
                                <input type="text" class="form-control" placeholder="col-md-1">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="col-md-10">
                            </div>
                            <div class="col-lg-2">
                                <input type="text" class="form-control" placeholder="col-md-2">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="col-md-9">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" placeholder="col-md-3">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-8">
                                <input type="text" class="form-control" placeholder="col-md-8">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" placeholder="col-md-4">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-7">
                                <input type="text" class="form-control" placeholder="col-md-7">
                            </div>
                            <div class="col-lg-5">
                                <input type="text" class="form-control" placeholder="col-md-5">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <input type="text" class="form-control" placeholder="col-md-6">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" placeholder="col-md-6">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-5">
                                <input type="text" class="form-control" placeholder="col-md-5">
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" placeholder="col-md-7">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-2">
                                <input type="text" class="form-control" placeholder="col-md-2">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" placeholder="col-md-3">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" placeholder="col-md-4">
                            </div>
                            <div class="col-lg-2">
                                <input type="text" class="form-control" placeholder="col-md-2">
                            </div>
                            <div class="col-lg-1 p-l-0">
                                <input type="text" class="form-control" placeholder="col-md-1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- editor -->
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Quill Editor</h4>
                        <!-- Create the editor container -->
                        <div id="editor" style="height: 300px;">
                            <p>Hello World!</p>
                            <p>Some initial <strong>bold</strong> text</p>
                            <p>
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection
