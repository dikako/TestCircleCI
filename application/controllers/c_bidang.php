<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_bidang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("m_bidang");
		$this->load->library("form_validation");
	}

	public function index()
	{
		$data["bidang"] = $this->m_bidang->getAll();
		$this->load->view("tampil_bidang", $data);	
	}

	public function add()
	{
		$bidang = $this->m_bidang;
		$validation = $this->form_validation;
		$validation->set_rules($bidang->rules());

		if ($validation->run()) {
			$bidang->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(site_url('c_bidang'));
		}
		$this->load->view("tambah_bidang");
	}

	public function edit($id = null)
	{
		if (!isset($id)) redirect('c_bidang');
		$bidang = $this->m_bidang;
        $validation = $this->form_validation;
        $validation->set_rules($bidang->rules());

        if ($validation->run()) {
            $bidang->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('c_bidang'));
        }

        $data["bidang"] = $bidang->getById($id);
        if (!$data["bidang"]) show_404();
        
        $this->load->view("edit_bidang", $data);
	}

	public function delete($id=null)
	{
		if (!isset($id)) show_404; 
		if ($this->m_bidang->delete($id)) {
            redirect(site_url('c_bidang'));
        }
	}

}
