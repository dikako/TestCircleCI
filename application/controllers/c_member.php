<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("m_member");
		$this->load->library("form_validation");
	}

	public function index()
	{
		$data["member"] = $this->m_member->getAll();
        $this->load->view("tampil_member", $data);
	}

    public function tampil_member_bidang()
    {
        $data['bidang'] = $this->m_member->getAll_bidang();
        $this->load->view('tambah_member',$data);
    }

	public function add()
    {
        $this->load->model('m_bidang');
        $this->load->model('m_projek');
        $validation = $this->form_validation;

        $action = $this->uri->segment(3);
        $this->load->helper('form');
        $this->load->library('form_validation');

        if ($action=='kirim')
        {
            $post=$this->input->post();

            if (!empty($post['nama_member']) || !empty($post['email']) || !empty($post['deskripsi']) || !empty($post['id_bidang']) || !empty($post['id_projek']))
            {
                $this->load->model('m_member');

                $data = array(
                        'nama_member' => $post['nama_member'],
                        'email' => $post['email'],
                        'deskripsi' => $post['deskripsi'],
                    );

                $this->m_member->save('member',$data);

                $bidang = $this->input->post('bidang');
                $id_member = $this->db->insert_id();
                foreach ($bidang as $bidang) {
                    $data = array(
                        'id_member' => $id_member,
                        'id_bidang' => $bidang);
                    $this->db->insert('member_bidang',$data);
                }
                $this->session->set_flashdata('success', 'Berhasil disimpan');
                redirect(base_url('c_member'));
            }
            else{
                echo "add gagal";
                $this->load->view('tambah_member_gagal');
            }
        }
        else{
            $data['bidang'] = $this->m_member->getAll_bidang();
            $this->load->view('tambah_member', $data);
        }
    }

    public function edit_member($id_member=0)
    {
        $this->load->model('m_member');

        if ($id_member != 0 && !empty($id_member)) {
            $data = array(
                'member' => $this->m_member->edit($id_member,'member')
             );
            $data['bidang'] = $this->m_member->getAll_bidang();
            $this->load->view('edit_member',$data);
        }
        else{
            redirect(base_url('c_member'));
        }   
    }

    public function update_member()
    {
        $post = $this->input->post();

        if (!empty($post['nama_member']) || !empty($post['email']) || !empty($post['deskripsi'])) {
            $this->load->model('m_member');
            $data = array(
                'nama_member' => $post['nama_member'],
                'email' => $post['email'],
                'deskripsi' => $post['deskripsi']
            );

            $this->m_member->update_member($post['id_member'], $data, 'member');

            $bidang = $this->input->post('bidang');
                $id_member = $this->db->insert_id();
                foreach ($bidang as $bidang) {
                    $data = array(
                        'id_member' => $id_member,
                        'id_bidang' => $bidang);
                    $this->db->update('member_bidang',$data);
                }
            redirect(base_url('c_member'));
        }
    }

}