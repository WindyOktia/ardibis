<div class="row mb-2">
    <div class="col">
        <a href="<?=base_url('dokumen/penelitian')?>" class="btn btn-sm btn-secondary mr-2">Kembali</a>
        <a href="#" class="btn btn-sm btn-success">Upload Dokumen</a>
    </div>
    <div class="col">
        <a href="<?=base_url('dokumen/deleteData')?>/doc_penelitian/<?=$id?>" class="btn btn-sm btn-light float-right tombol-hapus">! Hapus data arsip</a>
    </div>
</div>

<?php foreach($penelitian as $data):?>
<div class="card card-body">
    <div class="h4"><b>1. Detail Dokumen Penelitian</b></div>
    <ul>
        <li>
            <div class="row">
                <div class="col-3">Nama Dosen</div>
                <div class="col">: <?= $data['nama_dosen']?> </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">Tema Penelitian</div>
                <div class="col">: <?= $data['tema_penelitian']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">Judul Kegiatan</div>
                <div class="col">: <?= $data['judul_kegiatan']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">Bentuk Integrasi</div>
                <div class="col">: <?= $data['bentuk_integrasi']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">Tahun Akademik - Semester </div>
                <div class="col">: <?= $data['tahun_akademik']?> -  <?php if($data['semester']=='2'){echo 'Genap';}else{echo 'Ganjil' ;};?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">Jumlah Sitasi</div>
                <div class="col">: <?= $data['sitasi']?></div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-3">Daftar Anggota</div>
                <div class="col">
                    <ul>
                    <?php if($data['anggota']=="no_data"){echo 'tidak ada anggota';}else{
                            $anggota = unserialize($data['anggota']);
                            foreach($anggota as $ang){
                                if($ang['anggota']=='1'){
                                    echo "<li>".$ang['no_identitas'].' - '.$ang['nama_anggota'].' '.'( Dosen )'.'| '.$ang['keterangan']."</li>";
                                }elseif($ang['anggota']=='2'){
                                    echo "<li>".$ang['no_identitas'].' - '.$ang['nama_anggota'].' '.'( Mahasiswa )'.'| '.$ang['keterangan']."</li>";
                                }else{
                                    echo "<li>".$ang['no_identitas'].' - '.$ang['nama_anggota'].' '.'( Lainnya )'.'| '.$ang['keterangan']."</li>";
                                };
                                
                            }
                        }
                        ?>
                    </ul>
                    
                </div>
            </div>
        </li>
        <br>
        <li>
            <div class="row">
                <div class="col-3">Sumber Dana</div>
                <div class="col">
                    <ul>
                    <?php 
                            $sumber = unserialize($data['sumber_dana']);
                            foreach($sumber as $sbr){
                                echo "<li>".$sbr['sumber_dana'].' - Rp. '.$sbr['jumlah']."</li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
    <div class="h4"><b>2. Arsip Dokumen</b></div>
    <p>Sistem hanya mampu menampilkan file gambar, selain itu pengguna hanya dapat mengunduh file</p>
    <?php foreach($document as $doc):?>
    <div class="card card-body border-success">
        <div class="row">
            <div class="col"><b>Nama dokumen : <?=$doc['nama_dokumen']?> </b> <br></div>
            <div class="col"><a href="<?=base_url('dokumen/deleteDocument')?>/<?=$doc['id_trans_document']?>/detailPenelitian/<?= $data['id_doc_penelitian']?>" class="btn btn-sm btn-danger float-right tombol-hapus">hapus dokumen <?=$doc['nama_dokumen']?> </a></div>
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