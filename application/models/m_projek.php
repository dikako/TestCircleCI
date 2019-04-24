<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_projek extends CI_Model {

    private $_table = "projek";

    public $id_projek;
    public $nama_projek;
    public $id_kategori;
    public $created_at;
    public $finished_at;
    public $deskripsi;

    public function rules()
    {
        return [
            ['field' => 'nama_projek',
            'label' => 'Name',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
    	$query = $this->db->query("select a.id_projek, a.nama_projek, b.nama_kategori, a.created_at, a.finished_at, a.lead, a.deskripsi from projek as a, kategori as b where a.id_kategori = b.id_kategori");
        return $query->result();
    }

    // public function getById($id)
    // {
    //     return $this->db->get_where($this->_table,["id_projek"=> $id])->row();
    // }

    public function save($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function getById($id_projek, $table)
    {
        $this->db->where('id_projek',$id_projek);
        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {
            $data = $query->row();
            $query->free_result();
        }
        else
        {
            $data = NULL;
        }
        
        return $data;
    }

    // public function update()
    // {
    //     $post = $this->input->post();
    //     $this->id_projek = $post["id"];
    //     $this->nama_projek = $post["nama_projek"];
    //     $this->id_kategori = $post["id_kategori"];
    //     $this->created_at = $post["created_at"];
    //     $this->finished_at = $post["finished_at"];
    //     $this->deskripsi = $post["deskripsi"];
    //     $this->db->update($this->_table, $this, array('id_projek' => $post['id']));
    // }

    public function update_projek($id_projek, $data, $table)
    {
        $this->db->where('id_projek',$id_projek);
        $this->db->update($table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array('id_projek' => $id));
    }



}