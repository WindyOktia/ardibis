

</div>
         </div>
      </div>
     
      <footer class="footer footer-static footer-light navbar-shadow">
         <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2 container center-layout">
         <span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2020 Fakultas Bisnis UKDW</span></p>
      </footer>
      <script src="<?= base_url('assets/')?>app-assets/vendors/js/vendors.min.js"></script>
      
      <!-- custom js -->
      <script type="text/javascript">
          var base_url = <?= base_url()?>;
      </script>
      <script src="<?= base_url('assets/');?>assets/js/app.js"></script>
      <script src="<?= base_url('assets/');?>assets/js/sweetalert2.all.min.js"></script>
      <script src="<?= base_url('assets/');?>assets/js/sweetalertcontrol.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
      <script type="text/javascript">
     
      $(document).ready(function() {
         $('#multipleSelect').select2();
         $('.select2').select2();

         // cek username
         $("#username").keyup(function(){
            $("#userav").html("<span class='text-warning'><i><small>Memeriksa..</small></i></span>");
            var username=$("#username").val();
            if(username.length<4){
               $("#userav").html("<span class='text-warning'><i><small>Min 4 karakter</small></i></span>");
               $('#pass').prop('disabled',true);
               $('#repass').prop('disabled',true);
            }else{
              $.ajax({
                type:"post",
                url:"<?= base_url('pengaturan/getUsername')?>",
                data:"username="+username,
                  success:function(data){
                  if(data==0){
                    $("#userav").html("<span class='text-success'><i><small>Tersedia</small></i></span>");
                    $('#pass').prop('disabled',false);
                    $('#repass').prop('disabled',false);
                  }
                  else{
                    $("#userav").html("<span class='text-danger'><i><small>Tidak Tersedia</small></i></span>");
                    $('#pass').prop('disabled',true);
                    $('#repass').prop('disabled',true);
                  }
                }
              });
            }
         });
         //  end of cek username

         $('#dosen').change(function(){
            var id=$('#dosen').val();

            $.ajax({
               url : "<?php echo site_url('pengaturan/getDosenID');?>",
               method : "POST",
               data : {id: id},
               async : true,
               dataType : 'json',
               success: function(data){
                  $('#nip').val(data[0].nip);
                  $('#nidn').val(data[0].nidn);
               }
            });
            return false;
         });
      });
      </script>
      <script type="text/javascript">
      
         toastr.options = {
         "closeButton": true,
         "debug": false,
         "newestOnTop": true,
         "progressBar": true,
         "positionClass": "toast-bottom-right",
         "preventDuplicates": false,
         "onclick": null,
         "showDuration": "100",
         "hideDuration": "1000",
         "timeOut": "5000",
         "extendedTimeOut": "1000",
         "showEasing": "swing",
         "hideEasing": "linear",
         "showMethod": "fadeIn",
         "hideMethod": "fadeOut"
         }
         <?php if($this->session->flashdata('success')){ ?>
            toastr.success("<?php echo $this->session->flashdata('success'); ?>");
         <?php }else if($this->session->flashdata('error')){  ?>
            toastr.error("<?php echo $this->session->flashdata('error'); ?>");
         <?php }else if($this->session->flashdata('warning')){  ?>
            toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
         <?php }else if($this->session->flashdata('info')){  ?>
            toastr.info("<?php echo $this->session->flashdata('info'); ?>");
         <?php } ?>
      </script>


      <!-- end of custom js -->
      
      <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
      

      <script src="<?= base_url('assets/')?>app-assets/vendors/js/ui/jquery.sticky.js"></script>
      <script src="<?= base_url('assets/')?>app-assets/vendors/js/extensions/moment.min.js"></script>
      <script src="<?= base_url('assets/')?>app-assets/vendors/js/extensions/fullcalendar.min.js"></script>
      <script src="<?= base_url('assets/')?>app-assets/vendors/js/extensions/moment.min.js"></script>
      <script src="<?= base_url('assets/')?>app-assets/js/core/app-menu.min.js"></script>
      <script src="<?= base_url('assets/')?>app-assets/js/core/app.min.js"></script>
      <script src="<?= base_url('assets/')?>app-assets/js/scripts/customizer.min.js"></script>
      <script src="<?= base_url('assets/')?>app-assets/js/scripts/pages/dashboard-ecommerce.min.js"></script>
      <script src="<?= base_url('assets/')?>app-assets/js/custom.js"></script>
      <script type="text/javascript">
         $(document).ready(function () {
            
            var currentDay = new Date();
            var dd = String(currentDay.getDate()).padStart(2, '0');
            var mm = String(currentDay.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = currentDay.getFullYear();

            currentDay = yyyy + '-' + mm + '-' + dd;
            $("#fc-basic-views").fullCalendar({
               header: {
                  left: "prev,next today",
                  center: "title",
                  right: "month,basicWeek,basicDay"
               },
               defaultDate: currentDay,
               editable: true,
               eventLimit: true, // allow "more" link when too many events
               selectable: true,
               selectHelper: true,
               select: function (start, end) {

                  $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD'));
                  $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD'));
                  $('#ModalAdd').modal('show');
               },
               eventRender: function (event, element) {
                  element.bind('dblclick', function () {
                     $('#ModalEdit #id').val(event.id);
                     $('#ModalEdit #title').val(event.title);
                     $('#ModalEdit #color').val(event.color);
                     $('#ModalEdit #description').val(event.description);
                     $('#ModalEdit').modal('show');
                  });
               },
               eventDrop: function(event, delta, revertFunc) { // si changement de position

                  edit(event);

               },
               eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

                  edit(event);

               },
               events: [<?php foreach($agenda as $event): 
			
                     $start = explode(" ", $event['start']);
                     $end = explode(" ", $event['end']);
                     if($start[1] == '00:00:00'){
                        $start = $start[0];
                     }else{
                        $start = $event['start'];
                     }
                     if($end[1] == '00:00:00'){
                        $end = $end[0];
                     }else{
                        $end = $event['end'];
                     }
                  ?>
                     {
                        id: '<?php echo $event['id']; ?>',
                        title: '<?php echo $event['title']; ?>',
                        description: '<?php echo $event['description']; ?>',
                        start: '<?php echo $start; ?>',
                        end: '<?php echo $end; ?>',
                        color: '<?php echo $event['color']; ?>',
                     },
                  <?php endforeach; ?>]
            });

           
         });

        

      </script>

      <script src="<?=base_url('assets/assets/js/custom.js')?>"></script>
    
   </body>
  
</html>