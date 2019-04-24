<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_prioritas extends CI_Model {

	private $_table = "prioritas";

	public $id_prioritas;
	public $nama_prioritas;

	public function rules()
	{
		return [
			['field' => 'nama_prioritas',
			'label' => 'Name',
			'rules' => 'required']
		];
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table,["id_prioritas" => $id])->row();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->id_prioritas = $post["id"];
		$this->nama_prioritas = $post["nama_prioritas"];
		$this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_prioritas = $post["id"];
		$this->nama_prioritas = $post["nama_prioritas"];
		$this->db->update($this->_table, $this, array('id_prioritas' => $post['id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array('id_prioritas' => $id));
	}

}
