<div class="row mb-2">
    <div class="col">
        <a href="<?=base_url('dokumen/sdm')?>" class="btn btn-sm btn-secondary mr-2">Kembali</a>
        <a href="#" class="btn btn-sm btn-success">Upload Dokumen</a>
    </div>
    <div class="col">
        <a href="<?=base_url('dokumen/deleteData')?>/doc_sdm/<?=$id?>" class="btn btn-sm btn-light float-right tombol-hapus">! Hapus data arsip</a>
    </div>
</div>

<?php foreach($sdm as $data):?>
<div class="card card-body">
    <div class="h4"><b>1. Detail Dokumen SDM</b></div>
    <ul>
        <li>
            <div class="row">
                <div class="col-3">Nama Dosen</div>
                <div class="col">: <?= $data['nama_dosen']?> </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">NIP / NIDN</div>
                <div class="col">: <?= $data['nip']?> / <?= $data['nidn']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">No Sertifikasi Dosen</div>
                <div class="col">: <?= $data['no_sertifikasi']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">Prodi</div>
                <div class="col">: <?= $data['prodi']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">Jabatan</div>
                <div class="col">: <?= $data['jabatan']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">Jabatan Fungsional</div>
                <div class="col">: <?= $data['jafung']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">Terhitung Mulai Tanggal</div>
                <div class="col">: <?= $data['TMT']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">Kepangkatan</div>
                <div class="col">: <?= $data['pangkat']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">TMT</div>
                <div class="col">: <?= $data['TMT_2']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">Rekomendasi</div>
                <div class="col">: <b> <?= $data['rekomendasi']?></b> </div>
            </div>
        </li>
    </ul>

    <div class="h4"><b>2. Arsip Dokumen</b></div>
    <p>Sistem hanya mampu menampilkan file gambar, selain itu pengguna hanya dapat mengunduh file</p>
    <?php foreach($document as $doc):?>
    <div class="card card-body border-success">
        <div class="row">
            <div class="col"><b>Nama dokumen : <?=$doc['nama_dokumen']?> </b> <br></div>
            <div class="col"><a href="<?=base_url('dokumen/deleteDocument')?>/<?=$doc['id_trans_document']?>/detailSdm/<?= $data['id_doc_sdm']?>" class="btn btn-sm btn-danger float-right tombol-hapus">hapus dokumen <?=$doc['nama_dokumen']?> </a></div>
        </div>
        Jenis Dokumen : <?=$doc['tipe']?><br>
        <span>Link Download : <a href="<?= base_url('dokumen/downloadDocument')?>/<?=$doc['link_file']?>">Download File</a></span>
        <?php if($doc['tipe']=='.jpg'||$doc['tipe']=='.png'||$doc['tipe']=='.jpeg'){?>
            <img src="<?=base_url('document/priv')?>/<?= $doc['link_file']?>" alt="" style="width:100%" srcset="">
        <?php } ?>
    </div>
    <?php endforeach?>
</div>
<?php endforeach?>