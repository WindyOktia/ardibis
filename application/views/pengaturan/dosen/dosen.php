<a href="<?=base_url('pengaturan/addDosen')?>" class="btn btn-sm btn-success mb-2">Tambah Dosen</a>

<div class="card card-body ">
    <h4>Daftar Dosen Fakultas Bisnis</h4>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>NIDN</th>
                <th>Nama Dosen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $i=1; foreach($dosen as $dos):?>
            <tr>
                <td><?= $i++?></td>
                <td><?= $dos['nip']?></td>
                <td><?= $dos['nidn']?></td>
                <td><?= $dos['nama_dosen']?></td>
                <td>
                    <a href="<?= base_url('pengaturan/detailDosen')?>/<?= $dos['id_dosen']?>" class="btn btn-sm btn-info">detail / ubah</a>
                    <a href="<?= base_url('pengaturan/deleteDosen')?>/<?= $dos['id_dosen']?>" class="btn btn-sm btn-danger tombol-hapus">hapus</a>
                </td>
            </tr>
          <?php endforeach?>
        </tbody>
    </table>
</div>


