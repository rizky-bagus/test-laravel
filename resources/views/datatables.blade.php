<html>
<head>
    <title>Frontend ADE - Hari ke-5</title>
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
    <link rel="icon" type="image/x-icon" href="image/images.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
</head>
<body>
    <div class="container" style="margin-top: 25px;">
        <table id="table_id" class="display">
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
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</body>
<script src="js/jquery-3.6.0.js" type="text/javascript" charset="utf8"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
        $('#table_id').DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: "/datatable-barang",
                dataSrc: "data"
            },
            lengthMenu: [[10, 25, 50, 100, 200, 500, -1], [10, 25, 50, 100, 200, 500, "All"]],
            columns: [
                {data: 'DT_RowIndex'},
                {data: 'name'},
                {data: 'weight'},
                {data: 'color'},
                {data: 'store'},
                {data: 'price'},
                {data: 'stock'},
                {data: 'category'},
            ]
        });
    });
</script>
</html>