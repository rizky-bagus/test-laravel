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
                    <div style="margin-left: 2%;margin-right: 2%;margin-top: 2%;margin-bottom: 2%;">
                        <table id="table_id" class="" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nomer</th>
                                    <th>Nama Barang</th>
                                    <th>Berat Barang</th>
                                    <th>Warna Barang</th>
                                    <th>Toko</th>
                                    <th>Harga Barang</th>
                                    <th>Stock Barang</th>
                                    <th>Category Barang</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
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
