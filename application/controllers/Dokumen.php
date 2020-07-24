<?php

class Dokumen extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pengaturan_model','pengaturan');
        $this->load->model('dokumen_model','dokumen');
        $this->load->model('login_model','login');
        if(!$this->login->is_role()){
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses');
            redirect('');
        }
    }


   
    // general access and restriction
    public function header()
    {
        $data['role']=$this->login->getRole();
        $this->load->view('part/header',$data);
    }

    public function roleVerification($access)
    {
        $roles= $this->login->getRole();
        $num = count($this->login->getRole());

        $result=array();

        for($i = 0; $i < $num;$i++){
           $result[] = $roles[$i]['role'];
        }

        foreach($result as $res){
            if(in_array($res,$access)){
                return true;
            }
        }
        
    }

    public function restrictAcc()
    {
        $this->load->view('dokumen/restriction');
    }

    public function accRole($roleAcc)
    {
        // 97 = admin
        if($roleAcc=="pendidikan"){
            $access = array('97','1');
        }
        elseif($roleAcc=="penelitian"){
            $access = array('97','2');
        }
        elseif($roleAcc=="publikasi"){
            $access = array('97','3');
        }
        elseif($roleAcc=="pengabdian"){
            $access = array('97','4');
        }
        elseif($roleAcc=="kegiatan"){
            $access = array('97','5');
        }
        elseif($roleAcc=="kerjasama"){
            $access = array('97','6');
        }
        elseif($roleAcc=="sdm"){
            $access = array('97','7');
        }
        elseif($roleAcc=="aset"){
            $access = array('97','8');
        }
        elseif($roleAcc=="rencana"){
            $access = array('97','9');
        }
        elseif($roleAcc=="surat_masuk"){
            $access = array('97','10');
        }
        else{
            $access = array('97','11');
        }

        if($this->roleVerification($access))
        {
            return TRUE;
        }
    }

    public function roleRedirect($roleAcc)
    {
        if(!$this->accRole($roleAcc)){
            redirect('dokumen/restrictAcc');
        };
    }

    // end of general access and restriction

    // dashboard
    public function index()
    {
        $data['masuk']=$this->dokumen->getCountSuratMasuk();
        $data['keluar']=$this->dokumen->getCountSuratKeluar();
        
        $this->header();
        
        $access = array('97');

        if($this->roleVerification($access)){
            $this->load->view('dokumen/dashboard/dashboard',$data);
        }else{
            $this->load->view('dokumen/general');
        }

        $this->load->view('part/footer');
    }

    // end of dashboard


    // pendidikan
    

    public function pendidikan()
    {
        $roleAcc="pendidikan";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/pendidikan/pendidikan');
        $this->load->view('part/footer');
    }

    public function addPendidikan()
    {
        $roleAcc="pendidikan";
        $this->roleRedirect($roleAcc);

        $data['dosen']=$this->pengaturan->getDosen();
        $data['matakuliah']=$this->pengaturan->getMatakuliah();
        $this->header();
        if($this->accPendidikan()){
            $this->load->view('dokumen/pendidikan/add',$data);
        }
        $this->load->view('part/footer');
    }

    public function detailPendidikan()
    {
        $roleAcc="pendidikan";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/pendidikan/detail');
        $this->load->view('part/footer');
    }

    // end of pendidikan


    // penelitian
    public function penelitian()
    {
        $roleAcc="penelitian";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/penelitian/penelitian');
        $this->load->view('part/footer');
    }

    public function addPenelitian()
    {
        $roleAcc="penelitian";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/penelitian/add');
        $this->load->view('part/footer');
    }

    public function detailPenelitian()
    {
        $roleAcc="penelitian";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/penelitian/detail');
        $this->load->view('part/footer');
    }

    // end of penelitian


    // publikasi
    public function publikasi()
    {
        $roleAcc="publikasi";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/publikasi/publikasi');
        $this->load->view('part/footer');
    }

    public function addPublikasi()
    {
        $roleAcc="publikasi";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/publikasi/add');
        $this->load->view('part/footer');
    }

    public function detailPublikasi()
    {
        $roleAcc="publikasi";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/publikasi/detail');
        $this->load->view('part/footer');
    }

    // end of publikasi

    // pengabdian
    public function pengabdian()
    {
        $roleAcc="pengabdian";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/pengabdian/pengabdian');
        $this->load->view('part/footer');
    }

    public function addPengabdian()
    {
        $roleAcc="pengabdian";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/pengabdian/add');
        $this->load->view('part/footer');
    }

    public function detailPengabdian()
    {
        $roleAcc="pengabdian";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/pengabdian/detail');
        $this->load->view('part/footer');
    }

    // end of pengabdian

    // kegiatan
    public function kegiatan()
    {
        $roleAcc="kegiatan";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/kegiatan/kegiatan');
        $this->load->view('part/footer');
    }

    public function addKegiatan()
    {
        $roleAcc="kegiatan";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/kegiatan/add');
        $this->load->view('part/footer');
    }

    public function detailKegiatan()
    {
        $roleAcc="kegiatan";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/kegiatan/detail');
        $this->load->view('part/footer');
    }

    // end of kegiatan

    // kerjasama
    public function kerjasama()
    {
        $roleAcc="kerjasama";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/kerjasama/kerjasama');
        $this->load->view('part/footer');
    }

    public function addKerjasama()
    {
        $roleAcc="kerjasama";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/kerjasama/add');
        $this->load->view('part/footer');
    }

    public function detailKerjasama()
    {
        $roleAcc="kerjasama";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/kerjasama/detail');
        $this->load->view('part/footer');
    }

    // end of kerjasama

    // sdm
    public function sdm()
    {
        $roleAcc="sdm";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/sdm/sdm');
        $this->load->view('part/footer');
    }

    public function addSdm()
    {
        $roleAcc="sdm";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/sdm/add');
        $this->load->view('part/footer');
    }

    public function detailSdm()
    {
        $roleAcc="sdm";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/sdm/detail');
        $this->load->view('part/footer');
    }

    // end of sdm

    // aset
    public function aset()
    {
        $roleAcc="aset";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/aset/aset');
        $this->load->view('part/footer');
    }

    public function addAset()
    {
        $roleAcc="aset";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/aset/add');
        $this->load->view('part/footer');
    }

    public function detailAset()
    {
        $roleAcc="aset";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/aset/detail');
        $this->load->view('part/footer');
    }

    // end of aset


    // rencana
    public function rencana()
    {
        $roleAcc="rencana";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/rencana/rencana');
        $this->load->view('part/footer');
    }

    public function addRencana()
    {
        $roleAcc="rencana";
        $this->roleRedirect($roleAcc);
        
        $this->header();
        $this->load->view('dokumen/rencana/add');
        $this->load->view('part/footer');
    }

    public function detailRencana()
    {
        $roleAcc="rencana";
        $this->roleRedirect($roleAcc);

        $this->header();
        $this->load->view('dokumen/rencana/detail');
        $this->load->view('part/footer');
    }

    // end of rencana

    // surat masuk
    public function masuk()
    {
        $roleAcc="surat_masuk";
        $this->roleRedirect($roleAcc);

        $data['masuk'] = $this->dokumen->getSuratMasuk();
        $this->header();;
        $this->load->view('dokumen/surat_masuk/surat_masuk',$data);
        $this->load->view('part/footer');
    }

    public function addSuratMasuk()
    {
        $roleAcc="surat_masuk";
        $this->roleRedirect($roleAcc);

        $data['kategori']=$this->pengaturan->getKategori();
        $this->header();
        $this->load->view('dokumen/surat_masuk/add',$data);
        $this->load->view('part/footer');
    }

    public function detailSuratMasuk($id)
    {
        $roleAcc="surat_masuk";
        $this->roleRedirect($roleAcc);

        $data['detail']=$this->dokumen->getSuratID($id);
        $data['arsip']=$this->dokumen->getDocumentID($id);
        $this->header();
        $this->load->view('dokumen/surat_masuk/detail',$data);
        $this->load->view('part/footer');
    }

    // end of surat masuk

    // surat keluar
    public function keluar()
    {
        $roleAcc="surat_keluar";
        $this->roleRedirect($roleAcc);

        $data['keluar'] = $this->dokumen->getSuratKeluar();
        $this->header();
        $this->load->view('dokumen/surat_keluar/surat_keluar',$data);
        $this->load->view('part/footer');
    }

    public function addSuratKeluar()
    {
        $roleAcc="surat_keluar";
        $this->roleRedirect($roleAcc);

        $data['kategori']=$this->pengaturan->getKategori();
        $this->header();
        $this->load->view('dokumen/surat_keluar/add',$data);
        $this->load->view('part/footer');
    }

    public function detailSuratKeluar($id)
    {
        $roleAcc="surat_keluar";
        $this->roleRedirect($roleAcc);

        $data['detail']=$this->dokumen->getSuratID($id);
        $data['arsip']=$this->dokumen->getDocumentID($id);
        $this->header();
        $this->load->view('dokumen/surat_keluar/detail',$data);
        $this->load->view('part/footer');
    }

    // end of surat keluar


    // general add surat masuk / keluar
    public function addSurat()
    {
        $golongan= $_POST['golongan'];
        $insert= $this->dokumen->addSurat();
        $this->doUpload($insert,$golongan);
    }

    public function doUpload($id,$gol)
    {
        $config['upload_path']          = './document/';
		$config['allowed_types']        = '*';
		$config['max_size']             = 5000;
		$config['encrypt_name'] 		= true;
		$this->load->library('upload',$config);
		$judul = $this->input->post('judul');
        $jumlah_berkas = count($_FILES['arsip']['name']);
        
		for($i = 0; $i < $jumlah_berkas;$i++)
		{
            if(!empty($_FILES['arsip']['name'][$i])){
 
				$_FILES['file']['name'] = $_FILES['arsip']['name'][$i];
				$_FILES['file']['type'] = $_FILES['arsip']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['arsip']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['arsip']['error'][$i];
				$_FILES['file']['size'] = $_FILES['arsip']['size'][$i];
	   
				if($this->upload->do_upload('file')){
					
					$uploadData = $this->upload->data();
					$data['id_surat'] = $id;
					$data['nama_surat'] = $judul[$i];
					$data['link_file'] = $uploadData['file_name'];
					$data['tipe'] = $uploadData['file_ext'];
                    $this->db->insert('trans_surat',$data);
                    $this->session->set_flashdata('success', 'Dokumen berhasil ditambahkan');
				}else{
                    $this->session->set_flashdata('error', 'Dokumen gagal ditambah');
                }
			}
        }
        
        if($gol=='1'){
            redirect('dokumen/masuk');
        }else{
            redirect('dokumen/keluar');
        }
    }

    // end of general add surat masuk / keluar

    public function downloadArsip($file)
    {
        $this->load->helper('download');
        force_download(FCPATH.'/document/'.$file, null);
        // force_download('/document/b2005185d2c451b359a709ec208e2917.png', NULL);
    }
}