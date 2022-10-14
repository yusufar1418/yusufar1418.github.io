    
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; LSM <?= date('Y') ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <!-- <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script> -->
  <!-- <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  <script src="<?= base_url('assets/'); ?>jquery/jquery.js"></script>
  <script src="<?= base_url('assets/'); ?>jquery/bootstrap.js"></script>
  <script src="<?= base_url('assets/'); ?>jquery/jquery-ui.js"></script>
  <!-- <script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script> --> <!-- Load file plugin js jquery-ui -->


  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->

  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

  <script src="<?= base_url('assets/datatables/js/jquery.dataTables.min.js') ;?>"></script>
    <script src="<?= base_url('assets/datatables/js/dataTables.bootstrap4.js') ;?>"></script>
    <script src="<?= base_url('assets/js/sweetalert2.all.min.js') ;?>"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    

    <script type="text/javascript">
      $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
      });

      $('.form-check-input').on('click', function(){
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
          url: "<?= base_url('admin/changeaccess'); ?>",
          type: 'post',
          data: {
            menuId: menuId,
            roleId: roleId
          },
          success: function () {
            document.location.href ="<?= base_url('admin/roleaccess/') ?>" + roleId;
          }
        });
        
      });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
 
            $('#title').autocomplete({
                source: "<?= base_url('crew/get_autocomplete');?>",
      
                select: function (event, ui) {
                   $('[name="title"]').val(ui.item.label); 
                    $('[name="idposition"]').val(ui.item.idposition); 
                    $('[name="salary1"]').val(ui.item.salary); 
                    $('[name="job_allowance1"]').val(ui.item.job_allowance); 
                    $('[name="certificates_allowance1"]').val(ui.item.certificates_allowance); 
                    $('[name="salary_bpjs"]').val(ui.item.salary_bpjs); 
                }
            });
 
        });
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('.js-example-basic-single').select2();
    $('.js-example-basic-single1').select2();
});
</script>



    <script type="text/javascript">
        $(document).ready(function(){
            $('.button-delete').on('click', function(e){
                e.preventDefault();
                const href = $(this).attr('href');

                Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.value) {
                    document.location.href = href;
                  }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.button-acc').on('click', function(e){
                e.preventDefault();
                const href = $(this).attr('href');

                Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Accept it!'
                }).then((result) => {
                  if (result.value) {
                    document.location.href = href;
                  }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.button-send').on('click', function(e){
                e.preventDefault();
                const href = $(this).attr('href');

                Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Send it!'
                }).then((result) => {
                  if (result.value) {
                    document.location.href = href;
                  }
                });
            });
        });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
      $('#table').DataTable();
      $('#table2').DataTable();
      responsive: true
    });
</script>

<script>
          $(document).ready(function(){
              $("#provinsi").change(function (){
                  var url = "<?php echo site_url('admin/add_ajax_kab');?>/"+$(this).val();
                  $('#kabupaten').load(url);
                  return false;
              })
          });
      </script>

      <script type="text/javascript">
        $('#book-list').on('click', '.see-detail', function () {

    $.ajax({
        url: 'http://omdbapi.com',
        dataType: 'json',
        type: 'get',
        data: {
            'apikey': 'dca61bcc',
            'i': $(this).data('id')
        },
        success: function (movie) {
            if (movie.Response === "True") {

                $('.modal-body').html(`
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="`+ movie.Poster + `" class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <ul class="list-group">
                                    <li class="list-group-item"><h3>`+ movie.Title + `</h3></li>
                                    <li class="list-group-item">Released : `+ movie.Released + `</li>
                                    <li class="list-group-item">Genre : `+ movie.Genre + `</li>                 
                                    <li class="list-group-item">Director : `+ movie.Director + `</li>                 
                                    <li class="list-group-item">Director : `+ movie.Actors + `</li>                 
                                </ul>
                            </div>
                        </div>
                    </div>
                `);

            }
        }
    });

      </script>

</body>

</html>
