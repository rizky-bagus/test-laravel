@extends('layouts.app') 
@section('content') 
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
            <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Data Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                        <form onsubmit="updateProduct(this,event)" method="PUT">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name Product</label>
                                    <input type="hidden" class="form-control" value="{{ $data->id }}" id="id" name="id" placeholder="">
                                    <input type="text" class="form-control" value="{{ $data->name }}" id="name" name="name" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Weight Product</label>
                                    <input type="text" class="form-control" value="{{ $data->weight }}" id="weight" name="weight" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Product</label>
                                    <input type="text" class="form-control" value="{{ $data->category }}" id="category" name="category" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Color Product</label>
                                    <input type="text" class="form-control" value="{{ $data->color }}" id="color" name="color" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Store Product</label>
                                    <input type="text" class="form-control" value="{{ $data->store }}" id="store" name="store" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price Product</label>
                                    <input type="text" class="form-control" value="{{ $data->price }}" id="price" name="price" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Stock Product</label>
                                    <input type="text" class="form-control" value="{{ $data->stock }}" id="stock" name="stock" placeholder="">
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