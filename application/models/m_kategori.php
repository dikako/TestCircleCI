<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

	
	public function tampil_data($table)
	{
		$query = $this->db->query("select * from $table");
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$data[] = $row;
			}

			$query->free_result();
		}

		else{
			$data = NULL;
		}

		return $data;
	}

	public function create($table, $data)
	{
		$this->db->insert($table, $data);
	}

	public function edit($id_kategori, $table)
	{
		$this->db->where('id_kategori',$id_kategori);
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

	public function update_kategori($id_kategori, $data, $table)
	{
		$this->db->where('id_kategori', $id_kategori);
		$this->db->update($table, $data);
	}

	public function delete_kategori($id_kategori, $table)
	{
		$this->db->where('id_kategori', $id_kategori);
		$this->db->delete($table);
	}
}
