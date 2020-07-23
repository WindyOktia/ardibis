<?php

class Pengaturan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengaturan_model','pengaturan');
        $this->load->model('login_model','login');
        if(!$this->login->is_role()){
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses');
            redirect('');
        }
    }

    public function header()
    {
        $data['role']=$this->login->getRole();
        $this->load->view('part/header',$data);
    }

    public function index()
    {
        $data['user']= $this->pengaturan->getUser();
        $this->header();
        $this->load->view('pengaturan/pengguna',$data);
        $this->load->view('part/footer');
    }

    public function dosen()
    {
        $data['dosen']= $this->pengaturan->getDosen();
        $this->header();
        $this->load->view('pengaturan/dosen/dosen',$data);
        $this->load->view('part/footer');
    }

    public function addDosen()
    {
        $this->header();
        $this->load->view('pengaturan/dosen/add');
        $this->load->view('part/footer');
    }

    public function do_addDosen()
    {
        $insert=$this->pengaturan->do_addDosen();
        if($insert){
            $this->session->set_flashdata('success', 'Data Ditambahkan');
        }else{
            $this->session->set_flashdata('error', 'Data gagal ditambahkan / sudah ada');
        }
        redirect('pengaturan/dosen');
    }

    public function deleteDosen($id)
    {
        $delete=$this->pengaturan->deleteDosen($id);
        if($delete>0){
            $this->session->set_flashdata('success', 'Data Dihapus');
        }else{
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
        }
        redirect('pengaturan/dosen');
    }

    public function detailDosen($id)
    {
        $data['dosen']=$this->pengaturan->getDosenID($id);
        $this->header();
        $this->load->view('pengaturan/dosen/edit',$data);
        $this->load->view('part/footer');
    }

    public function editDosen()
    {
        $edit=$this->pengaturan->editDosen();
        if($edit){
            $this->session->set_flashdata('success', 'Data Diubah');
        }else{
            $this->session->set_flashdata('error', 'Data gagal diubah / sudah ada');
        }
        redirect('pengaturan/dosen');
    }

    public function getDosenID()
    {
        $id_dosen = $this->input->post('id',TRUE);
        $data = $this->pengaturan->getDosenID($id_dosen);
        echo json_encode($data);
    }


    public function matakuliah()
    {
        $data['matakuliah']= $this->pengaturan->getMatakuliah();
        $this->header();
        $this->load->view('pengaturan/matakuliah',$data);
        $this->load->view('part/footer');
    }

    public function addMatakuliah()
    {
        $insert=$this->pengaturan->addMatakuliah();
        if($insert){
            $this->session->set_flashdata('success', 'Data Ditambahkan');
        }else{
            $this->session->set_flashdata('error', 'Data gagal ditambahkan / sudah ada');
        }
        redirect('pengaturan/matakuliah');
    }

    public function deleteMatakuliah($id)
    {
        $delete=$this->pengaturan->deleteMatakuliah($id);
        if($delete>0){
            $this->session->set_flashdata('success', 'Data Dihapus');
        }else{
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
        }
        redirect('pengaturan/matakuliah');
    }

    public function editMatakuliah()
    {
        $edit=$this->pengaturan->editMatakuliah();
        if($edit){
            $this->session->set_flashdata('success', 'Data Diubah');
        }else{
            $this->session->set_flashdata('error', 'Data gagal diubah / sudah ada');
        }
        redirect('pengaturan/matakuliah');
    }

    public function kategori()
    {
        $data['kategori']=$this->pengaturan->getKategori();
        $this->header();
        $this->load->view('pengaturan/kategori',$data);
        $this->load->view('part/footer');
    }

    public function addKategori()
    {
        $insert=$this->pengaturan->addKategori();
        if($insert){
            $this->session->set_flashdata('success', 'Data Ditambahkan');
        }else{
            $this->session->set_flashdata('error', 'Data gagal ditambahkan / sudah ada');
        }
        redirect('pengaturan/kategori');
    }

    public function deleteKategori($id)
    {
        $delete=$this->pengaturan->deleteKategori($id);
        if($delete>0){
            $this->session->set_flashdata('success', 'Data Dihapus');
        }else{
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
        }
        redirect('pengaturan/kategori');
    }

    public function editKategori()
    {
        $edit=$this->pengaturan->editKategori();
        if($edit){
            $this->session->set_flashdata('success', 'Data Diubah');
        }else{
            $this->session->set_flashdata('error', 'Data gagal diubah / sudah ada');
        }
        redirect('pengaturan/kategori');
    }

    public function agenda()
    {
        $data['agenda']=$this->pengaturan->getAgenda();
        $this->header();
        $this->load->view('agenda');
        $this->load->view('part/footer',$data);
    }
    
    public function addAgenda()
    {
        $insert=$this->pengaturan->addAgenda();
        if($insert){
            $this->session->set_flashdata('success', 'Data Ditambahkan');
        }else{
            $this->session->set_flashdata('error', 'Data gagal ditambahkan');
        }
        redirect('pengaturan/agenda');
    }

    public function editAgenda()
    {
        if (isset($_POST['delete']) && isset($_POST['id'])){
            $delete=$this->pengaturan->deleteAgenda();
            if($delete){
                $this->session->set_flashdata('success', 'Data dihapus');
            }else{
                $this->session->set_flashdata('error', 'Data gagal dihapus');
            }
        }elseif (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id'])){
            $edit=$this->pengaturan->editAgenda();
            if($edit){
                $this->session->set_flashdata('success', 'Data diubah');
            }else{
                $this->session->set_flashdata('error', 'Data gagal diubah');
            }
        }

        redirect('pengaturan/agenda');
    }

    public function getUsername()
    {
        $cek=$this->pengaturan->getUsername();
        echo $cek->num_rows();
    }

    public function addUser()
    {
        $insert=$this->pengaturan->addUser();
        if($insert){
            $this->session->set_flashdata('success', 'Data Ditambahkan');
        }else{
            $this->session->set_flashdata('error', 'Data gagal ditambahkan');
        }
        redirect('pengaturan/');
    }
}