<a href="<?=base_url('dokumen/addPublikasi')?>" class="btn btn-sm btn-success mb-2">Tambah Dokumen</a>

<div class="card card-body ">
    <h4>Publikasi</h4>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Jenis Publikasi</th>
                    <th>Tema Publikasi</th>
                    <th>Nama Dosen</th>
                    <th>Judul Kegiatan</th>
                    <th>Tahun Akademik</th>
                    <th>Semester</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($publikasi as $pub):?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?= $pub['jenis_publikasi']?></td>
                    <td><?= $pub['tema_publikasi']?></td>
                    <td><?= $pub['nama_dosen']?></td>
                    <td><?= $pub['judul_kegiatan']?></td>
                    <td><?= $pub['tahun_akademik']?></td>
                    <td><?php if($pub['semester']=='2'){echo 'Genap';}else{echo 'Ganjil' ;};?></td>
                    <td><a href="<?=base_url('dokumen/detailPublikasi')?>/<?=$pub['id_doc_publikasi']?>" target="_blank" class="btn btn-sm btn-info">detail</a></td>
                </tr>
            <?php endforeach?>
            </tbody>
            
        </table>
    </div>

</div>