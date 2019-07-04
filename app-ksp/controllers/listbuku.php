<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once(APPPATH.'core/Main_Controller.php');

class ListBuku extends Main_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('buku');
    }

    function index() {
        $this->tampilanList();
    }

    // tamplian full list buku
    function tampilanList () {
        $bukubuku = $this->buku->getList();
        $data = array(
            'bukubuku' => $bukubuku
        );
        $toRender = array(
            $this->load->view('base/base-header', '', true),
            // $this->load->view('base/base-category-menu', '', true),
            $this->load->view('base/base-list-cards', $data, true),
        );
        $this->render($toRender);
    }

    // Merefresh list buku yang ada di html
    function refreshBook() {
        $bukubuku = $this->buku->getList();
        $data = array(
            'bukubuku' => $bukubuku
        );
        $html = $this->load->view('base/base-list-cards', $data, true);
        $output = array(
            'message' => 'failed to refresh',
        );
        if(!empty($bukubuku)):
            $output['message'] = 'success to refresh';
            $output['data'] = $html;
        endif;
        return $this->response($output);
    }

    // Menambahkan buku dengan data json
    function addBook () {
        $params = $this->request();
        $body = $params['body'];
        $result = $this->buku->create($body);
        $output = array(
            'message' => 'failed to insert'
        );
        if($result):
            $output['message'] = 'success to insert';
        endif;
        return $this->response($output);
    }

    // Mengubah buku dengan data json
    function updateBook ($id) {
        $params = $this->request();
        $body = $params['body'];
        $result = $this->buku->update($id, $body);
        $output = array(
            'message' => 'failed to update'
        );
        if($result):
            $output['message'] = 'success to update';
        endif;
        return $this->response($output);
    }

    function deleteBook ($id) {
        $result = $this->buku->delete($id);
        $output = array(
            'message' => 'failed to delete'
        );
        if($result):
            $output['message'] = 'success to delete';
        endif;
        return $this->response($output);
    }

    function syncBook () {

    }
    
}
