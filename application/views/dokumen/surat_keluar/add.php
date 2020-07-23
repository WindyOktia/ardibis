<a href="<?=base_url('dokumen/masuk')?>" class="btn btn-sm btn-secondary mb-2">Kembali</a>

<div class="card card-body border-success">
    <h6><b>Tambah Surat Keluar</b></h6>
    <br>
    <form action="<?=base_url('dokumen/addSurat')?>" enctype="multipart/form-data" method="post">
        <input type="hidden" name="golongan" value="2"><!-- 1 surat masuk; 2 surat keluar-->
        <div class="form-group">
            <label for="">Kategori Surat</label>
            <select name="kategori" id="" class="form-control col-md-4 border-warning" required>
                <option value="" selected disabled>- pilih kategori surat -</option>
            <?php foreach($kategori as $kat):?>
                <option value="<?=$kat['id_kategori']?>"><?=$kat['nama_kategori']?></option>    
            <?php endforeach ?>
            </select>
        </div>
        <div class="form-group"> 
            <label for="">Terkirim <small class="text-danger">*</small></label>
            <input name="target" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Tanggal Diterima <small class="text-danger">*</small> | bulan - tanggal - tahun</label>
            <input name="tgl_diterima" type="date" class="form-control defaultDate col-md-4" required>
        </div>
        <div class="form-group">
            <label for="">No Surat & Tgl Surat <small class="text-danger">*</small></label>
            <input name="no_surat" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Perihal <small class="text-danger">*</small></label>
            <textarea name="perihal" id="" cols="30" rows="5" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="">Tujuan <small class="text-danger">*</small></label>
            <input name="tujuan" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Status</label>
            <select name="status" id="" class="form-control">
                <option value="1">Belum Lengkap</option>
                <option value="2">Lengkap</option>
                <option value="3">Berlanjut</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Keterangan</label>
            <textarea name="keterangan" id="" cols="30" rows="5" class="form-control"></textarea>
            <script>
                CKEDITOR.replace( 'keterangan' );
            </script>
        </div>
        
        <h6><b>Lampiran File | </b>pdf / docx / png / jpg / jpeg</h6>
        <div class="input_fields_wrap">
            <div class="row mb-2">
                <div class="col-5">
                    <label for="">Judul Dokumen</label>
                    <input type="text" name="judul[]" class="form-control-file">
                </div>
                <div class="col-3">
                    <label for="">Pilih Arsip</label>
                    <input type="file" name="arsip[]" class="form-control-file">
                </div>
                <button type="button" class="btn btn-sm btn-secondary moreFile col-2">Tambah Lagi</button>
            </div>
            
        </div>
        <button type="submit" class="btn btn-success float-right">Simpan</button>
    </form>
</div>