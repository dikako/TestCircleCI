<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tipenote extends CI_Model {

	private $_table = "tipe_note";

	public $id_tipe_note;
	public $nama_tipe_note;

	public function rules()
	{
		return [
			['field' => 'nama_tipe_note',
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
		return $this->db->get_where($this->_table,["id_tipe_note" => $id])->row();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->id_tipe_note = $post["id"];
		$this->nama_tipe_note = $post["nama_tipe_note"];
		$this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_tipe_note = $post["id"];
		$this->nama_tipe_note = $post["nama_tipe_note"];
		$this->db->update($this->_table, $this, array('id_tipe_note' => $post['id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array('id_tipe_note' => $id));
	}

}
