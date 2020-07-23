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


    // dashboard

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

    public function index()
    {
        $access = array('97');

        $data['masuk']=$this->dokumen->getCountSuratMasuk();
        $data['keluar']=$this->dokumen->getCountSuratKeluar();

        $this->header();
        
        if($this->roleVerification($access)){
            $this->load->view('dokumen/dashboard/dashboard',$data);
        }

        $this->load->view('part/footer');
    }

    // end of dashboard


    // pendidikan
    public function pendidikan()
    {
        $this->header();
        $this->load->view('dokumen/pendidikan/pendidikan');
        $this->load->view('part/footer');
    }

    public function addPendidikan()
    {
        $data['dosen']=$this->pengaturan->getDosen();
        $data['matakuliah']=$this->pengaturan->getMatakuliah();
        $this->header();
        $this->load->view('dokumen/pendidikan/add',$data);
        $this->load->view('part/footer');
    }

    public function detailPendidikan()
    {
        $this->header();
        $this->load->view('dokumen/pendidikan/detail');
        $this->load->view('part/footer');
    }

    // end of pendidikan


    // penelitian
    public function penelitian()
    {
        $this->header();
        $this->load->view('dokumen/penelitian/penelitian');
        $this->load->view('part/footer');
    }

    public function addPenelitian()
    {
        $this->header();
        $this->load->view('dokumen/penelitian/add');
        $this->load->view('part/footer');
    }

    public function detailPenelitian()
    {
        $this->header();
        $this->load->view('dokumen/penelitian/detail');
        $this->load->view('part/footer');
    }

    // end of penelitian


    // publikasi
    public function publikasi()
    {
        $this->header();
        $this->load->view('dokumen/publikasi/publikasi');
        $this->load->view('part/footer');
    }

    public function addPublikasi()
    {
        $this->header();
        $this->load->view('dokumen/publikasi/add');
        $this->load->view('part/footer');
    }

    public function detailPublikasi()
    {
        $this->header();
        $this->load->view('dokumen/publikasi/detail');
        $this->load->view('part/footer');
    }

    // end of publikasi

    // pengabdian
    public function pengabdian()
    {
        $this->header();
        $this->load->view('dokumen/pengabdian/pengabdian');
        $this->load->view('part/footer');
    }

    public function addPengabdian()
    {
        $this->header();
        $this->load->view('dokumen/pengabdian/add');
        $this->load->view('part/footer');
    }

    public function detailPengabdian()
    {
        $this->header();
        $this->load->view('dokumen/pengabdian/detail');
        $this->load->view('part/footer');
    }

    // end of pengabdian

    // kegiatan
    public function kegiatan()
    {
        $this->header();
        $this->load->view('dokumen/kegiatan/kegiatan');
        $this->load->view('part/footer');
    }

    public function addKegiatan()
    {
        $this->header();
        $this->load->view('dokumen/kegiatan/add');
        $this->load->view('part/footer');
    }

    public function detailKegiatan()
    {
        $this->header();
        $this->load->view('dokumen/kegiatan/detail');
        $this->load->view('part/footer');
    }

    // end of kegiatan

    // kerjasama
    public function kerjasama()
    {
        $this->header();
        $this->load->view('dokumen/kerjasama/kerjasama');
        $this->load->view('part/footer');
    }

    public function addKerjasama()
    {
        $this->header();
        $this->load->view('dokumen/kerjasama/add');
        $this->load->view('part/footer');
    }

    public function detailKerjasama()
    {
        $this->header();
        $this->load->view('dokumen/kerjasama/detail');
        $this->load->view('part/footer');
    }

    // end of kerjasama

    // sdm
    public function sdm()
    {
        $this->header();
        $this->load->view('dokumen/sdm/sdm');
        $this->load->view('part/footer');
    }

    public function addSdm()
    {
        $this->header();
        $this->load->view('dokumen/sdm/add');
        $this->load->view('part/footer');
    }

    public function detailSdm()
    {
        $this->header();
        $this->load->view('dokumen/sdm/detail');
        $this->load->view('part/footer');
    }

    // end of sdm

    // aset
    public function aset()
    {
        $this->header();
        $this->load->view('dokumen/aset/aset');
        $this->load->view('part/footer');
    }

    public function addAset()
    {
        $this->header();
        $this->load->view('dokumen/aset/add');
        $this->load->view('part/footer');
    }

    public function detailAset()
    {
        $this->header();
        $this->load->view('dokumen/aset/detail');
        $this->load->view('part/footer');
    }

    // end of aset


    // rencana
    public function rencana()
    {
        $this->header();
        $this->load->view('dokumen/rencana/rencana');
        $this->load->view('part/footer');
    }

    public function addRencana()
    {
        $this->header();
        $this->load->view('dokumen/rencana/add');
        $this->load->view('part/footer');
    }

    public function detailRencana()
    {
        $this->header();
        $this->load->view('dokumen/rencana/detail');
        $this->load->view('part/footer');
    }

    // end of rencana

    // surat masuk
    public function masuk()
    {
        $data['masuk'] = $this->dokumen->getSuratMasuk();
        $this->header();;
        $this->load->view('dokumen/surat_masuk/surat_masuk',$data);
        $this->load->view('part/footer');
    }

    public function addSuratMasuk()
    {
        $data['kategori']=$this->pengaturan->getKategori();
        $this->header();
        $this->load->view('dokumen/surat_masuk/add',$data);
        $this->load->view('part/footer');
    }

    public function detailSuratMasuk($id)
    {
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
        $data['keluar'] = $this->dokumen->getSuratKeluar();
        $this->header();
        $this->load->view('dokumen/surat_keluar/surat_keluar',$data);
        $this->load->view('part/footer');
    }

    public function addSuratKeluar()
    {
        $data['kategori']=$this->pengaturan->getKategori();
        $this->header();
        $this->load->view('dokumen/surat_keluar/add',$data);
        $this->load->view('part/footer');
    }

    public function detailSuratKeluar($id)
    {
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