<?php

include_once(APPPATH.'core/Main_Model.php');

class Buku extends Main_Model {
    function __construct(){
        parent::__construct();
        $this->table = 'tb_buku';
        $this->columns = array(
            'judul' => 'Judul_Buku',
            'kategori' => 'Kategori',
            'pengarang' => 'Pengarang',
            'isbn' => 'ISBN',
            'jumlah_halaman' => 'Jumlah_Halaman',
            'tanggal_terbit' => 'Tanggal_Terbit',
            'harga' => 'Harga',
            'edisi' => 'Edisi',
            'image' => 'image',
        );
    }

    // create book
    function create ($data) {
        return $this->_queryInsertBook($data);
    }

    // delete book
    function delete ($id) {
        return $this->_queryDeleteBook($id);
    }

    // update book
    function update ($id, $data) {
        return $this->_queryUpdateBook($id, $data);
    }

    // get collection of books
    function getList ($options = null) {
        return $this->_queryGetList();
    }

    // get book
    function get() {
        echo "get buku";
    }

    private function _createObjectBook ($data = null) {
        $newObj = array();
        foreach ($this->columns as $key => $value):
            # code...
            if(isset($data[$key])): 
                $newObj[$value] = $data[$key];
            endif;
        endforeach;
        return $newObj;
    }

    private function _queryInsertBook ($data = null) {
        $data = $this->_createObjectBook($data);
        $this->db->insert($this->table, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    private function _queryUpdateBook ($id = null, $data = null) {
        $data = $this->_createObjectBook($data);
        $this->db
            ->where('ID', $id)
            ->update($this->table, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }   

    private function _queryDeleteBook ($id = null) {
        $this->db->delete($this->table, array('ID' => $id));
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    private function _queryGetList() {
        $query = $this->db->get($this->table);
        return $query->result();
    }

}