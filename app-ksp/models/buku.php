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
            'edisi' => 'Edisi'
        );
    }

    // create book
    function create ($data) {
        return $this->_queryInsertBook($data);
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

    private function _queryGetList() {
        $query = $this->db->get($this->table);
        return $query->result();
    }

}