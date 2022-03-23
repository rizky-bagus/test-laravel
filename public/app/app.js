window.Swal = require('sweetalert2');
window.axios = require('axios');
window.toastr = require('toastr');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

$(document).ready(function() {
    $('#date').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD'
        },
        singleDatePicker: true,
        showDropdowns: true,
        calender_style: "picker_2"
    }, function(start, end, label) {

    });
});

$(document).ready(function() {
    $('#BirthDate').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD'
        },
        maxDate: new Date(),
        singleDatePicker: true,
        showDropdowns: true,
        calender_style: "picker_2"
    }, function(start, end, label) {

    });
});

$(document).ready(function() {
    $('#joinDate').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD'
        },
        singleDatePicker: true,
        showDropdowns: true,
        calender_style: "picker_2"
    }, function(start, end, label) {

    });
});

$(document).ready(function() {
    $('#dateDoc').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD'
        },
        // maxDate: new Date(),
        // minDate: new Date(),
        singleDatePicker: true,
        showDropdowns: true,
        calender_style: "picker_2"
    }, function(start, end, label) {

    });
});

$(document).ready(function() {
    $('#dateReq').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD'
        },
        // maxDate: new Date(),
        // minDate: new Date(),
        singleDatePicker: true,
        showDropdowns: true,
        calender_style: "picker_2"
    }, function(start, end, label) {

    });
});

window.dataAutocomplete = (input, url) => {
    $(input).autocomplete({
        source: url,
        minLength: 2,
        select: function( event, ui ) {
            document.getElementById('id').value = ui.item.id
        }
    });
}

window.messages = (message,url) => {
    Swal.fire({
        title: 'Success',
        text: message,
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oke'
    }).then((result) => {
        if (result.value) {
            window.location.href = url;
        }
    })
}

window.beforeLoading = (id) => {
    $(id).addClass("btn btn-brand kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light");
}

window.afterLoading = (id) => {
    $(id).removeClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light");
}

window.getValue = (element) => {
    return document.getElementById(element).value
}

window.getFile = (element) => {
    return $(`#${element}`).prop('files')[0]
}

window.getChecked = (element) => {
    return $(`#${element}:checked`).val()
}

window.getValueJquery = (element) => {
    return $(`#${element}`).val()
}


export default {
    messages,
    beforeLoading,
    afterLoading,
    getValue,
    getFile,
    dataAutocomplete,
}
