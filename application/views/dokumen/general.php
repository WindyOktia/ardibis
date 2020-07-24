<div class="card card-body">
    <h4>Selamat Datang, <b><?=$this->session->userdata('nama')?></b></h4>
    Pada sistem E-arsip Fakultas Bisnis UKDW ini anda dapat mengolah dokumen :
    <ul>
        <?php foreach($role as $akses):?>
            <li>
                <?php 
                    if($akses['role']=='1'){echo 'Pendidikan dan Pengajaran';};
                    if($akses['role']=='2'){echo 'Penelitian';};
                    if($akses['role']=='3'){echo 'Publikasi';};
                    if($akses['role']=='4'){echo 'Pengabdian Pada Masyarakat';};
                    if($akses['role']=='5'){echo 'Kegiatan Penunjang Dosen';};
                    if($akses['role']=='6'){echo 'Kerjasama';};
                    if($akses['role']=='7'){echo 'SDM';};
                    if($akses['role']=='8'){echo 'Aset';};
                    if($akses['role']=='9'){echo 'Rencana Fakultas';};
                    if($akses['role']=='10'){echo 'Surat Masuk';};
                    if($akses['role']=='11'){echo 'Surat Keluar';};
                ?>
            </li>
        <?php endforeach ?>
    </ul>
</div>