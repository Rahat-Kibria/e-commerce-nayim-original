@extends('admin.admin_master')

@section('title')
Add User -Page
@endsection

@section('content')

    <div class="sl-mainpanel">

        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Add Sub Admin
                </h6>
                <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-layout">
                        <div class="row ">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="name">
                                        @error('name')
                                          <div class="alert text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Phone <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="number" name="phone">
                                        @error('phone')
                                        <div class="alert text-danger">{{ $message }}</div>
                                      @enderror
                                </div>
                            </div><!-- col-4 -->
                        </div>
                        {{-- end row --}}
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="password" name="password">
                                        @error('password')
                                          <div class="alert text-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="email" name="email">
                                </div>
                            </div><!-- col-4 -->

                        </div>
                         {{-- end row --}}
                        <div class="row">
                           <div class="col-md-6">
                            <p>Access</p>
                           </div>
                        </div>
                         <div class="row ">
                            <div class="col-lg-3">
                                <label class="ckbox">
                                    <input type="checkbox" name="category" value="1">
                                    <span>Category</span>
                                </label>

                            </div> <!-- col-4 -->

                            <div class="col-lg-3">
                                <label class="ckbox">
                                    <input type="checkbox" name="cupon" value="1">
                                    <span>Cupon</span>
                                </label>

                            </div> <!-- col-4 -->
                            <div class="col-lg-3">
                                <label class="ckbox">
                                    <input type="checkbox" name="product" value="1">
                                    <span>Product</span>
                                </label>

                            </div> <!-- col-4 -->
                            <div class="col-lg-3">
                                <label class="ckbox">
                                    <input type="checkbox" name="blog" value="1">
                                    <span>Blog</span>
                                </label>

                            </div> <!-- col-4 -->

                        </div>
                         {{-- end row --}}

                         <div class="row ">
                            <div class="col-lg-3">
                                <label class="ckbox">
                                    <input type="checkbox" name="order" value="1">
                                    <span>Order</span>
                                </label>

                            </div> <!-- col-4 -->

                            <div class="col-lg-3">
                                <label class="ckbox">
                                    <input type="checkbox" name="report" value="1">
                                    <span>Report</span>
                                </label>

                            </div> <!-- col-4 -->
                            <div class="col-lg-3">
                                <label class="ckbox">
                                    <input type="checkbox" name="role" value="1">
                                    <span>Role</span>
                                </label>

                            </div> <!-- col-4 -->
                            <div class="col-lg-3">
                                <label class="ckbox">
                                    <input type="checkbox" name="return" value="1">
                                    <span>Return</span>
                                </label>

                            </div> <!-- col-4 -->

                        </div>
                         {{-- end row --}}

                         <div class="row ">
                            <div class="col-lg-3">
                                <label class="ckbox">
                                    <input type="checkbox" name="contact" value="1">
                                    <span>Contact</span>
                                </label>

                            </div> <!-- col-4 -->

                            <div class="col-lg-3">
                                <label class="ckbox">
                                    <input type="checkbox" name="comment" value="1">
                                    <span>Comment</span>
                                </label>

                            </div> <!-- col-4 -->
                            <div class="col-lg-3">
                                <label class="ckbox">
                                    <input type="checkbox" name="setiing" value="1">
                                    <span>Setting</span>
                                </label>

                            </div> <!-- col-4 -->
                            <div class="col-lg-3">
                                <label class="ckbox">
                                    <input type="checkbox" name="other" value="1">
                                    <span>Other</span>
                                </label>

                            </div> <!-- col-4 -->

                        </div>
                         {{-- end row --}}

                         <div class="row">
                            <div class="col-lg-3">
                                <label class="ckbox">
                                    <input type="checkbox" name="stock" value="1">
                                    <span>Stock</span>
                                </label>

                            </div> <!-- col-4 -->
                         </div>

                        <hr>
                        <br><br>

                        <div class="form-layout-footer">
                            <button class="btn btn-info mg-r-5">Submit</button>
                            {{-- <button class="btn btn-secondary">Cancel</button> --}}
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                 </div><!-- card -->

            </form>




        </div><!-- row -->


    </div><!-- sl-mainpanel -->





@endsection
