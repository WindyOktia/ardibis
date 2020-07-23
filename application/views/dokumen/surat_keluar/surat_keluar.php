<a href="<?=base_url('dokumen/addSuratKeluar')?>" class="btn btn-sm btn-success mb-2">Tambah Dokumen</a>

<div class="card card-body ">
    <h4>Surat Keluar</h4>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Tujuan</th>
                    <th>Tgl. Terima</th>
                    <th>No Surat & Tgl Surat</th>
                    <th>Perihal</th>
                    <th>Tujuan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($keluar as $kl):?>
                <tr>
                    <td><?= $i++?></td>
                    <td><?= $kl['nama_kategori']?></td>
                    <td><?= $kl['target']?></td>
                    <td><?= $kl['tgl_diterima']?></td>
                    <td><?= $kl['no_surat']?></td>
                    <td><?= $kl['perihal']?></td>
                    <td><?= $kl['tujuan']?></td>
                    <td>
                        <?php 
                            if($kl['status']==1){echo '<span class="badge badge-secondary">Belum Lengkap</span>';}
                            elseif($kl['status']==2){echo '<span class="badge badge-success">Lengkap</span>';}
                            else{echo '<span class="badge badge-warning">Berlanjut</span>';};
                        ?>
                    </td>
                    <td>
                        <a href="<?=base_url('dokumen/detailSuratKeluar')?>/<?= $kl['id_surat']?>" class="btn btn-sm btn-info">Detail Surat</a>
                        <!-- <a href="" class="btn btn-sm btn-danger">hapus</a> -->
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
            
        </table>
    </div>

</div>