<?php

class Dokumen_model extends CI_Model
{
    public function addSurat()
    {   
            
            $data=[
                'golongan_surat'=>$_POST['golongan'],
                'id_kategori'=>$_POST['kategori'],
                'target'=>$_POST['target'],
                'tgl_diterima'=>$_POST['tgl_diterima'],
                'no_surat'=>$_POST['no_surat'],
                'perihal'=>$_POST['perihal'],
                'tujuan'=>serialize($_POST['tujuan']),
                'keterangan'=>$_POST['keterangan'],
                'status'=>$_POST['status'],
                'created_at'=>date('Y-m-d H:i:sa')
            ];
            $this->db->insert('surat',$data);
            $package_id = $this->db->insert_id();
            return $package_id;
        
    }

    public function getSuratMasuk()
    {
        $this->db->select('surat.*, kategori.nama_kategori');
        $this->db->join('kategori', 'surat.id_kategori = kategori.id_kategori');
        $this->db->where('golongan_surat','1');
        return $this->db->get('surat')->result_array();
    }

    public function getSuratKeluar()
    {
        $this->db->select('surat.*, kategori.nama_kategori');
        $this->db->join('kategori', 'surat.id_kategori = kategori.id_kategori');
        $this->db->where('golongan_surat','2');
        return $this->db->get('surat')->result_array();
    }

    public function getSuratID($id)
    {
        $this->db->select('surat.*, kategori.nama_kategori');
        $this->db->join('kategori', 'surat.id_kategori = kategori.id_kategori');
        $this->db->where('id_surat',$id);
        return $this->db->get('surat')->result_array();
    }

    public function getDocumentID($id)
    {
        return $this->db->get_where('trans_surat',['id_surat'=>$id])->result_array();
    }

    public function getCountSuratMasuk()
    {
        $this->db->select('count(id_surat) as jumlah');
        $this->db->where('golongan_surat','1');
        return $this->db->get('surat')->result_array();
    }

    public function getCountSuratKeluar()
    {
        $this->db->select('count(id_surat) as jumlah');
        $this->db->where('golongan_surat','2');
        return $this->db->get('surat')->result_array();
    }

    public function getGeneralDoc($code, $id)
    {
        return $this->db->get_where('trans_document',['code_id'=>$code.'_'.$id])->result_array();
    }

    public function generalDeleteDoc($id)
    {
        $this->db->delete('trans_document',['id_trans_document'=>$id]);
        return $this->db->affected_rows();
    }

    public function addPendidikan()
    {
        $data=[
            'id_dosen'=>$_POST['id_dosen'],
            'no_sertifikasi'=>$_POST['no_sertifikasi'],
            'pendidikan'=>serialize($_POST['pendidikan']),
            'keahlian'=>$_POST['keahlian'],
            'tahun_akademik'=>$_POST['tahun_akademik_1'].'/'.$_POST['tahun_akademik_2'],
            'semester'=>$_POST['semester'],
            'id_matakuliah'=>$_POST['id_matakuliah']
        ];
        $this->db->insert('doc_pendidikan',$data);
        $package_id = $this->db->insert_id();
        return $package_id;
    }

    public function getPendidikan()
    {
        $this->db->select('doc_pendidikan.*, dosen.nip, dosen.nidn, dosen.nama_dosen, matakuliah.nama_matakuliah');
        $this->db->join('dosen', 'doc_pendidikan.id_dosen = dosen.id_dosen');
        $this->db->join('matakuliah', 'doc_pendidikan.id_matakuliah = matakuliah.id_matakuliah');
        return $this->db->get('doc_pendidikan')->result_array();
    }

    public function getPendidikanID($id)
    {
        $this->db->select('doc_pendidikan.*, dosen.nip, dosen.nidn, dosen.nama_dosen, matakuliah.nama_matakuliah, matakuliah.kode_matakuliah');
        $this->db->join('dosen', 'doc_pendidikan.id_dosen = dosen.id_dosen');
        $this->db->join('matakuliah', 'doc_pendidikan.id_matakuliah = matakuliah.id_matakuliah');
        $this->db->where('id_doc_pendidikan', $id);
        return $this->db->get('doc_pendidikan')->result_array();
    }

    public function addPenelitian($serial_anggota, $serial_dana)
    {
        $data=[
            'id_dosen'=>$_POST['id_dosen'],
            'tema_penelitian'=>$_POST['tema_penelitian'],
            'anggota'=>$serial_anggota,
            'judul_kegiatan'=>$_POST['judul_kegiatan'],
            'bentuk_integrasi'=>$_POST['bentuk_integrasi'],
            'tahun_akademik'=>$_POST['tahun_akademik_1'].'/'.$_POST['tahun_akademik_2'],
            'semester'=>$_POST['semester'],
            'sumber_dana'=>$serial_dana,
            'sitasi'=>$_POST['sitasi']
        ];
        $this->db->insert('doc_penelitian',$data);
        $package_id = $this->db->insert_id();
        return $package_id;
    }

    public function getPenelitian()
    {
        $this->db->select('doc_penelitian.*, dosen.nip, dosen.nidn, dosen.nama_dosen');
        $this->db->join('dosen', 'doc_penelitian.id_dosen = dosen.id_dosen');
        return $this->db->get('doc_penelitian')->result_array();
    }

    public function getPenelitianID($id)
    {
        $this->db->select('doc_penelitian.*, dosen.nip, dosen.nidn, dosen.nama_dosen');
        $this->db->join('dosen', 'doc_penelitian.id_dosen = dosen.id_dosen');
        $this->db->where('id_doc_penelitian', $id);
        return $this->db->get('doc_penelitian')->result_array();
    }

    public function addPublikasi($serial_anggota)
    {
        $data=[
            'id_dosen'=>$_POST['id_dosen'],
            'jenis_publikasi'=>$_POST['jenis_publikasi'],
            'tema_publikasi'=>$_POST['tema_publikasi'],
            'judul_kegiatan'=>$_POST['judul_kegiatan'],
            'penerbit'=>$_POST['penerbit'],
            'link_penerbit'=>$_POST['link_penerbit'],
            'indeks'=>$_POST['indeks'],
            'sitasi'=>$_POST['sitasi'],
            'anggota'=>$serial_anggota,
            'tahun_akademik'=>$_POST['tahun_akademik_1'].'/'.$_POST['tahun_akademik_2'],
            'semester'=>$_POST['semester'],
        ];
        $this->db->insert('doc_publikasi',$data);
        $package_id = $this->db->insert_id();
        return $package_id;
    }

    public function getPublikasi()
    {
        $this->db->select('doc_publikasi.*, dosen.nip, dosen.nidn, dosen.nama_dosen');
        $this->db->join('dosen', 'doc_publikasi.id_dosen = dosen.id_dosen');
        return $this->db->get('doc_publikasi')->result_array();
    }

    public function getPublikasiID($id)
    {
        $this->db->select('doc_publikasi.*, dosen.nip, dosen.nidn, dosen.nama_dosen');
        $this->db->join('dosen', 'doc_publikasi.id_dosen = dosen.id_dosen');
        $this->db->where('id_doc_publikasi', $id);
        return $this->db->get('doc_publikasi')->result_array();
    }

    public function addPengabdian($serial_anggota, $serial_dana)
    {
        $data=[
            'id_dosen'=>$_POST['id_dosen'],
            'tema_PKM'=>$_POST['tema_PKM'],
            'anggota'=>$serial_anggota,
            'judul_kegiatan'=>$_POST['judul_kegiatan'],
            'bentuk_integrasi'=>$_POST['bentuk_integrasi'],
            'tahun_akademik'=>$_POST['tahun_akademik_1'].'/'.$_POST['tahun_akademik_2'],
            'semester'=>$_POST['semester'],
            'sumber_dana'=>$serial_dana,
            'keterangan_pelaksanaan'=>$_POST['keterangan_pelaksanaan']
        ];
        $this->db->insert('doc_pengabdian',$data);
        $package_id = $this->db->insert_id();
        return $package_id;
    }

    public function getPengabdian()
    {
        $this->db->select('doc_pengabdian.*, dosen.nip, dosen.nidn, dosen.nama_dosen');
        $this->db->join('dosen', 'doc_pengabdian.id_dosen = dosen.id_dosen');
        return $this->db->get('doc_pengabdian')->result_array();
    }

    public function getPengabdianID($id)
    {
        $this->db->select('doc_pengabdian.*, dosen.nip, dosen.nidn, dosen.nama_dosen');
        $this->db->join('dosen', 'doc_pengabdian.id_dosen = dosen.id_dosen');
        $this->db->where('id_doc_pengabdian', $id);
        return $this->db->get('doc_pengabdian')->result_array();
    }


   
}