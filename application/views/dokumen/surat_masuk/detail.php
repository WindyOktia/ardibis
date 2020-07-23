<div class="card card-body">
<?php foreach($detail as $dt):?>
    <div class="h4"><b>1. <?= $dt['nama_kategori']?></b></div>
    <div class="h4">
        <ul>
            <li>
                <div class="row">
                    <div class="col-md-2">No Surat</div>
                    <div class="col-md-2">: <?= $dt['no_surat']?></div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-md-2">Perihal</div>
                    <div class="col-md-2">: <?= $dt['perihal']?></div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-md-2">Pengirim</div>
                    <div class="col-md-2">: <?= $dt['target']?></div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-md-2">Tgl Diterima</div>
                    <div class="col-md-2">: <?= $dt['tgl_diterima']?></div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-md-2">Tujuan</div>
                    <div class="col-md-2">: <?= $dt['tujuan']?></div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-md-2">Status Dokumen</div>
                    <div class="col-md-2">: 
                        <?php 
                            if($dt['status']==1){echo '<span class="badge badge-secondary">Belum Lengkap</span>';}
                            elseif($dt['status']==2){echo '<span class="badge badge-success">Lengkap</span>';}
                            else{echo '<span class="badge badge-warning">Berlanjut</span>';};
                        ?>
                    </div>
                </div>
            </li>
        </ul>
        <div class="h4"><b>2. Keterangan</b></div>
        <div class="h5"><?= $dt['keterangan']?></div>
    </div>
    <?php endforeach ?>
    

    <div class="h4"><b>3. Arsip Dokumen</b></div>
    <p>Sistem hanya mampu menampilkan file gambar, selain itu pengguna hanya dapat mengunduh file</p>

    <?php $i=1; foreach($arsip as $ars):?>
    <div class="card card-body border-success">
        <div class="text-center"><h3>Dokumen <?= $i++?></h3></div>
        <b>Nama Dokumen : <?= $ars['nama_surat']?></b><br>
        Jenis Dokumen : <?= $ars['tipe']?><br>
        Link Download : <a href="<?= base_url('dokumen/downloadArsip')?>/<?=$ars['link_file']?>">download</a><br>
        <?php if($ars['tipe']=='.jpg'||$ars['tipe']=='.png'||$ars['tipe']=='.jpeg'){?>
            <img src="<?=base_url('document')?>/<?= $ars['link_file']?>" alt="" style="width:100%" srcset="">
        <?php } ?>
    </div>
    <?php endforeach?>

    <div class="">
        <a href="" class="btn btn-danger float-right">Hapus Dokumen</a>
        <a href="" class="btn btn-info float-right mr-2">Ubah Dokumen</a>
    </div>
</div>
