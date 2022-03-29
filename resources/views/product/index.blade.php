@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Data Product</h3>
                    </div>
                    <div style="margin-left: 2%;margin-right: 2%;margin-top: 2%;margin-bottom: 2%;overflow-x:auto;">
                        <table id="table_id" class="table table-bordered table-hover" style="width: 100%;">
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
            </div>
        </div>
    </div> 
@endsection

@section('script')
    <script src="{{asset('app/build/product.js')}}" type="text/javascript"></script>
@endsection
