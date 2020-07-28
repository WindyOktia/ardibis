<a href="<?=base_url('dokumen/addPendidikan')?>" class="btn btn-sm btn-success mb-2">Tambah Dokumen</a>

<div class="card card-body ">
    <h4>Pendidikan dan Pengajaran</h4>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <!-- <th>NIP</th> -->
                    <!-- <th>NIDN</th> -->
                    <th>Nama Dosen</th>
                    <th>No Sertifikasi</th>
                    <th>Pendidikan</th>
                    <th>Keahlian</th>
                    <th>Tahun Akademik</th>
                    <th>Semester</th>
                    <th>Matakuliah</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($pendidikan as $pend):?>
                <tr>
                    <td><?=$i++?></td>
                    <!-- <td><?= $pend['nip']?></td> -->
                    <!-- <td><?= $pend['nidn']?></td> -->
                    <td><?= $pend['nama_dosen']?></td>
                    <td><?= $pend['no_sertifikasi']?></td>
                    <td><?php 
                        $arr = unserialize($pend['pendidikan']);

                        foreach($arr as $didik){
                            echo $didik.', ';
                        }
                    
                        ?>
                    </td>
                    <td><?= $pend['keahlian']?></td>
                    <td><?= $pend['tahun_akademik']?></td>
                    <td><?php if($pend['semester']=='1'){echo 'Ganjil';}else{echo 'Genap';};?></td>
                    <td><?= $pend['nama_matakuliah']?></td>
                    <td><a href="<?=base_url('dokumen/detailPendidikan')?>/<?=$pend['id_doc_pendidikan']?>" target="_blank" class="btn btn-sm btn-info">detail</a></td>
                </tr>
            <?php endforeach?>
            </tbody>
            
        </table>
    </div>

</div>