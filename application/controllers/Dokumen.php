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

    // Note for developer
        // by: Windy Oktia - Current Project Developer ~~ github.com/WindyOktia
        // Proyek E-arsip Fakultas Bisnis UKDW masih terus dalam tahap pengembangan, berikut adalah dokumentasi untuk membantu proses development :
        // Kode Hak Akses :
        // 1  : Pendidikan dan Pengajaran
        // 2  : Penelitian
        // 3  : Publikasi
        // 4  : Pengabdian pada Masyarakat
        // 5  : Kegiatan Penunjang Dosen
        // 6  : Kerjasama
        // 7  : SDM 
        // 8  : Aset 
        // 9  : Rencana Fakultas
        // 10 : Surat Masuk
        // 11 : Surat Keluar 

        // 97 : Admin Sistem

    // end of note
   
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

    public function generalUpload($id,$code,$backid)
    {
        $config['upload_path']          = './document/priv/';
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
					$data['code_id'] = $code.'_'.$id;
					$data['nama_dokumen'] = $judul[$i];
					$data['link_file'] = $uploadData['file_name'];
					$data['tipe'] = $uploadData['file_ext'];
                    $this->db->insert('trans_document',$data);
                    $this->session->set_flashdata('success', 'Dokumen berhasil ditambahkan');
				}else{
                    $this->session->set_flashdata('error', 'Dokumen gagal ditambah');
                }
			}
        }
        
        redirect('dokumen/'.$backid);
    }

    public function downloadDocument($file)
    {
        $this->load->helper('download');
        force_download(FCPATH.'/document/priv/'.$file, null);
    }

    public function deleteDocument($id,$backlink, $backid, $link_file)
    {
        $delete=$this->dokumen->generalDeleteDoc($id);
        if($delete>0){
            $this->deleteFiles($link_file,$backlink,$backid);
        }else{
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
            redirect('dokumen/'.$backlink.'/'.$backid);
        };
        
    }

    public function deleteFiles($file,$backlink, $backid)
    {
        $del = unlink(FCPATH.'document/priv/'.$file);
        if($del){
            $this->session->set_flashdata('success', 'Data Dihapus');
        }else{
            $this->session->set_flashdata('error', 'Data Gagal Dihapus');
        }
        redirect('dokumen/'.$backlink.'/'.$backid);
    }

    public function deleteData($table, $id)
    {
        if($table=='doc_pendidikan')
        {
            $code_id= "1".'_'.$id;
            $backid='pendidikan';
        }
        elseif($table=='doc_penelitian')
        {
            $code_id= "2".'_'.$id;
            $backid='penelitian';
        }
        elseif($table=='doc_publikasi')
        {
            $code_id= "3".'_'.$id;
            $backid='publikasi';
        }
        elseif($table=='doc_pengabdian')
        {
            $code_id= "4".'_'.$id;
            $backid='pengabdian';
        }
        elseif($table=='doc_kegiatan')
        {
            $code_id= "5".'_'.$id;
            $backid='kegiatan';
        }
        elseif($table=='doc_kerjasama')
        {
            $code_id= "6".'_'.$id;
            $backid='kerjasama';
        }else
        {
            $code_id= "7".'_'.$id;
            $backid='sdm';
        };

        $delMain = $this->dokumen->generalDeleteData($table,$id);
        $delSecond = $this->dokumen->generalDeleteBulk($code_id);
        redirect('dokumen/'.$backid);
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

        $data['pendidikan']=$this->dokumen->getPendidikan();
        
        $this->header();
        $this->load->view('dokumen/pendidikan/pendidikan',$data);
        $this->load->view('part/footer');
    }

    public function addPendidikan()
    {
        $roleAcc="pendidikan";
        $this->roleRedirect($roleAcc);

        $data['dosen']=$this->pengaturan->getDosen();
        $data['matakuliah']=$this->pengaturan->getMatakuliah();

        $this->header();
        $this->load->view('dokumen/pendidikan/add',$data);
        $this->load->view('part/footer');
    }

    public function detailPendidikan($id)
    {
        $roleAcc="pendidikan";
        $this->roleRedirect($roleAcc);

        $code = '1';

        $data['pendidikan']=$this->dokumen->getPendidikanID($id);
        $data['document']=$this->dokumen->getGeneralDoc($code, $id);
        $data['id']=$id;

        $this->header();
        $this->load->view('dokumen/pendidikan/detail',$data);
        $this->load->view('part/footer');
    }

    public function do_addPendidikan()
    {
        $id= $this->dokumen->addPendidikan();
        $code='1'; //pendidikan
        $backid='pendidikan'; // link redirect
        $this->generalUpload($id,$code,$backid);
    }

    // end of pendidikan


    // penelitian
    public function penelitian()
    {
        $roleAcc="penelitian";
        $this->roleRedirect($roleAcc);

        $this->header();

        $data['penelitian']= $this->dokumen->getPenelitian();
        $this->load->view('dokumen/penelitian/penelitian',$data);
        $this->load->view('part/footer');
    }

    public function addPenelitian()
    {
        $roleAcc="penelitian";
        $this->roleRedirect($roleAcc);

        $this->header();

        $data['dosen']= $this->pengaturan->getDosen();
        $this->load->view('dokumen/penelitian/add',$data);
        $this->load->view('part/footer');
    }

    public function detailPenelitian($id)
    {
        $roleAcc="penelitian";
        $this->roleRedirect($roleAcc);

        $code = '2';

        $this->header();

        $data['penelitian']= $this->dokumen->getPenelitianID($id);
        $data['document']=$this->dokumen->getGeneralDoc($code, $id);
        $data['id']=$id;
        $this->load->view('dokumen/penelitian/detail',$data);
        $this->load->view('part/footer');
    }

    public function do_addPenelitian()
    {
        if($_POST['anggota']){
            $arr_anggota = array();
            foreach ($_POST['anggota'] as $key => $value) {
              $arr_anggota[$key]['anggota'] =  $_POST['anggota'][$key];
              $arr_anggota[$key]['no_identitas'] =  $_POST['no_identitas'][$key];
              $arr_anggota[$key]['nama_anggota'] = $_POST['nama_anggota'][$key];
              $arr_anggota[$key]['keterangan'] = $_POST['keterangan'][$key];
            }
            $serial_anggota = serialize($arr_anggota);
        }else{
            $serial_anggota="no_data";
        }

        $arr_dana = array();
        foreach ($_POST['sumber_dana'] as $key => $value) {
          $arr_dana[$key]['sumber_dana'] =  $_POST['sumber_dana'][$key];
          $arr_dana[$key]['jumlah'] = $_POST['jumlah'][$key];
        }
        $serial_dana = serialize($arr_dana);

        $id= $this->dokumen->addPenelitian($serial_anggota, $serial_dana);

        $code='2'; //penelitian
        $backid='penelitian'; // link redirect
        $this->generalUpload($id,$code,$backid);
    }

    // end of penelitian


    // publikasi
    public function publikasi()
    {
        $roleAcc="publikasi";
        $this->roleRedirect($roleAcc);

        $this->header();

        $data['publikasi']=$this->dokumen->getPublikasi();
        $this->load->view('dokumen/publikasi/publikasi',$data);
        $this->load->view('part/footer');
    }

    public function addPublikasi()
    {
        $roleAcc="publikasi";
        $this->roleRedirect($roleAcc);

        $this->header();

        $data['dosen']= $this->pengaturan->getDosen();
        $this->load->view('dokumen/publikasi/add',$data);
        $this->load->view('part/footer');
    }

    public function detailPublikasi($id)
    {
        $roleAcc="publikasi";
        $this->roleRedirect($roleAcc);

        $this->header();

        $code='3';
        
        $data['publikasi']=$this->dokumen->getPublikasiID($id);
        $data['document']=$this->dokumen->getGeneralDoc($code, $id);
        $data['id']=$id;
        $this->load->view('dokumen/publikasi/detail',$data);
        $this->load->view('part/footer');
    }

    public function do_addPublikasi()
    {
        if($_POST['anggota']){
            $arr_anggota = array();
            foreach ($_POST['anggota'] as $key => $value) {
              $arr_anggota[$key]['anggota'] =  $_POST['anggota'][$key];
              $arr_anggota[$key]['no_identitas'] =  $_POST['no_identitas'][$key];
              $arr_anggota[$key]['nama_anggota'] = $_POST['nama_anggota'][$key];
              $arr_anggota[$key]['keterangan'] = $_POST['keterangan'][$key];
            }
            $serial_anggota = serialize($arr_anggota);
        }else{
            $serial_anggota="no_data";
        }

        $id= $this->dokumen->addPublikasi($serial_anggota);

        $code='3'; //publikasi
        $backid='publikasi'; // link redirect
        $this->generalUpload($id,$code,$backid);
    }

    // end of publikasi

    // pengabdian
    public function pengabdian()
    {
        $roleAcc="pengabdian";
        $this->roleRedirect($roleAcc);

        $this->header();
        $data['pengabdian']= $this->dokumen->getPengabdian();
        $this->load->view('dokumen/pengabdian/pengabdian',$data);
        $this->load->view('part/footer');
    }

    public function addPengabdian()
    {
        $roleAcc="pengabdian";
        $this->roleRedirect($roleAcc);

        $this->header();
        $data['dosen']= $this->pengaturan->getDosen();
        $this->load->view('dokumen/pengabdian/add',$data);
        $this->load->view('part/footer');
    }

    public function detailPengabdian($id)
    {
        $roleAcc="pengabdian";
        $this->roleRedirect($roleAcc);

        $this->header();

        $code="4";
        $data['pengabdian']= $this->dokumen->getPengabdianID($id);
        $data['document']=$this->dokumen->getGeneralDoc($code, $id);
        $data['id']=$id;
        $this->load->view('dokumen/pengabdian/detail',$data);
        $this->load->view('part/footer');
    }

    public function do_addPengabdian()
    {
        if($_POST['anggota']){
            $arr_anggota = array();
            foreach ($_POST['anggota'] as $key => $value) {
              $arr_anggota[$key]['anggota'] =  $_POST['anggota'][$key];
              $arr_anggota[$key]['no_identitas'] =  $_POST['no_identitas'][$key];
              $arr_anggota[$key]['nama_anggota'] = $_POST['nama_anggota'][$key];
              $arr_anggota[$key]['keterangan'] = $_POST['keterangan'][$key];
            }
            $serial_anggota = serialize($arr_anggota);
        }else{
            $serial_anggota="no_data";
        }

        $arr_dana = array();
        foreach ($_POST['sumber_dana'] as $key => $value) {
          $arr_dana[$key]['sumber_dana'] =  $_POST['sumber_dana'][$key];
          $arr_dana[$key]['jumlah'] = $_POST['jumlah'][$key];
        }
        $serial_dana = serialize($arr_dana);

        $id= $this->dokumen->addPengabdian($serial_anggota, $serial_dana);

        $code='4'; //pengabdian
        $backid='pengabdian'; // link redirect
        $this->generalUpload($id,$code,$backid);
    }

    // end of pengabdian

    // kegiatan
    public function kegiatan()
    {
        $roleAcc="kegiatan";
        $this->roleRedirect($roleAcc);

        $this->header();

        $data['kegiatan']= $this->dokumen->getKegiatan();
        $this->load->view('dokumen/kegiatan/kegiatan',$data);
        $this->load->view('part/footer');
    }

    public function addKegiatan()
    {
        $roleAcc="kegiatan";
        $this->roleRedirect($roleAcc);

        $this->header();
        $data['dosen']=$this->pengaturan->getDosen();
        $this->load->view('dokumen/kegiatan/add',$data);
        $this->load->view('part/footer');
    }

    public function detailKegiatan($id)
    {
        $roleAcc="kegiatan";
        $this->roleRedirect($roleAcc);

        $this->header();

        $code="5";
        $data['kegiatan']= $this->dokumen->getKegiatanID($id);
        $data['document']=$this->dokumen->getGeneralDoc($code, $id);
        $data['id']=$id;
        $this->load->view('dokumen/kegiatan/detail',$data);
        $this->load->view('part/footer');
    }

    public function do_addKegiatan()
    {   
        if($_POST['anggota']){
            $arr_anggota = array();
            foreach ($_POST['anggota'] as $key => $value) {
              $arr_anggota[$key]['anggota'] =  $_POST['anggota'][$key];
              $arr_anggota[$key]['no_identitas'] =  $_POST['no_identitas'][$key];
              $arr_anggota[$key]['nama_anggota'] = $_POST['nama_anggota'][$key];
              $arr_anggota[$key]['keterangan'] = $_POST['keterangan'][$key];
            }
            $serial_anggota = serialize($arr_anggota);
        }else{
            $serial_anggota="no_data";
        }

        $arr_dana = array();
        foreach ($_POST['sumber_dana'] as $key => $value) {
          $arr_dana[$key]['sumber_dana'] =  $_POST['sumber_dana'][$key];
          $arr_dana[$key]['jumlah'] = $_POST['jumlah'][$key];
        }
        $serial_dana = serialize($arr_dana);

        $id= $this->dokumen->addKegiatan($serial_anggota, $serial_dana);

        $code='5'; //kegiatan
        $backid='kegiatan'; // link redirect
        $this->generalUpload($id,$code,$backid);
    }

    // end of kegiatan

    // kerjasama
    public function kerjasama()
    {
        $roleAcc="kerjasama";
        $this->roleRedirect($roleAcc);

        $this->header();
        $data['kerjasama']=$this->dokumen->getKerjasama();
        $this->load->view('dokumen/kerjasama/kerjasama',$data);
        $this->load->view('part/footer');
    }

    public function addKerjasama()
    {
        $roleAcc="kerjasama";
        $this->roleRedirect($roleAcc);

        $this->header();
        $data['dosen']=$this->pengaturan->getDosen();
        $this->load->view('dokumen/kerjasama/add',$data);
        $this->load->view('part/footer');
    }

    public function detailKerjasama($id)
    {
        $roleAcc="kerjasama";
        $this->roleRedirect($roleAcc);

        $this->header();

        $code="6";
        $data['kerjasama']= $this->dokumen->getKerjasamaID($id);
        $data['document']=$this->dokumen->getGeneralDoc($code, $id);
        $data['id']=$id;
        $this->load->view('dokumen/kerjasama/detail',$data);
        $this->load->view('part/footer');
    }

    public function do_addKerjasama()
    {
        if($_POST['anggota']){
            $arr_anggota = array();
            foreach ($_POST['anggota'] as $key => $value) {
              $arr_anggota[$key]['anggota'] =  $_POST['anggota'][$key];
              $arr_anggota[$key]['no_identitas'] =  $_POST['no_identitas'][$key];
              $arr_anggota[$key]['nama_anggota'] = $_POST['nama_anggota'][$key];
              $arr_anggota[$key]['keterangan'] = $_POST['keterangan'][$key];
            }
            $serial_anggota = serialize($arr_anggota);
        }else{
            $serial_anggota="no_data";
        }

        $arr_dana = array();
        foreach ($_POST['sumber_dana'] as $key => $value) {
          $arr_dana[$key]['sumber_dana'] =  $_POST['sumber_dana'][$key];
          $arr_dana[$key]['jumlah'] = $_POST['jumlah'][$key];
        }
        $serial_dana = serialize($arr_dana);

        $id= $this->dokumen->addKerjasama($serial_anggota, $serial_dana);

        $code='6'; //kerjasama
        $backid='kerjasama'; // link redirect
        $this->generalUpload($id,$code,$backid);
    }

    // end of kerjasama

    // sdm
    public function sdm()
    {
        $roleAcc="sdm";
        $this->roleRedirect($roleAcc);

        $this->header();
        $data['sdm']=$this->dokumen->getSDM();
        $this->load->view('dokumen/sdm/sdm',$data);
        $this->load->view('part/footer');
    }

    public function addSdm()
    {
        $roleAcc="sdm";
        $this->roleRedirect($roleAcc);

        $this->header();
       
        $data['dosen']=$this->pengaturan->getDosen();
        $this->load->view('dokumen/sdm/add',$data);
        $this->load->view('part/footer');
    }

    public function detailSdm($id)
    {
        $roleAcc="sdm";
        $this->roleRedirect($roleAcc);

        $this->header();
        $code="7";
        $data['sdm']=$this->dokumen->getSDMID($id);
        $data['document']=$this->dokumen->getGeneralDoc($code, $id);
        $data['id']=$id;
        $this->load->view('dokumen/sdm/detail',$data);
        $this->load->view('part/footer');
    }

    public function do_addSDM()
    {
        $id= $this->dokumen->addSDM();

        $code='7'; //sdm
        $backid='sdm'; // link redirect
        $this->generalUpload($id,$code,$backid);
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
    }
}