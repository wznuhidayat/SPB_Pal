<!-- Jquery Core Js -->
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/node-waves/waves.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/jquery-countto/jquery.countTo.js"></script>

<!-- Morris Plugin Js -->
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/morrisjs/morris.js"></script>

<!-- ChartJs -->
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/chartjs/Chart.bundle.js"></script>

<!-- Flot Charts Plugin Js -->
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/flot-charts/jquery.flot.js"></script>
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/flot-charts/jquery.flot.resize.js"></script>
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/flot-charts/jquery.flot.pie.js"></script>
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/flot-charts/jquery.flot.categories.js"></script>
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/flot-charts/jquery.flot.time.js"></script>
<!-- Bootstrap Notify Plugin Js -->
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/bootstrap-notify/bootstrap-notify.js"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/jquery-sparkline/jquery.sparkline.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<!-- Tooltip Js -->
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/js/pages/ui/tooltips-popovers.js"></script>

<!-- Dropzone Plugin Js -->
<!-- <script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/dropzone/dropzone.js"></script> -->

<!-- SweetAlert Plugin Js -->
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/sweetalert/sweetalert.min.js"></script>
<!-- autosize -->
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/plugins/autosize/autosize.js"></script>
 
<!-- Custom Js -->
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/js/admin.js"></script>
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/js/pages/tables/jquery-datatable.js"></script>
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/js/pages/ui/dialogs.js"></script>
<!-- Demo Js -->
<script src="<?= base_url() ?>/template/AdminBSBMaterialDesign/js/demo.js"></script>
<script type="text/javascript">
    function previewImg(){
      const imageItem = document.querySelector('#gambar');
      const imageItemLabel = document.querySelector('.custom-file-label');
      const imgPreview = document.querySelector('.img-preview');

      // imageItemLabel.textContent = imageItem.files[0].name;

      const fileImage = new FileReader();
      fileImage.readAsDataURL(imageItem.files[0]);

      fileImage.onload = function(e){
        imgPreview.src = e.target.result;
      }
    }

    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");
    
       swal({
        title: "Apakah anda yakin ingin menghapus?",
        text: "Data yang dihapus tidak akan bisa di kembalikan!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Ya, hapus data!",
        cancelButtonText: "Tidak, batal!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: '/admin/delete/'+id,
             type: 'DELETE',
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Terhapus!", "Data telah dihapus.", "success");
                  document.getElementById('deleted').style.display = 'block';
             }
          });
        } else {
          swal("Batal", "Data tidak jadi dihapus :)", "error");
        }
      });
     
    });
    $(".remove-ptgs").click(function(){
        var id = $(this).parents("tr").attr("id");
    
       swal({
        title: "Apakah anda yakin ingin menghapus?",
        text: "Data yang dihapus tidak akan bisa di kembalikan!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Ya, hapus data!",
        cancelButtonText: "Tidak, batal!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: '/petugas/delete/'+id,
             type: 'DELETE',
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Terhapus!", "Data telah dihapus.", "success");
                  document.getElementById('deleted').style.display = 'block';
             }
          });
        } else {
          swal("Batal", "Data tidak jadi dihapus :)", "error");
        }
      });
     
    });
    $(".remove-brng").click(function(){
        var id = $(this).parents("tr").attr("id");
    
       swal({
        title: "Apakah anda yakin ingin menghapus?",
        text: "Data yang dihapus tidak akan bisa di kembalikan!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Ya, hapus data!",
        cancelButtonText: "Tidak, batal!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: '/itemPerson/delete/'+id,
             type: 'DELETE',
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Terhapus!", "Data barang telah dihapus.", "success");
                  document.getElementById('deleted').style.display = 'block';
             }
          });
        } else {
          swal("Batal", "Data tidak jadi dihapus :)", "error");
        }
      });
     
    });

    
    
</script>

</body>

</html>