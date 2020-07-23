<button type="button" class="btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#modalTambah">
Tambah Kategori Surat
</button>

<div class="card card-body ">
    <h4>Daftar Kategori Surat</h4>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $i=1;foreach($kategori as $kat):?>
            <tr>
                <td><?=$i++?></td>
                <td><?= $kat['nama_kategori']?></td>
                <td><?= $kat['deskripsi']?></td>
                <td>
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalUbah<?=$kat['id_kategori']?>">
                    detail / ubah
                    </button>
                    <a href="<?=base_url('pengaturan/deleteKategori')?>/<?=$kat['id_kategori']?>" class="btn btn-sm btn-danger tombol-hapus">hapus</a>
                </td>
            </tr>
        <?php endforeach?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kategori Surat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('pengaturan/addKategori')?>" method="post">
            <div class="form-group">
                <label for="">Nama Kategori</label>
                <input name="nama_kategori" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Deskripsi Kategori</label>
                <textarea name="deskripsi" class="form-control" id="" cols="30" rows="5"></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php foreach($kategori as $editKat):?>
<div class="modal fade" id="modalUbah<?=$editKat['id_kategori']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Kategori Surat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?=base_url('pengaturan/editKategori')?>" method="post">
            <div class="form-group">
                <label for="">Nama Kategori</label>
                <input name="id" type="hidden" class="form-control" value="<?=$editKat['id_kategori']?>">
                <input name="nama_kategori" type="text" class="form-control" value="<?=$editKat['nama_kategori']?>">
            </div>
            <div class="form-group">
                <label for="">Deskripsi Kategori</label>
                <textarea name="deskripsi" class="form-control" id="" cols="30" rows="5"><?=$editKat['deskripsi']?></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach?>