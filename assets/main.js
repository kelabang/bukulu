/**
 * Buat Modal Tambah
 */

var TambahModal = {
    content: '',
    footer: [
        {
            label: 'Simpan',
            className: 'tingle-btn tingle-btn--primary',
            callback: function (modal) {
                return function () {
                    modal.close();
                    var data = populateBookFormInput();
                    postBookToServer(data)
                        .then(function () {
                            return getBooksFromServerHTML();
                        })
                        .then(function (response) {
                            var html = response.data;
                            var listBooks = document.getElementById('list-buku');
                            listBooks.innerHTML = html;
                        });
                }
            }
        },
        {
            label: 'Batal',
            className: 'tingle-btn tingle-btn--default',
            callback: function (modal) {
                return function () {
                    modal.close();
                }
            }
        }
    ]
}
var ObjectTambahModal = generateModal(TambahModal);
var btnBookFormInput = document.querySelectorAll('.book-form-input')[0];
btnBookFormInput.onclick = function (e) {
    e.preventDefault();
    var bookFormInput = document.getElementById('book-form-input');
    bookFormInput.style.display = '';
    ObjectTambahModal.setContent(bookFormInput)
    flatpickr("#datepicker");
    ObjectTambahModal.open();
}
/** 
 * End Buat Modal Tambah
 */

/**
* Buat Modal Ubah
*/
var pilihUbahBuku = {
    judul: 'ini',
    id: 0
};
var UbahModal = {
    content: '',
    footer: [
        {
            label: 'Simpan',
            className: 'tingle-btn tingle-btn--primary',
            callback: function (modal) {
                return function () {
                    modal.close();
                    var data = populateBookFormInput();
                    data.id = pilihUbahBuku.id;
                    postEditBookToServer(data)
                        .then(function () {
                            return getBooksFromServerHTML();
                        })
                        .then(function (response) {
                            var html = response.data;
                            var listBooks = document.getElementById('list-buku');
                            listBooks.innerHTML = html;
                            BindButtonDelete(); // bind button  
                            BindButtonEdit(); // bind button  
                        });
                }
            }
        },
        {
            label: 'Batal',
            className: 'tingle-btn tingle-btn--default',
            callback: function (modal) {
                return function () {
                    modal.close();
                }
            }
        }
    ]
}
var ObjectUbahModal = generateModal(UbahModal);

function autofillForm(formInput, dataset) {
    var inputText = formInput.querySelectorAll('input[type=text]');
    for (var i = 0; i < inputText.length; i++) {
        var name = inputText[i].name;
        if (dataset[name]) {
            inputText[i].value = dataset[name];
        }
    }
}

function onClickEditModal(e) {
    pilihUbahBuku = this.dataset;
    var bookFormInput = document.getElementById('book-form-input');
    var header = bookFormInput.querySelectorAll('h2')[0];
    header.innerHTML = 'Edit Bukunya';
    var content = bookFormInput;
    flatpickr("#datepicker");
    autofillForm(content, this.dataset);
    bookFormInput.style.display = '';
    ObjectUbahModal.setContent(content);
    ObjectUbahModal.open();
}

function BindButtonEdit() {
    var btnBookEdit = document.querySelectorAll('a.edit');
    for (var i = 0; i < btnBookEdit.length; i++) {
        btnBookEdit[i].addEventListener('click', onClickEditModal);
    }
}

// first time bind button
BindButtonEdit();
/** 
 * End Buat Modal Ubah
 */

/**
 * Buat Modal Delete
 */
var pilihDeleteBuku = {
    judul: 'ini',
    id: 0
};
var DeleteModal = {
    content: 'Yakin mau delete buku ' + pilihDeleteBuku.judul + ' ?',
    footer: [
        {
            label: 'Yakin',
            className: 'tingle-btn tingle-btn--danger',
            callback: function (modal) {
                return function () {
                    modal.close();
                    console.log(pilihDeleteBuku)
                    postDeleteBookToServer(pilihDeleteBuku.id)
                        .then(function () {
                            return getBooksFromServerHTML();
                        })
                        .then(function (response) {
                            var html = response.data;
                            var listBooks = document.getElementById('list-buku');
                            listBooks.innerHTML = html;
                            BindButtonDelete(); // bind button  
                            BindButtonEdit(); // bind button  
                        });
                }
            }
        },
        {
            label: 'Batal',
            className: 'tingle-btn tingle-btn--default',
            callback: function (modal) {
                return function () {
                    modal.close();
                }
            }
        }
    ]
}
var ObjectDeleteModal = generateModal(DeleteModal);
function onClickDeleteModal(e) {
    pilihDeleteBuku = this.dataset;
    var content = 'Yakin mau delete buku "' + pilihDeleteBuku.judul + '" ?';
    ObjectDeleteModal.setContent(content);
    ObjectDeleteModal.open();
}

function BindButtonDelete() {
    var btnBookDelete = document.querySelectorAll('a.delete');
    for (var i = 0; i < btnBookDelete.length; i++) {
        btnBookDelete[i].addEventListener('click', onClickDeleteModal);
    }
}

// first time bind button
BindButtonDelete();

/**
 * End Buat Modal Delete
 */

/**
 *  populasi data form input
 *  
 */
function populateBookFormInput() {
    var data = {};
    var nodes = document.querySelectorAll("#book-form-input input[type=text]");
    for (var i = 0; i < nodes.length; i++) {
        data[nodes[i].name] = nodes[i].value;
        nodes[i].value = '';
    }
    return data;
}

// tambah data ke server
function postBookToServer(data) {
    return axios({
        headers: {
            'Content-Type': 'application/json',
        },
        method: 'post',
        url: 'listbuku/add',
        data: data
    });
}

// ubah data di server
function postEditBookToServer(data) {
    console.log('edit book server', data)
    return axios({
        headers: {
            'Content-Type': 'application/json',
        },
        method: 'post',
        url: 'listbuku/update/' + data.id,
        data: data
    });
}

// tambah data ke server
function postDeleteBookToServer(id) {
    return axios({
        headers: {
            'Content-Type': 'application/json',
        },
        method: 'post',
        url: 'listbuku/delete/' + id,
    });
}

// update html list buku dari server
function getBooksFromServerHTML() {
    return axios({
        headers: {
            'Content-Type': 'application/json',
        },
        method: 'get',
        url: 'listbuku/refresh/book',
    }).then(function (response) {
        return response.data;
    });
}