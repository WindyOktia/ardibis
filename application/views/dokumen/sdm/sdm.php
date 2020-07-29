<a href="<?=base_url('dokumen/addSdm')?>" class="btn btn-sm btn-success mb-2">Tambah Dokumen</a>

<div class="card card-body ">
    <h4>SDM</h4>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIP / NIDN</th>
                    <th>Prodi</th>
                    <th>Jabatan</th>
                    <th>Rekomendasi</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($sdm as $pen):?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?= $pen['nama_dosen']?></td>
                    <td><?= $pen['nip']?> / <?= $pen['nidn']?></td>
                    <td><?= $pen['prodi']?></td>
                    <td><?= $pen['jabatan']?></td>
                    <td><?= $pen['rekomendasi']?></td>
                    <td><a href="<?=base_url('dokumen/detailSdm')?>/<?= $pen['id_doc_sdm']?>" target="_blank" class="btn btn-sm btn-info">detail</a></td>
                </tr>
            <?php endforeach?>
            </tbody>
            
        </table>
    </div>

</div>