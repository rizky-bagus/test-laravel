'use strict'

export async function createData(url = '', data = {}) {
    return await axios.post(url, data)
}

export async function deleteData(url = '', data = {}) {
    return await axios.delete(url, data)
}

export async function updateData(url = '', id, data = {}) {
    return await axios.post(url, id, data)
}

export async function showData(url, id) {
    return await axios.get(url, id)
}

export async function importData(url = '', data = {}) {
    return await axios.post(url, data, { headers: { 'Content-Type': 'multipart/form-data' } })
}

export async function exportData(url = '', data = {}) {
    return await axios.get(url, { responseType: 'blob' })
}

export default {
    createData,
    deleteData,
    updateData,
    showData,
    importData,
    exportData
}
