<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_member extends CI_Model {

	public $_table = "member";

	public $id_member;
	public $nama_member;
	public $email;
	public $deskripsi;
	public $nama_bidang;
	public $nama_projek;

	public function rules()
	{
		return [
			['field' => 'nama_member',
			'label' => 'Nama',
			'rules' => 'required']
		];
	}

	public function getAll()
	{
		$query = $this->db->query("select * from member");
        return $query->result();
	}

	public function getAll_bidang()
	{
		$query = $this->db->query("select * from bidang");
        return $query->result();
	}

	public function getById()
	{
		return $this->db->get_where($this->_table,["id_member" => $id])->row();
	}

	public function save($table, $data)
	{
		$this->db->insert($table, $data);
	}

	public function edit($id_member,$table)
	{
		$this->db->where('id_member',$id_member);
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

	public function update_member($id_member,$data,$table)
	{
		$this->db->where('id_member',$id_member);
		$this->db->update($table, $data);
	}
}
