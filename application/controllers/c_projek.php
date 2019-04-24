<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_projek extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("m_projek");
		$this->load->library("form_validation");
    }

    public function index()
    {
        $data["projek"] = $this->m_projek->getAll();
        $this->load->view("tampil_projek", $data);
    }

    public function add()
    {
        $this->load->model('m_kategori');
        $validation = $this->form_validation;

        $action = $this->uri->segment(3);
        $this->load->helper('form');
        $this->load->library('form_validation');

        if ($action=='kirim')
        {
            $post=$this->input->post();

            if (!empty($post['nama_projek']) && !empty($post['id_kategori']) && !empty($post['created_at']) && !empty($post['finished_at']) && !empty($post['lead']) && !empty($post['deskripsi']))
            {
                $this->load->model('m_projek');

                $data = array(
                        'nama_projek' => $post['nama_projek'],
                        'id_kategori' => $post['id_kategori'],
                        'created_at' => date('m-d-Y'),
                        'finished_at' => date('m-d-Y'),
                        'lead' => $post['lead'],
                        'deskripsi' => $post['deskripsi']
                    );

                $this->m_projek->save('projek',$data);
                $this->session->set_flashdata('success', 'Berhasil disimpan');
                redirect(base_url('c_projek'));
            }
            else{
                echo "add gagal";
                $this->load->view('tambah_projek_gagal');
            }
        }
        else{
            $this->load->view('tambah_projek');
        }
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404; 
        if ($this->m_projek->delete($id)) {
            redirect(site_url('c_projek'));
        }
    }

    public function edit_projek($id_projek=0)
    {
        $this->load->model('m_projek');

        if ($id_projek != 0 && !empty($id_projek)) {
            $data = array(
                'projek' => $this->m_projek->getById($id_projek,'projek')
             );

            $this->load->view('edit_projek',$data);
        }
        else{
            redirect(site_url('c_projek'));
        }
        
    }

    public function update_projek()
    {
        $this->load->model('m_kategori');
        $validation = $this->form_validation;
        $post = $this->input->post();

        if (!empty($post['nama_projek']) && !empty($post['id_kategori']) && !empty($post['created_at']) && !empty($post['finished_at']) && !empty($post['lead']) && !empty($post['deskripsi'])) {

            $this->load->model('m_projek');
            $data = array(
                        'nama_projek' => $post['nama_projek'],
                        'id_kategori' => $post['id_kategori'],
                        'created_at' => date('m-d-Y'),
                        'finished_at' => date('m-d-Y'),
                        'lead' => $post['lead'],
                        'deskripsi' => $post['deskripsi'] );

            $this->m_projek->update_projek($post['id_projek'], $data, 'projek');
            redirect(site_url('c_projek'));
        }

    }

}