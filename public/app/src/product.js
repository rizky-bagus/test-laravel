"use strict";

import { createData, deleteData, updateData} from "./api";

var KTDataProduct = function () {
    var initTable1 = function () {
        var table = $('#table_id')    
        table.DataTable({
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
                {},
            ],
            columnDefs: [
                {
                    targets: 0,
                    "searchable": false,
                    orderable: false,
                },
                {
                    targets: -1,
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return `
                        <a href="/product/` + full.id + `/edit" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit">
                          <i class="fa fa-edit"></i>
                        </a>
                        <a data=` + full.id + ` href="#" onclick="deleteProduct(this,event)" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">
                          <i class="fa fa-trash"></i>
                        </a>`;
                    },
                },
            ]
        });
    };

    return {

        //main function to initiate the module
        init: function () {
            initTable1();
        },

    };

}();

var KTSelect2 = function () {
    // Private functions
    var demos = function () {
        $('#category').select2({
            placeholder: "Select a Category",
        });
    }

    // Public functions
    return {
        init: function () {
            demos();
        }
    };
}();

jQuery(document).ready(function () {
    KTDataProduct.init();
    KTSelect2.init();
});

window.createProduct = (input , evt) => {
    evt.preventDefault();

    let data = {
        weight: getValueJquery('weight'),
        name : getValueJquery('name'),
        category : getValueJquery('category'),
        color : getValueJquery('color'),
        store   : getValueJquery('store'),
        price   : getValueJquery('price'),
        stock : getValueJquery('stock'),
        id: Math.floor(Math.random() * 10)
    }

    beforeLoading('#saveBtn')
    createData('https://62333f6ba3d0e4ac0bddeb0b.mockapi.io/api/v1/product', data).then(res => {
        let response = res.data
        window.location.href = "/product";
    }).catch(err => {
        afterLoading('#saveBtn')
        let error = err.response.data
        if(!error.success) {
            toastr.error(error.message)
        }
    })
}

window.updateProduct = (input , evt) => {
    evt.preventDefault();

    let data = {
        weight: getValueJquery('weight'),
        name : getValueJquery('name'),
        category : getValueJquery('category'),
        color : getValueJquery('color'),
        store   : getValueJquery('store'),
        price   : getValueJquery('price'),
        stock : getValueJquery('stock'),
        id : getValueJquery('id')
    }

    beforeLoading('#saveBtn')
    updateData('https://62333f6ba3d0e4ac0bddeb0b.mockapi.io/api/v1/product/'+getValueJquery('id'), data).then(res => {
        let response = res.data
        window.location.href = "/product";
    }).catch(err => {
        afterLoading('#saveBtn')
        let error = err.response.data
        if(!error.success) {
            toastr.error(error.message)
        }
    })
}

window.deleteProduct = input => {
    Swal.fire({
        title: 'Warning',
        text: "Are you sure deleting this data?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            deleteData('https://62333f6ba3d0e4ac0bddeb0b.mockapi.io/api/v1/product/' + $(input).attr('data')).then(res => {
                Swal.fire('Success!', res.data.message, 'success');
            }).catch(error => {
                Swal.fire('Failed', error.response.errors, 'error');
            })

        }
    })
}