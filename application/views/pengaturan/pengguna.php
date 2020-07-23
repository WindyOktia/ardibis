<button type="button" class="btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#modalTambah">
Tambah Admin
</button>
<div class="card card-body ">
    <h4>Daftar Pengguna Sistem (Admin)</h4>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach($user as $us):?>
            <tr>
                <td><?= $i++?></td>
                <td><?= $us['nama']?></td>
                <td><?= $us['username']?></td>
                <td><?php if($us['status']==1){echo 'aktif';}else{echo 'nonaktif';};?></td>
                <td>
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalUbah">
                    detail / ubah
                    </button>
                    <a href="" class="btn btn-sm btn-danger">hapus</a>
                </td>
            </tr>
          <?php endforeach ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('pengaturan/addUser')?>" method="post">
            <div class="form-group">
              <label for="">Nama Pengguna</label>
              <input name="nama" type="text" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="">Hak Akses</label>
              <select name="akses[]" class="form-control select2"  id=""  multiple="multiple" style="width:100%" required>
                    
                  <optgroup label="dokumen"> 
                    <option value="1">Pendidikan dan Pengajaran</option>
                    <option value="2">Penelitian</option>
                    <option value="3">Publikasi</option>
                    <option value="4">Pengabdian Pada Masyarakat</option>
                    <option value="5">Kegiatan Penunjang Dosen</option>
                    <option value="6">Kerjasama</option>
                    <option value="7">SDM</option>
                    <option value="8">Aset</option>
                    <option value="9">Rencana Fakultas</option>
                    <option value="10">Surat Masuk</option>
                    <option value="11">Surat Keluar</option>
                  </optgroup>
                  <optgroup label="Administratif">
                    <option value="97">Akses Admin</option>
                  </optgroup>
              </select>
            </div>

            <div class="form-group">
              <label for="">Username</label>
              <input type="text" autocomplete="off" name="username" id="username" class="form-control" placeholder="" required>
              <div id="userav"></div>
            </div>

            <div class="form-group">
              <label for="">Password</label>
              <input type="password" id="pass" class="form-control" disabled required>
            </div>

            <div class="form-group">
              <label for="">Ulangi Password</label>
              <input name="password" id="repass" type="password" class="form-control" disabled>
              <div id="resultPass">
              
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
        <button type="submit" id="simpan" class="btn btn-success" disabled>Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modalUbah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success">Simpan</button>
      </div>
    </div>
  </div>
</div>
