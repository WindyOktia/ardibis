<a href="<?=base_url('dokumen/penelitian')?>" class="btn btn-sm btn-secondary mb-2">Kembali</a>

<div class="card card-body border-success">
<h5><b>Tambah dokumen SDM</b></h5><br>
    <form action="<?=base_url('dokumen/do_addSDM')?>" enctype="multipart/form-data" method="post">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Pilih Data</label>
                    <select name="id_dosen" id="dosen" class="form-control select2" required>
                        <option value="" selected disabled>- pilih dosen -</option>
                        <?php foreach($dosen as $dos):?>
                        <option value="<?=$dos['id_dosen']?>"><?=$dos['nama_dosen']?></option>
                        <?php endforeach?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">NIP</label>
                    <input type="text" id="nip" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">NIDN</label>
                    <input type="text" id="nidn" class="form-control" readonly>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">No Sertifikasi Dosen</label>
            <input name="no_sertifikasi" type="text" class="form-control col-6" required>
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="alamat" id="" cols="30" rows="10" class="form-control" required></textarea>
            <script>
                CKEDITOR.replace( 'alamat' );
            </script>
        </div>
        <div class="form-group">
            <label for="">Prodi</label>
            <select name="prodi" id="" class="form-control col-3" required>
                <option value="" selected disabled>- pilih -</option>
                <option value="Manajemen" >Manajemen</option>
                <option value="Akuntansi" >Akuntansi</option>
                <option value="Magister_Manajemen" >Magister Manajemen</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Jabatan</label>
            <select name="jabatan" id="" class="form-control col-3" required>
                <option value="" selected disabled>- pilih -</option>
                <option value="Dosen" >Dosen</option>
                <option value="Struktural" >Struktural</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Jabatan Fungsional</label>
            <input name="jafung" type="text" class="form-control col-6" required>
        </div>
        <div class="form-group">
            <label for="">TMT | Terhitung Mulai Tanggal</label>
            <input name="TMT" type="date" class="form-control col-3" required>
        </div>
        <div class="form-group">
            <label for="">Kepangkatan</label>
            <input name="pangkat" type="text" class="form-control col-6" required>
        </div>
        <div class="form-group">
            <label for="">TMT</label>
            <input name="TMT_2" type="date" class="form-control col-3" required>
        </div>
        <div class="form-group">
            <label for="">Rekomendasi</label>
            <input name="rekomendasi" type="text" class="form-control col-6 border-warning" required>
        </div>
        <br>
         <h6><b>Arsip Dokumen</b></h6>    

        <div class="form-group">
            <label for="">SK Pengangkatan</label>
            <input type="hidden" name="judul[]" placeholder="" value="SK Pengangkatan" class="form-control-file" >
            <input type="file" name="arsip[]" class="form-control-file" required>
        </div>
        <div class="form-group">
            <label for="">SK Jafung </label>
            <input type="hidden" name="judul[]" placeholder="" value="SK Jafung" class="form-control-file" >
            <input type="file" name="arsip[]" class="form-control-file">
        </div>
        <h6><b>Dokumen Lain | </b>pdf / docx / png / jpg / jpeg</h6>
        
        
        <div class="input_fields_wrap">
            <div class="row mb-2">
                <div class="col-5">
                    <label for="">Nama Dokumen</label>
                    <input type="text" name="judul[]" placeholder="" class="form-control-file">
                </div>
                <div class="col-3">
                    <label for="">Pilih Arsip</label>
                    <input type="file" name="arsip[]" class="form-control-file">
                </div>
                <button type="button" class="btn btn-sm btn-secondary moreFile col-2">Tambah Lagi</button>
            </div>
        </div>

        <button type="submit" class="btn btn-success float-right">Simpan Dokumen</button>
    </form>
</div>