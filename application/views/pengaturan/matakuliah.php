<button type="button" class="btn btn-success btn-sm mb-2" data-toggle="modal" data-target="#modalTambah">
  Tambah Matakuliah
</button>

<div class="card card-body">
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Kode Matakuliah</th>
                    <th>Semester</th>
                    <th>Nama Matakuliah</th>
                    <th>SKS</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($matakuliah as $kuliah):?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $kuliah['kode_matakuliah']?></td>
                    <td><?= $kuliah['semester']?></td>
                    <td><?= $kuliah['nama_matakuliah']?></td>
                    <td><?= $kuliah['sks']?></td>
                    <td><?= $kuliah['harga']?></td>
                    <td><?= $kuliah['keterangan']?></td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm mr-2" data-toggle="modal" data-target="#modalEdit<?=$kuliah['id_matakuliah']?>">
                        Edit
                        </button>
                        <a href="<?= base_url('pengaturan/deleteMatakuliah')?>/<?=$kuliah['id_matakuliah']?>" class="btn btn-sm btn-danger tombol-hapus">Hapus</a>
                    </td>
                </tr>
            <?php endforeach?>
            </tbody>
            
        </table>
    </div>
</div>

<!-- modal tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Matakuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="<?=base_url('pengaturan/addMatakuliah')?>" method="post">
                <div class="form-group">
                    <label for="">Kode Matakuliah <span class="text-danger">*</span></label>
                    <input type="text" name="kode" class="form-control" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">Semester <span class="text-danger">*</span></label>
                    <input type="number" name="semester" class="form-control col-md-4" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">Nama Matakuliah <span class="text-danger">*</span></label>
                    <input type="text" name="matakuliah" class="form-control" required autocomplete="off">
                </div>
                <div class="row form-group">
                    <div class="col">
                        <label for="">SKS</label>
                        <input type="number" name="sks" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="">Harga</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan" id="" cols="30" rows="3" class="form-control"></textarea>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Simpan</button>
            </form>
      </div>
    </div>
  </div>
</div>

<!-- end of modal tambah -->

<!-- modal edit -->

<?php foreach($matakuliah as $edit):?>
<div class="modal fade" id="modalEdit<?=$edit['id_matakuliah']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Matakuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="<?=base_url('pengaturan/editMatakuliah')?>" method="post">
                <div class="form-group">
                    <label for="">Kode Matakuliah <span class="text-danger">*</span></label>
                    <input type="text" name="kode" class="form-control" value="<?=$edit['kode_matakuliah']?>" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">Nama Matakuliah <span class="text-danger">*</span></label>
                    <input type="hidden" name="id" class="form-control" value="<?=$edit['id_matakuliah']?>" required>
                    <input type="text" name="matakuliah" class="form-control" value="<?=$edit['nama_matakuliah']?>" required autocomplete="off">
                </div>
                <div class="row form-group">
                    <div class="col">
                        <label for="">SKS</label>
                        <input type="number" name="sks" class="form-control"  value="<?=$edit['sks']?>" required>
                    </div>
                    <div class="col">
                        <label for="">Harga</label>
                        <input type="number" name="harga" class="form-control"  value="<?=$edit['harga']?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan" id="" cols="30" rows="3" class="form-control"><?= $edit['keterangan']?></textarea>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Simpan</button>
            </form>
      </div>
    </div>
  </div>
</div>

<?php endforeach?>

<!-- end of modal edit -->