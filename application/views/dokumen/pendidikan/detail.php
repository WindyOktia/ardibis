<div class="row">
    <div class="col">
        <a href="<?=base_url('dokumen/pendidikan')?>" class="btn btn-sm btn-secondary mr-2">Kembali</a>
        <a href="#" class="btn btn-sm btn-success">Upload Dokumen</a>
    </div>
    <div class="col">
        <a href="#" class="btn btn-sm btn-light float-right tombol-hapus">! Hapus data arsip</a>
    </div>
</div>
<div class="card card-body mt-2">
    <div class="h4"><b>1. Detail Dokumen Pendidikan dan Pengajaran</b></div>
<?php foreach($pendidikan as $pdd):?>
    <div class="h5">
        <ul>
            <li>
                <div class="row">
                    <div class="col-3">No. Sertifikasi</div>
                    <div class="col">: <b><?= $pdd['no_sertifikasi']?></b></div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-3">Nama Dosen</div>
                    <div class="col">:  <b><?= $pdd['nama_dosen']?></b></div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-3">NIP</div>
                    <div class="col">:  <?= $pdd['nip']?></div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-3">NIDN</div>
                    <div class="col">:  <?= $pdd['nidn']?></div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-3">Pendidikan</div>
                    <div class="col">: <?php 
                        $arr = unserialize($pdd['pendidikan']);

                        foreach($arr as $didik){
                            echo $didik.', ';
                        }
                    
                        ?></div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-3">Keahlian</div>
                    <div class="col">:  <?= $pdd['keahlian']?></div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-3">Tahun Akademik - Semester</div>
                    <div class="col">:  <?= $pdd['tahun_akademik']?> - <?php if($pdd['semester']=='1'){echo 'Ganjil';}else{echo 'Genap';};?></div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-3">Matakuliah</div>
                    <div class="col">:  <?= $pdd['kode_matakuliah']?> - <?= $pdd['nama_matakuliah']?></div>
                </div>
            </li>
        </ul>
    </div>

    <div class="h4"><b>2. Arsip Dokumen</b></div>
    <p>Sistem hanya mampu menampilkan file gambar, selain itu pengguna hanya dapat mengunduh file</p>
    
    <?php foreach($document as $doc):?>
    <div class="card card-body border-success">
        <div class="row">
            <div class="col"><b>Nama dokumen : <?=$doc['nama_dokumen']?> </b> <br></div>
            <div class="col"><a href="<?=base_url('dokumen/deleteDocument')?>/<?=$doc['id_trans_document']?>/detailPendidikan/<?= $pdd['id_doc_pendidikan']?>" class="btn btn-sm btn-danger float-right tombol-hapus">hapus dokumen <?=$doc['nama_dokumen']?> </a></div>
        </div>
        Jenis Dokumen : <?=$doc['tipe']?><br>
        <span>Link Download : <a href="<?= base_url('dokumen/downloadDocument')?>/<?=$doc['link_file']?>">Download File</a></span>
        <?php if($doc['tipe']=='.jpg'||$doc['tipe']=='.png'||$doc['tipe']=='.jpeg'){?>
            <img src="<?=base_url('document/priv')?>/<?= $doc['link_file']?>" alt="" style="width:100%" srcset="">
        <?php } ?>
    </div>
    <?php endforeach?>
<?php endforeach?>
</div>