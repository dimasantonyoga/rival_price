<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryControllerAdmin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('myModel');
        if( $this->session->userdata('login_petugas') != TRUE ){
            redirect(base_url());
        }
        date_default_timezone_set('Asia/Jakarta');
        //Do your magic here
    }
    

    public function index()
    {
        $data['page'] = "Category";
        $data['page_level'] = 1;
        $this->load->view('admin/categoryAdmin',$data);
    }

    // READ
    public function getData(){
        $data['real'] = $this->myModel->selectOrder('tb_kategori','create_at','DESC')->result();
        $data['count'] = $this->myModel->selectOrder('tb_kategori','create_at','DESC')->num_rows();
        echo json_encode($data);
    }

    // Cek aktifitas
    public function checkActivity(){
        $data = $this->myModel->select('tb_aktifitas')->num_rows();
        echo json_encode($data);
    }

    // get data where
    public function getDataWhere(){
        $where = array(
            'id_kategori' => $this->input->post('id'),
        );
        $data = $this->myModel->selectWhere('tb_kategori',$where)->row();
        echo json_encode($data);

    }

    // create
    public function create(){
        // INSERT TABLE
        $data = array(
            'nama_kategori' => $this->input->post('name'),
            'ongkir' => $this->input->post('ongkir'),

        );
        $insert = $this->myModel->insert('tb_kategori',$data);

        $data = array('success' => false, 'msg' => '');
        if($insert){
            // INSERT TABLE AktifitAS
            $keterangan = array(
                'id_petugas' => $this->session->userdata('id_petugas'),
                'nama_aktifitas'  => 'CREATE',
                'nama_tabel'  => 'tb_kategori',
            );
            $this->myModel->insert('tb_aktifitas',$keterangan);
            $data = array('success' => true, 'msg' => '');
        }
        echo json_encode($data);
    }

    // delete
    public function delete(){
        $id = $this->input->post('id');
        $this->db->where('id_kategori', $id);
        $this->db->delete('tb_kategori');
        // INSERT TABLE AktifitAS
        $keterangan = array(
            'id_petugas' => $this->session->userdata('id_petugas'),
            'nama_aktifitas'  => 'DELETE',
            'nama_tabel'  => 'tb_kategori'
        );
        $this->myModel->insert('tb_aktifitas',$keterangan);
        echo json_encode($id);
    }

    // update
    public function update(){
        $data = array(
            'nama_kategori' => $this->input->post('nama'),
            'ongkir'   => $this->input->post('ongkir'),
        );
        $id = $this->input->post('id');
        $this->db->where('id_kategori', $id);
        $up = $this->myModel->update('tb_kategori',$data);

        // INSERT TABLE AktifitAS
        $keterangan = array(
            'id_petugas' => $this->session->userdata('id_petugas'),
            'nama_aktifitas'  => 'UPDATE',
            'nama_tabel'  => 'tb_kategori'
        );
        $this->myModel->insert('tb_aktifitas',$keterangan);

        $dt = array('success' => false, 'msg' => '');
        if($up){
            $dt = array('success' => true, 'msg' => '');
        }
        echo json_encode($dt);
    }
}

/* End of file CategoryControllerAdmin.php */
