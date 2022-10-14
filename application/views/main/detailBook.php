
<div class="container mt-3 mb-3 bg-white"  >
  <div class="row" >   
      <div class="col-md-3 mb-3 mt-3">
        <div>
        <img src="<?= base_url('assets/img/book/') . $bookbyid['book_image']; ?>" class="img-fluid">
        </div>
      </div>
      <div class="col-md-9">
        <ul class="list-group mt-3">
          <li class="list-group-item"><h3><?= $bookbyid['book_title']; ?></h3></li>
          <li class="list-group-item"><b>Description:</b> <?= $bookbyid['book_description']; ?></li>
        </ul>
        <br>
        <a href="<?= base_url('main/downloadBook/') .$bookbyid['idbook']; ?>" class="btn btn-primary float-right ml-1">Download</a>
        
      </div>
    </div>
  </div>
  
<br>
<br>
<br>
<br>
<br>
<br>

</div>
</div>
      <!-- End of Main Content -->


