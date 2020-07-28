<a href="<?=base_url('dokumen/addPenelitian')?>" class="btn btn-sm btn-success mb-2">Tambah Dokumen</a>

<div class="card card-body ">
    <h4>Penelitian</h4>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tema Penelitian</th>
                    <th>Judul Kegiatan</th>
                    <th>Tahun Akademik</th>
                    <th>Semester</th>
                    <th>Jumlah Sitasi</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($penelitian as $pen):?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?= $pen['nama_dosen']?></td>
                    <td><?= $pen['tema_penelitian']?></td>
                    <td><?= $pen['judul_kegiatan']?></td>
                    <td><?= $pen['tahun_akademik']?></td>
                    <td><?php if($pen['semester']=='2'){echo 'Genap';}else{echo 'Ganjil' ;};?></td>
                    <td><?= $pen['sitasi']?></td>
                    <td><a href="<?=base_url('dokumen/detailPenelitian')?>/<?= $pen['id_doc_penelitian']?>" target="_blank" class="btn btn-sm btn-info">detail</a></td>
                </tr>
            <?php endforeach?>
            </tbody>
            
        </table>
    </div>

</div>