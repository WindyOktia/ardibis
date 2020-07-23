<a href="<?=base_url('dokumen/addSuratMasuk')?>" class="btn btn-sm btn-success mb-2">Tambah Dokumen</a>

<div class="card card-body ">
    <h4>Surat Masuk</h4>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Pengirim</th>
                    <th>Tgl. Terima</th>
                    <th>No Surat & Tgl Surat</th>
                    <th>Perihal</th>
                    <th>Tujuan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($masuk as $ms):?>
                <tr>
                    <td><?= $i++?></td>
                    <td><?= $ms['nama_kategori']?></td>
                    <td><?= $ms['target']?></td>
                    <td><?= $ms['tgl_diterima']?></td>
                    <td><?= $ms['no_surat']?></td>
                    <td><?= $ms['perihal']?></td>
                    <td><?= $ms['tujuan']?></td>
                    <td>
                        <?php 
                            if($ms['status']==1){echo '<span class="badge badge-secondary">Belum Lengkap</span>';}
                            elseif($ms['status']==2){echo '<span class="badge badge-success">Lengkap</span>';}
                            else{echo '<span class="badge badge-warning">Berlanjut</span>';};
                        ?>
                    </td>
                    <td>
                        <a href="<?=base_url('dokumen/detailSuratMasuk')?>/<?= $ms['id_surat']?>" class="btn btn-sm btn-info">Detail Surat</a>
                        <!-- <a href="" class="btn btn-sm btn-danger">hapus</a> -->
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
            
        </table>
    </div>

</div>