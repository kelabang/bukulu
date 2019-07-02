/**
 * Buat Modal Tambah
 */
var bookFormInput = document.getElementById('book-form-input');
bookFormInput.style.display = '';
var TambahModal = {
    content: bookFormInput,
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
            className: 'tingle-btn tingle-btn--danger',
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
    flatpickr("#datepicker");
    ObjectTambahModal.open();
}
/** 
 * End Buat Modal Tambah
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