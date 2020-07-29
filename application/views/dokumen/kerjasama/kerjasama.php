<a href="<?=base_url('dokumen/addKerjasama')?>" class="btn btn-sm btn-success mb-2">Tambah Dokumen</a>

<div class="card card-body ">
    <h4>Kerjasama</h4>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tema Kerjasama</th>
                    <th>Judul Kegiatan</th>
                    <th>Tahun Akademik</th>
                    <th>Semester</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($kerjasama as $pen):?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?= $pen['nama_dosen']?></td>
                    <td><?= $pen['tema_kerjasama']?></td>
                    <td><?= $pen['judul_kegiatan']?></td>
                    <td><?= $pen['tahun_akademik']?></td>
                    <td><?php if($pen['semester']=='2'){echo 'Genap';}else{echo 'Ganjil' ;};?></td>
                    <td><a href="<?=base_url('dokumen/detailKerjasama')?>/<?= $pen['id_doc_kerjasama']?>" target="_blank" class="btn btn-sm btn-info">detail</a></td>
                </tr>
            <?php endforeach?>
            </tbody>
            
        </table>
    </div>

</div>