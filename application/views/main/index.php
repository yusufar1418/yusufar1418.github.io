
<div class="container mt-3">

        <div class="container bg-white" >


          <br>
        <hr>
        <h1 class="text-center text-dark" id="title">Buku</h1>
        <hr>
        <br>
        <div class="row" id="book-list">
          <hr>
            <?php foreach($booklist as $bl) :?>
            <div class="col-md-3">
            <div class="card mb-3">

              <?php $cover = $bl['book_image']; ?>
                <img class="card-img-top" src="<?= base_url('assets/img/book/') . $cover; ?>" alt="Card image cap">
                <div class="card-body">
        
                <h5 class="card-text"><?= $bl['book_title']; ?></h5>
                  
                <a href="<?= base_url('main/detailBook/') .$bl['idbook']; ?>" class="card-link see-detail">See Detail</a>
              </div>
            </div>
            </div>
            <?php endforeach; ?>
        </div>
    <!-- kitab -->
     <br>
        <hr>
        <h1 class="text-center text-dark" id="title">Kitab-Kitab</h1>
        <hr>
        <br>
        <div class="row">
          <hr>
            <?php foreach($holybooklist as $hbl) :?>
            <div class="col-md-3">
            <div class="card mb-3">

              <?php $cover = $hbl['holy_book_image']; ?>
                <img class="card-img-top" src="<?= base_url('assets/img/holybook/') . $cover; ?>" alt="Card image cap">
                <div class="card-body">
        
                <h5 class="card-text"><?= $hbl['holy_book_title']; ?></h5>
                  
                <a href="<?= base_url('main/detailHolyBook/') .$hbl['idholy_book']; ?>" class="card-link">See Detail</a>
              </div>
            </div>
            </div>
            <?php endforeach; ?>
        </div>
        <!-- news -->
        <br>
        <hr>
        <h1 class="text-center text-dark" id="title">Berita</h1>
        <hr>
        <br>
        <div class="row mr-3 ml-3">
          <?php foreach ($newslist as $n) : ?>
            
          <div class="media">
            <img class="mr-3" src="<?= base_url('assets/img/news/') . $n['news_image']; ?>" alt="image" width="350">
            <div class="media-body">
              <h5 class="mt-0"><?= $n['news_title']; ?></h5>
             <p class="text-justify"><?= $n['news_description'];  ?><p>
             <a href="<?= $n['news_link']; ?>" target="_blank">Baca Selengkapnya</a>
             <p class="float-right">Tanggal Upload <?= date('d-m-Y',$n['date_created_news']) ?></p> 
            </div>

          </div>
          <br>
          <?php endforeach; ?>
        </div>
        <br>
      </div>

    </div>
    <br>
      </div>

    </div>
    <br>



</div>
</div>
