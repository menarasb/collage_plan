<!-- jQuery -->
<script src="<?= base_url() ?>assets/adminlte3/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/adminlte3/dist/js/adminlte.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url() ?>assets/adminlte3/plugins/iCheck/icheck.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>assets/adminlte3/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>assets/adminlte3/plugins/inputmask/jquery.inputmask.bundle.js"></script>
<script src="<?= base_url() ?>assets/adminlte3/plugins/moment/moment.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url() ?>assets/adminlte3/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url() ?>assets/adminlte3/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url() ?>assets/adminlte3/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/adminlte3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>assets/adminlte3/plugins/fastclick/fastclick.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/adminlte3/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/adminlte3/plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- input file-->
<script src="<?= base_url() ?>assets/adminlte3/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script src="<?= base_url() ?>assets/adminlte3/plugins/ckeditor/ckeditor.js"></script>
<script src="<?= base_url() ?>assets/adminlte3/plugins/ckeditor/samples/js/sample.js"></script>
<script>
	initSample();
</script>
    
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>assets/adminlte3/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>assets/adminlte3/plugins/toastr/toastr.min.js"></script>

<script>
$(window).load(function(){
  $(document).ready(function () {
      swal({ title: "Hooray", text: "You did it!", type: "success" });
  });
});
    </script>

<!-- Summernote -->
<script src="<?= base_url() ?>assets/adminlte3/plugins/summernote/summernote-bs4.min.js"></script>
<script>
$(function() {
    // Summernote
    $('.textarea').summernote()
})
</script>
<script>
$('.datepicker1').datepicker({
      autoclose: true
});
$(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY hh:mm A'
        }
    })

    //npwp
    $(".npwp").inputmask("99.999.999.9-999-999");
    //Date range as a button
    $('#daterange-btn').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf('month')
                ]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        },
        function(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
        format: 'LT'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });
})
</script>
<script>
$(function() {
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    })
})
</script>

<script>
$(function() {
    $(".datatabledong").DataTable();
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
    });
});
</script>

<script>
$(document).ready(function() {
    $('#tableserverside').DataTable({
        "processing": true,
        "serverSide": true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "ajax": "../../serverside/<?php $app->dt_name($dt_name);?>",
    });
});
</script>


<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'center',
      showConfirmButton: false,
      timer: 3000
    }); 
    <?php if($_GET['alert']=='success'){?>
    $(document).ready(function() {
        Toast.fire({
        type: 'success',
        title: 'Mantap Lur, Inputan Barusan Sudah terekam di Database!'
      })
    }); 
    <?php } else if ($_GET['alert']=='error') {?>
    $(document).ready(function() {
        Toast.fire({
        type: 'error',
        title: 'Maaf Lurr, Inputan Barusan Gagal terekam di Database!'
      })
    }); 
    <?php } else if ($_GET['alert']=='success_close') {?>
    $(document).ready(function() {
        Toast.fire({
        type: 'success',
        title: 'Sipp Lurr, Status Surat Barusan jadi Close!'
      })
    });
    <?php } else if ($_GET['alert']=='success_reset') {?>
    $(document).ready(function() {
        Toast.fire({
        type: 'success',
        title: 'Sipp Lurr, Status Surat Sudah Kembali Ke Belum Dispo!'
      })
    });
    <?php } else if ($_GET['alert']=='success_hapus') {?>
    $(document).ready(function() {
        Toast.fire({
        type: 'success',
        title: 'Sipp Lurr, Data Berhasil Dihapus!'
      })
    });
    <?php }?>
  });
</script>

<script type="text/javascript">

  $(function() {
    
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
    });
    
    $(document).ready(function() {
        $(document).on('click', '.hapus', function(e) {
            var link = $(this).attr('href');
            //konfirmasi dlu sebelum delete
            Swal.fire({
            title: 'Yakin data mau dihapus nih?',
            text: "Ga bisa dibalikin loh!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus aja gpp!',
            cancelButtonText : 'Ga jadi deh, hehe'
            }).then((result) => {
            if (result.value) {               
                window.location.href = link
            }
            })
            return false;
            //konfirmasi dlu sebelum delete
            });
    });

    
  });
</script>

<script>
$(document).ready(function() {
    $(document).on('click', '#modalview', function(e) {
        e.preventDefault();
        var uid = $(this).data('id');
        var ukode = $(this).data('kode'); // it will get id of clicked row
        var uno = $(this).data('no');
        $('#dynamic-content').html(''); // leave it blank before ajax call
        $('#modal-loader').show(); // load ajax loader
        $.ajax({
                url: '_modal_edit.php',
                type: 'POST',
                data: 'id=' + uid + '&kode=' + ukode,
                dataType: 'html'
            })
            .done(function(data) {
                console.log(data);
                $('#dynamic-content').html('');
                $('#dynamic-content').html(data); // load response 
                $('#modal-loader').hide(); // hide ajax loader	
            })
            .fail(function() {
                $('#dynamic-content').html(
                    '<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...'
                );
                $('#modal-loader').hide();
            });
    });
});
</script>