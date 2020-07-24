<?php

class Pengaturan_model extends CI_Model
{
    public function addKategori()
    {
        $cek= $this->db->get_where('kategori',['nama_kategori'=>$_POST['nama_kategori']]);
        
        if($cek->num_rows()==0){
            $data=[
                'nama_kategori'=>$_POST['nama_kategori'],
                'deskripsi'=>$_POST['deskripsi']
            ];
    
            $this->db->insert('kategori',$data);
            return true;
        }
      
        return false;
    }

    public function getKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function deleteKategori($id)
    {
        $this->db->delete('kategori',['id_kategori'=>$id]);
        return $this->db->affected_rows();
    }

    public function editKategori()
    {
        $cek= $this->db->get_where('kategori',['nama_kategori'=>$_POST['nama_kategori']]);
        if($cek->num_rows()==1){
            $cek2= $this->db->get_where('kategori',['nama_kategori'=>$_POST['nama_kategori'],'id_kategori'=>$_POST['id']]);
            if($cek2->num_rows()==1){
                $this->db->set('nama_kategori',$_POST['nama_kategori']);
                $this->db->set('deskripsi',$_POST['deskripsi']);
                $this->db->where('id_kategori',$_POST['id']);
                $this->db->update('kategori');
                return true;
            }else{
                return false;
            }
        }else{
            $this->db->set('nama_kategori',$_POST['nama_kategori']);
            $this->db->set('deskripsi',$_POST['deskripsi']);
            $this->db->where('id_kategori',$_POST['id']);
            $this->db->update('kategori');
            return true;
        }
        return false;
    }

    public function getAgenda()
    {
        return $this->db->get('agenda')->result_array();
    }

    public function addAgenda()
    {
        $data=[
            'title'=>$_POST['title'],
            'description'=>$_POST['description'],
            'color'=>$_POST['color'],
            'start'=>$_POST['start'],
            'end'=>$_POST['end']
        ];

        $this->db->insert('agenda',$data);

        return true;
    }

    public function deleteAgenda()
    {
        $this->db->delete('agenda',['id'=>$_POST['id']]);
        return true ;
    }

    public function editAgenda()
    {
        $this->db->set('title',$_POST['title']);
        $this->db->set('description',$_POST['description']);
        $this->db->set('color',$_POST['color']);
        $this->db->where('id',$_POST['id']);
        $this->db->update('agenda');
        return true;
    }

    public function getUsername()
    {
        return $this->db->get_where('user',['username'=>$_POST['username']]);
    }

    public function addUser()
    {
        $akses= $_POST['akses'];

        $this->db->trans_start();
            $data = [
                'nama' => $_POST['nama'],
                'username' => $_POST['username'],
                'password' => md5($_POST['password']),
                'status' => '1'
            ];

            $this->db->insert('user', $data);

            $package_id = $this->db->insert_id();

            $result = array();
                foreach($akses AS $key => $val){
                    $result[] = array(
                    'id_user'  	=> $package_id,
                    'role'  	=> $_POST['akses'][$key]
                    );
                }      
            //MULTIPLE INSERT TO DETAIL TABLE
            $this->db->insert_batch('role', $result);
        $this->db->trans_complete();
        return TRUE;
    }

    public function getUser()
    {
        return $this->db->get_where('user',['id_user !='=>1])->result_array();
    }

    public function getRole()
    {
        return $this->db->get_where('role',['id_user !='=>1])->result_array();
    }

    public function deleteUser($id)
    {
        $this->db->delete('user',['id_user'=>$id]);
        return $this->db->affected_rows();
    }

    public function updateUser()
    {
        // $akses= $_POST['akses'];

        // $this->db->trans_start();
        //     $this->db_set('nama',$_POST['nama']);
        //     $this->db_set('password',$_POST['password']);

        //     $this->db->insert('user', $data);

        //     $package_id = $this->db->insert_id();

        //     $result = array();
        //         foreach($akses AS $key => $val){
        //             $result[] = array(
        //             'id_user'  	=> $package_id,
        //             'role'  	=> $_POST['akses'][$key]
        //             );
        //         }      
        //     //MULTIPLE INSERT TO DETAIL TABLE
        //     $this->db->insert_batch('role', $result);
        // $this->db->trans_complete();
        // return TRUE;
    }

    public function addMatakuliah()
    {
        $cek= $this->db->get_where('matakuliah',['kode_matakuliah'=>$_POST['kode']]);
        
        if($cek->num_rows()==0){
            $data=[
                'kode_matakuliah'=>$_POST['kode'],
                'semester'=>$_POST['semester'],
                'nama_matakuliah'=>$_POST['matakuliah'],
                'sks'=>$_POST['sks'],
                'harga'=>$_POST['harga'],
                'keterangan'=>$_POST['keterangan']
            ];
    
            $this->db->insert('matakuliah',$data);
            return true;
        }
      
        return false;
    }

    public function getMatakuliah()
    {
        return $this->db->get('matakuliah')->result_array();
    }
    
    public function deleteMatakuliah($id)
    {
        $this->db->delete('matakuliah',['id_matakuliah'=>$id]);
        return $this->db->affected_rows();
    }

    public function editMatakuliah()
    {
        $this->db->set('kode_matakuliah', $_POST['kode']);
        $this->db->set('semester', $_POST['semester']);
        $this->db->set('nama_matakuliah', $_POST['matakuliah']);
        $this->db->set('sks', $_POST['sks']);
        $this->db->set('harga', $_POST['harga']);
        $this->db->set('keterangan', $_POST['keterangan']);
        $this->db->where('id_matakuliah', $_POST['id']);
        $this->db->update('matakuliah');
        return TRUE;
    }

    public function do_addDosen()
    {
        $cek= $this->db->get_where('dosen',['nip'=>$_POST['nip']]);
        
        if($cek->num_rows()==0){
            $data=[
                'nip'=>$_POST['nip'],
                'nidn'=>$_POST['nidn'],
                'nama_dosen'=>$_POST['nama']
            ];
    
            $this->db->insert('dosen',$data);
            return true;
        }
      
        return false;
    }

    public function getDosen()
    {
        return $this->db->get('dosen')->result_array();
    }

    public function deleteDosen($id)
    {
        $this->db->delete('dosen',['id_dosen'=>$id]);
        return $this->db->affected_rows();
    }

    public function getDosenID($id)
    {
        return $this->db->get_where('dosen',['id_dosen'=>$id])->result_array();
    }

    public function editDosen()
    {
        $this->db->set('nip', $_POST['nip']);
        $this->db->set('nidn', $_POST['nidn']);
        $this->db->set('nama_dosen', $_POST['nama']);
        $this->db->where('id_dosen', $_POST['id']);
        $this->db->update('dosen');
        return TRUE;
    }


}