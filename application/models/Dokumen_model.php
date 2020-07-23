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
}