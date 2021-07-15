<style>
  .bg-gw {
    background-color: grey;
  }

  .collapse-content .fa.fa-heart:hover {
    color: #f44336 !important;
  }

  .collapse-content .fa.fa-share-alt:hover {
    color: #0d47a1 !important;
  }

  .mt-2 {
    padding-top: 10px;

  }

  .mt-x {
    margin-top: -20px !important;
    margin-bottom: 10px;

  }

  .w-100 {
    height: 200px
  }

  .card {
    border: .5px black solid;
    padding: 10px;

  }

  .pb-1 {
    padding-bottom: 20px;
  }
</style>
<section id="featured">
  <div id="nivo-slider">
    <div class="nivo-slider">
      <?php foreach ($slider as $key) : ?>
        <img src="<?= base_url('asset/') ?>img/slides/nivo/<?= $key['img'] ?>" alt="" />
      <?php endforeach ?>
    </div>
  </div>
</section>
<section class="callaction">
  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="big-cta">
          <div class="cta-text">
            <h3>Lebih dari <span class="highlight"><strong>500 orang</strong></span> telah bergabung menjadi anggota KoSPE</h3>
          </div>
          <div class="cta floatright">
            <a class="btn btn-large btn-theme btn-rounded" href="https://member.kospe.net/082211777107">Gabung Sekarang</a>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="content">
  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="row">
          <div class="span3">
            <div class="box aligncenter">
              <div class="aligncenter icon">
                <img src="<?= base_url() . 'asset/img/kospe/1.png' ?>" alt="" width="50%">
              </div>
              <div class="text">
                <h6>1000 Pesantren</h6>
                <p>
                  Mewujudkan 1000 Pesantren pengahfal Alquran di seluruh Indonesia
                </p>
              </div>
            </div>
          </div>
          <div class="span3">
            <div class="box aligncenter">
              <div class="aligncenter icon">
                <img src="<?= base_url() . 'asset/img/kospe/2.png' ?>" alt="" width="50%">
              </div>
              <div class="text">
                <h6>Memberantas KPR</h6>
                <p>
                  Memberantas KPR (Kefakiran, Pemurtadan dan Riba)
                </p>

              </div>
            </div>
          </div>
          <div class="span3">
            <div class="box aligncenter">
              <div class="aligncenter icon">
                <img src="<?= base_url() . 'asset/img/kospe/3.png' ?>" alt="" width="50%">
              </div>
              <div class="text">
                <h6>Lembaga Syariah</h6>
                <p>
                  Menjadi lembaga keuangan syariah dan menjalankan program bisnis berasaskan syariah
                </p>

              </div>
            </div>
          </div>
          <div class="span3">
            <div class="box aligncenter">
              <div class="aligncenter icon">
                <img src="<?= base_url() . 'asset/img/kospe/4.png' ?>" alt="" width="50%">
              </div>
              <div class="text">
                <h6>Distibutor Produk Halal</h6>
                <p>
                  Memproduksi dan memasarkan produk-produk halal ke seluruh dunia
                </p>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- divider -->
    <div class="row">
      <div class="span4">
        <div class="solidline">
          <a href="<?= base_url('home/hni') ?>"><img src="<?= base_url('asset/img/klik3.png') ?>" alt=""></a>
        </div>
      </div>
      <div class="span4">
        <div class="solidline">
          <a href="<?= base_url('home/ajukan') ?>"><img src="<?= base_url('asset/img/klik1.png') ?>" alt=""></a>
        </div>
      </div>
      <div class="span4">
        <div class="solidline">
          <a href="<?= base_url('home/simpan') ?>"><img src="<?= base_url('asset/img/klik2.png') ?>" alt=""></a>
        </div>
      </div>
    </div>

    <!-- <div class="row">
      <h4 class="heading">Unit <strong>Usaha KoSPE</strong></h4>
      <div class="span12">
        <div class="row">
          <div class="span3">
            <div class="box aligncenter">
              <div class="aligncenter icon">
                <img src="<?= base_url() . 'asset/img/kospe/uspps.png' ?>" alt="" width="50%">
              </div>
            </div>
          </div>
          <div class="span3">
            <div class="box aligncenter">
              <div class="aligncenter icon">
                <img src="<?= base_url() . 'asset/img/kospe/agro.png' ?>" alt="" width="50%">
              </div>
            </div>
          </div>
          <div class="span3">
            <div class="box aligncenter">
              <div class="aligncenter icon">
                <img src="<?= base_url() . 'asset/img/kospe/alfalah.png' ?>" alt="" width="50%">
              </div>
            </div>
          </div>
          <div class="span3">
            <div class="box aligncenter">
              <div class="aligncenter icon">
                <img src="<?= base_url() . 'asset/img/kospe/alafahtour.png' ?>" alt="" width="50%">
              </div>
            </div>
          </div>
          <div class="span3">
            <div class="box aligncenter">
              <div class="aligncenter icon">
                <img src="<?= base_url() . 'asset/img/kospe/okeywisata.png' ?>" alt="" width="50%">
              </div>
            </div>
          </div>
          <div class="span3">
            <div class="box aligncenter">
              <div class="aligncenter icon">
                <img src="<?= base_url() . 'asset/img/kospe/okekreatif.png' ?>" alt="" width="50%">
              </div>

            </div>
          </div>
        </div>
      </div>
    </div> -->



    <!-- end divider -->
    <div class="row">
      <div class="span12">
        <h4 class="heading">Promo <strong>KoSPE 2021</strong></h4>
        <?php if ($promo != null) : ?>
          <div class="row">
            <ul id="thumbs">
              <?php foreach ($promo as $key) : ?>
                <li class="item-thumbs span4">
                  <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                  <a href="https://bit.ly/PembiayaanKoSPE">
                    <img src="<?= base_url('asset/img/promo/' . $key->img) ?>" alt="<?= $key->judul ?>">
                  </a>

                </li>
              <?php endforeach ?>
            </ul>
          </div>
        <?php else : ?>
          Belum ada Promo

        <?php endif ?>
      </div>
    </div>


    <div class="row">
      <div class="span12">
        <h4 class="heading">Produk <strong>Pembiayaan</strong></h4>
        <div class="row">
          <ul id="thumbs">
            <?php foreach ($pembiayaan as $key) : ?>
              <li class="item-thumbs span4">
                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                <a href="https://bit.ly/PembiayaanKoSPE">
                  <img src="<?= base_url('asset/img/produk/' . $key->img) ?>" alt="<?= $key->nama ?>">
                </a>

              </li>
            <?php endforeach ?>
          </ul>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="span12">
        <h4 class="heading">Produk <strong>Simpanan</strong></h4>
        <div class="row">
          <ul id="thumbs">
            <?php foreach ($simpanan as $key) : ?>
              <li class="item-thumbs span4">
                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                <a href="https://bit.ly/PembiayaanKoSPE">
                  <img src="<?= base_url('asset/img/produk/' . $key->img) ?>" alt="<?= $key->nama ?>">
                </a>

              </li>
            <?php endforeach ?>
          </ul>
        </div>
      </div>
    </div>

    <!-- Portfolio Projects -->



  </div>
</section>
<section class="callaction">
  <div class="container">

    <div class="row ">
      <div class="span12">
        <h4 class="heading">Berita dan <strong>Artikel</strong></h4>
        <div class="row">
          <?php foreach ($post as $key) : ?>
            <?php $slug = strtolower(str_replace(' ', '-', $key->judul));
            ?>
            <div class="span4">
              <div class="card">
                <img class="card-img-top" src="<?= base_url('asset/img/post/' . $key->img) ?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?= $key->judul ?></h5>
                  <p class="card-text" style="margin-top: -20px;"><?= html_entity_decode(substr($key->isi, 0, 100)) ?></p>
                  <br>
                  <a href="<?= base_url('post/' . str_replace('/', '', shortdate_indo($key->date))) . '/' . str_replace(' ', '-', $key->judul) ?>" class="btn btn-danger">Read More</a>
                </div>
              </div>
            </div>
          <?php endforeach ?>

        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container" style="margin-top: 40px;">
    <!-- end divider -->
    <div class="row">
      <div class="span12">
        <h4>Mitra <strong>Kerja</strong></h4>
        <?php $this->load->view('template/logo-mitra') ?>
      </div>
    </div>
  </div>
  
    <div class="modal fade" id="popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <a href="#" data-dismiss="modal" style="font-size:25px; text-decoration: none; position: absolute; bottom:-40px; margin: 100px; padding: 10px; line-height:10px; background-color: white; border-radius:20px">x</a>
      <div class="modal-content" style="padding: 10px">
        <img width="100%" src="<?= base_url('asset/img/promo/'.$iklan) ?>" alt="">
      </div>
    </div>
  