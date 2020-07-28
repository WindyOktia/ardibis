<a href="<?=base_url('dokumen/addPengabdian')?>" class="btn btn-sm btn-success mb-2">Tambah Dokumen</a>

<div class="card card-body ">
    <h4>Pengabdian Pada Masyarakat</h4>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tema PKM</th>
                    <th>Judul Kegiatan</th>
                    <th>Bentuk Integrasi</th>
                    <th>Tahun Akademik</th>
                    <th>Semester</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($pengabdian as $abdi):?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$abdi['nama_dosen']?></td>
                    <td><?=$abdi['tema_PKM']?></td>
                    <td><?=$abdi['judul_kegiatan']?></td>
                    <td><?=$abdi['bentuk_integrasi']?></td>
                    <td><?=$abdi['tahun_akademik']?></td>
                    <td><?php if($abdi['semester']=='2'){echo 'Genap';}else{echo 'Ganjil' ;};?></td>
                    <td><a href="<?=base_url('dokumen/detailPengabdian')?>/<?=$abdi['id_doc_pengabdian']?>" target="_blank" class="btn btn-sm btn-info">detail</a></td>
                </tr>
                <?php endforeach?>
            </tbody>
            
        </table>
    </div>

</div>