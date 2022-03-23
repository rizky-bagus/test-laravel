@extends('layouts.app') 
@section('content') 
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
            <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Create Data Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                        <form onsubmit="createProduct(this,event)" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name Product</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Weight Product</label>
                                    <input type="text" class="form-control" id="weight" name="weight" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Product</label>
                                    <input type="text" class="form-control" id="category" name="category" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Color Product</label>
                                    <input type="text" class="form-control" id="color" name="color" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Store Product</label>
                                    <input type="text" class="form-control" id="store" name="store" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price Product</label>
                                    <input type="text" class="form-control" id="price" name="price" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Stock Product</label>
                                    <input type="text" class="form-control" id="stock" name="stock" placeholder="">
                                </div>
                            </div>
                                
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="saveBtn">Submit</button>
                            </div>
                        </form>
                </div>
                <!-- /.card -->   
            <!-- /.card -->
            </div>
        </div>
    </div> 
@endsection

@section('script')
    <script src="{{asset('app/build/product.js')}}" type="text/javascript"></script>
@endsection