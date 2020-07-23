<style>
 .fc-time{
     display:none;
 }
</style>

<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-2">Agenda Fakultas Bisnis</h4>
            <p>Cara penggunaan :</p>
            <ul>
                <li>Klik 1 kali pada bidang kosong untuk menambahkan</li>
                <li>Klik ganda pada judul agenda untuk merubah / melihat detail</li>
            </ul>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
           
        </div>
        <div class="card-content collapse show">
            <div class="card-body">
                <div id='fc-basic-views'></div>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="<?=base_url('pengaturan/addAgenda')?>" class="form-horizontal" method="POST" >
    
        <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Tambah Agenda</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
        
            <div class="form-group">
            <label for="title" class="ontrol-label">Judul</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Judul" required>
            </div>
            <div class="form-group">
                <label for="title" class="control-label">Untuk</label>
                <select name="target" id="" class="form-control">
                    <option value="">Person 1</option>
                    <option value="">Person 2</option>
                    <option value="">Person 3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="color" class="control-label">Tag Warna</label>
                <select name="color" class="form-control" id="color" required>
                    <option value="">Pilih</option>
                    <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                    <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                    <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
                    <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                    <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                    <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                    <option style="color:#000;" value="#000">&#9724; Black</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Deskripsi Agenda</label>
                <textarea name="description" id="" cols="30" rows="5" class="form-control">-</textarea>
            </div>
            <div class="form-group">
                <label for="start" class="control-label">Tanggal Dipilih</label>
                <input type="text" name="start" class="form-control" id="start" readonly>
                    <input type="hidden" name="end" class="form-control" id="end" readonly>
            </div>
            
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    </div>
    </div>
</div>

<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form class="form-horizontal" method="POST" action="<?=base_url('pengaturan/editAgenda')?>">
        <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Edit Agenda</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
        
            <div class="form-group">
            <label for="title" class="control-label">Judul</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="title" class="control-label">Untuk</label>
                <select name="target" id="" class="form-control">
                    <option value="">Person 1</option>
                    <option value="">Person 2</option>
                    <option value="">Person 3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="color" class=" control-label">Tag Warna</label>
                <select name="color" class="form-control" id="color">
                    <option value="">Choose</option>
                    <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                    <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                    <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
                    <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                    <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                    <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                    <option style="color:#000;" value="#000">&#9724; Black</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Deskripsi Agenda</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control">-</textarea>
            </div>
            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                    <label class="text-danger"><input type="checkbox"  name="delete"> Hapus Agenda ?</label>
                    </div>
                </div>
            </div>
            
            <input type="hidden" name="id" class="form-control" id="id">
        
        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    </div>
    </div>
</div>
