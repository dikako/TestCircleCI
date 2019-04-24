<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_prioritas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("m_prioritas");
		$this->load->library("form_validation");
	}

	public function index()
	{
		$data["prioritas"] = $this->m_prioritas->getAll();
		$this->load->view("tampil_prioritas", $data);	
	}

	public function add()
	{
		$prioritas = $this->m_prioritas;
		$validation = $this->form_validation;
		$validation->set_rules($prioritas->rules());

		if ($validation->run()) {
			$prioritas->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(site_url('c_prioritas'));
		}
		$this->load->view("tambah_prioritas");
	}

	public function edit($id = null)
	{
		if (!isset($id)) redirect('c_prioritas');
		$prioritas = $this->m_prioritas;
        $validation = $this->form_validation;
        $validation->set_rules($prioritas->rules());

        if ($validation->run()) {
            $prioritas->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('c_prioritas'));
        }

        $data["prioritas"] = $prioritas->getById($id);
        if (!$data["prioritas"]) show_404();
        
        $this->load->view("edit_prioritas", $data);
	}

	public function delete($id=null)
	{
		if (!isset($id)) show_404; 
		if ($this->m_prioritas->delete($id)) {
            redirect(site_url('c_prioritas'));
        }
	}

}
