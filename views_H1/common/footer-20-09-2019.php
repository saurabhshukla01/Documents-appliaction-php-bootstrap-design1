<!-- Footer -->
<footer class="footer">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            © 2019 Developed by Prudigital pvt ltd.
         </div>
      </div>
   </div>
</footer>
<!-- End Footer -->
<!-- jQuery  -->
<link href="<?php base_url();?>/assets/plugins/ion-rangeslider/ion.rangeSlider.css" rel="stylesheet" type="text/css"/>
<link href="<?php base_url();?>/assets/plugins/ion-rangeslider/ion.rangeSlider.skinModern.css" rel="stylesheet" type="text/css"/>
<link href="<?php base_url();?>/assets/plugins/powerange/powerange.css" rel="stylesheet" type="text/css"/>
<script src="<?php base_url();?>/assets/plugins/ion-rangeslider/ion.rangeSlider.min.js"></script>
<script src="<?php base_url();?>/assets/plugins/powerange/powerange.js"></script>
<script src="<?php base_url();?>/assets/pages/rangeslider-init.js"></script> 
<script src="<?php base_url();?>/assets/js/popper.min.js"></script>
<script src="<?php base_url();?>/assets/js/bootstrap.min.js"></script>
<script src="<?php base_url();?>/assets/js/modernizr.min.js"></script>
<script src="<?php base_url();?>/assets/js/waves.js"></script>
<script src="<?php base_url();?>/assets/js/jquery.slimscroll.js"></script>
<script src="<?php base_url();?>/assets/js/jquery.nicescroll.js"></script>
<script src="<?php base_url();?>/assets/js/jquery.scrollTo.min.js"></script>
<!-- KNOB JS -->
<script src="<?php base_url();?>/assets/plugins/jquery-knob/excanvas.js"></script>
<script src="<?php base_url();?>/assets/plugins/jquery-knob/jquery.knob.js"></script>
<!-- Required datatable js -->
<script src="<?php base_url();?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php base_url();?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?php base_url();?>/assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?php base_url();?>/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?php base_url();?>/assets/plugins/datatables/jszip.min.js"></script>
<script src="<?php base_url();?>/assets/plugins/datatables/pdfmake.min.js"></script>
<script src="<?php base_url();?>/assets/plugins/datatables/vfs_fonts.js"></script>
<script src="<?php base_url();?>/assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?php base_url();?>/assets/plugins/datatables/buttons.print.min.js"></script>
<script src="<?php base_url();?>/assets/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="<?php base_url();?>/assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?php base_url();?>/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<script src="<?php base_url();?>/assets/js/app.js"></script>
<script>
   $(window).bind("load", function() {
     window.setTimeout(function() {
       $(".alert").fadeTo(500, 0).slideUp(500, function(){
           $(this).remove();
       });
   }, 4000);
   });
</script>
<style type="text/css">
   .input-FW {width:100%;border-radius:5px;box-sizing:border-box;padding:5px;border:1px solid #e1e1e1;}
   .input-FW:focus {outline:0px;} 
</style>
</body>
</html>