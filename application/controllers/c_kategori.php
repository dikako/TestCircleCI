<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kategori extends CI_Controller {

	
	public function index()
	{
		$this->load->model('m_kategori');
		$data = array('record' => $this->m_kategori->tampil_data('kategori'));
		$this->load->view('tampil_kategori', $data);
	}

	public function tambah_data()
	{
		$this->load->model('m_kategori');
		$action = $this->uri->segment(3);
		if($action=='kirim')
		{
			$post = $this->input->post();

			if (!empty($post['nama_kategori'])) {
				$this->load->model('m_kategori');

				$data = array('nama_kategori' => $post['nama_kategori']);

				$this->m_kategori->create('kategori', $data);
				echo "<h2>Tambah kategori Berhasil</h2>";
				redirect(base_url('c_kategori'));
			}
			else{
				echo "<h2>Tambah kategori gagal</h2>";
			}
		}
		else{
			$this->load->view('tambah_kategori');
		}

	}

	public function edit_data($id_kategori = 0)
	{
		$this->load->model('m_kategori');
		if ($id_kategori != 0 && !empty($id_kategori)) {
			$data = array('record' =>$this->m_kategori->edit($id_kategori, 'kategori'));

			$this->load->view('edit_kategori', $data);
		}
		else{
			redirect(base_url('c_kategori/tampil_kategori'));
		}

	}

	public function update_data()
	{
		$post = $this->input->post();
		if (!empty($post['nama_kategori'])) {
			$this->load->model('m_kategori');
			$data = array('nama_kategori' =>$post['nama_kategori'] );
			$this->m_kategori->update_kategori($post['id_kategori'], $data, 'kategori');
			redirect(base_url('c_kategori')); }

	}

	public function delete($id_kategori=0)
	{
		$this->load->model('m_kategori');
		$this->m_kategori->delete_kategori($id_kategori, 'kategori');
		redirect(base_url('c_kategori'));
	}

}
