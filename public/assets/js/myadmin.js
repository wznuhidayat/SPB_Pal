function previewImg() {
  const imageItem = document.querySelector('#gambar');
  const imageItemLabel = document.querySelector('.custom-file-label');
  const imgPreview = document.querySelector('.img-preview');

  // imageItemLabel.textContent = imageItem.files[0].name;

  const fileImage = new FileReader();
  fileImage.readAsDataURL(imageItem.files[0]);

  fileImage.onload = function (e) {
    imgPreview.src = e.target.result;
  }
}
function tgl_indo(tgl){
  var tanggal = (tgl).substr(8,2);
  var bulan = "";
   switch ((tgl).substr(5,2)){
        case '01': 
          bulan= "Januari";
        case '02':
          bulan= "Februari";
        case '03':
          bulan= "Maret";
        case '04':
          bulan= "April";
        case '05':
          bulan= "Mei";
        case '06':
          bulan= "Juni";
        case '07':
          bulan= "Juli";
        case '08':
          bulan= "Agustus";
        case '09':
          bulan= "September";
        case '10':
          bulan= "Oktober";
        case '11':
          bulan= "November";
        case '12':
          bulan= "Desember";
      }

    var tahun = (tgl).substr(0,4);
    return tanggal+' '+bulan+' '+tahun;		 
}
$('.datepicker').bootstrapMaterialDatePicker({
  format: 'YYYY-MM-DD HH:mm:ss',
  clearButton: true,
  weekStart: 1
});
$(".rm").click(function () {
  var id = $(this).parents("tr").attr("id");
  var segment = $(this).parents("tbody").attr("id");
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
    function (isConfirm) {
      if (isConfirm) {
        $.ajax({
          url: '/administator/'+segment+'/delete/' + id,
          type: 'DELETE',
          error: function () {
            alert('Something is wrong');
          },
          success: function (data) {
            $("#" + id).remove();
            swal("Terhapus!", "Data telah dihapus.", "success");
            document.getElementById('deleted').style.display = 'block';
          }
        });
      } else {
        swal("Batal", "Data tidak jadi dihapus :)", "error");
      }
    });

});
$(".remove").click(function () {
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
    function (isConfirm) {
      if (isConfirm) {
        $.ajax({
          url: '/admin/delete/' + id,
          type: 'DELETE',
          error: function () {
            alert('Something is wrong');
          },
          success: function (data) {
            $("#" + id).remove();
            swal("Terhapus!", "Data telah dihapus.", "success");
            document.getElementById('deleted').style.display = 'block';
          }
        });
      } else {
        swal("Batal", "Data tidak jadi dihapus :)", "error");
      }
    });

});
$(".remove-ptgs").click(function () {
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
    function (isConfirm) {
      if (isConfirm) {
        $.ajax({
          url: '/petugas/delete/' + id,
          type: 'DELETE',
          error: function () {
            alert('Something is wrong');
          },
          success: function (data) {
            $("#" + id).remove();
            swal("Terhapus!", "Data telah dihapus.", "success");
            document.getElementById('deleted').style.display = 'block';
          }
        });
      } else {
        swal("Batal", "Data tidak jadi dihapus :)", "error");
      }
    });

});
$(".remove-brng").click(function () {
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
    function (isConfirm) {
      if (isConfirm) {
        $.ajax({
          url: '/itemPerson/delete/' + id,
          type: 'DELETE',
          error: function () {
            alert('Something is wrong');
          },
          success: function (data) {
            $("#" + id).remove();
            swal("Terhapus!", "Data barang telah dihapus.", "success");
            document.getElementById('deleted').style.display = 'block';
          }
        });
      } else {
        swal("Batal", "Data tidak jadi dihapus :)", "error");
      }
    });

});
$(".remove-mat").click(function () {
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
    function (isConfirm) {
      if (isConfirm) {
        $.ajax({
          url: '/administator/material/delete/' + id,
          type: 'DELETE',
          error: function () {
            alert('Something is wrong');
          },
          success: function (data) {
            $("#" + id).remove();
            swal("Terhapus!", "Data barang telah dihapus.", "success");
            document.getElementById('deleted').style.display = 'block';
          }
        });
      } else {
        swal("Batal", "Data tidak jadi dihapus :)", "error");
      }
    });

});