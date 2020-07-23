<a href="<?=base_url('pengaturan/dosen')?>" class="btn btn-sm btn-secondary mb-2">kembali</a>

<?php foreach($dosen as $edit):?>
<div class="card card-body">
    <h5><b>Ubah data dosen</b></h5><br>
    <form action="<?=base_url('pengaturan/editDosen')?>" method="post">
        <div class="form-group">
            <label for="">NIP</label>
            <input type="hidden" name="id" class="form-control col-4" value="<?=$edit['id_dosen']?>" required>
            <input type="number" name="nip" class="form-control col-4" value="<?=$edit['nip']?>" required>
        </div>
        <div class="form-group">
            <label for="">NIDN</label>
            <input type="number" name="nidn" class="form-control col-4" value="<?=$edit['nidn']?>" required>
        </div>
        <div class="form-group">
            <label for="">Nama Dosen</label>
            <input type="text" name="nama" class="form-control" value="<?=$edit['nama_dosen']?>" required>
        </div>
        <button type="submit" class="btn btn-success float-right">Simpan</button>
    </form>
</div>
<?php endforeach?>