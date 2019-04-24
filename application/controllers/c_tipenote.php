<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_tipenote extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("m_tipenote");
		$this->load->library("form_validation");
	}

	public function index()
	{
		$data["tipe_note"] = $this->m_tipenote->getAll();
		$this->load->view("tampil_tipenote", $data);	
	}

	public function add()
	{
		$tipe_note = $this->m_tipenote;
		$validation = $this->form_validation;
		$validation->set_rules($tipe_note->rules());

		if ($validation->run()) {
			$tipe_note->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(site_url('c_tipenote'));
		}
		$this->load->view("tambah_tipenote");
	}

	public function edit($id = null)
	{
		if (!isset($id)) redirect('c_tipenote');
		$tipe_note = $this->m_tipenote;
        $validation = $this->form_validation;
        $validation->set_rules($tipe_note->rules());

        if ($validation->run()) {
            $tipe_note->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(site_url('c_tipenote'));
        }

        $data["tipe_note"] = $tipe_note->getById($id);
        if (!$data["tipe_note"]) show_404();
        
        $this->load->view("edit_tipenote", $data);
	}

	public function delete($id=null)
	{
		if (!isset($id)) show_404; 
		if ($this->m_tipenote->delete($id)) {
            redirect(site_url('c_tipenote'));
        }
	}

}
