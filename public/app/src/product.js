"use strict";

import { createData, deleteData, updateData} from "./api";

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
        // if (response.success) {
        //     afterLoading('#saveBtn')
        //     messages('Success','/product')
        // }
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
        // if (response.success) {
        //     afterLoading('#saveBtn')
        //     messages('Success','/product')
        // }
    }).catch(err => {
        afterLoading('#saveBtn')
        let error = err.response.data
        if(!error.success) {
            toastr.error(error.message)
        }
    })
}