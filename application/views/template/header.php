<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $detail['title'] ?></title>
    <!-- <meta http-equiv="Content-Security-Policy" content="default-src https:"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Menjadi KOPERASI SYARIAH yang TERPERCAYA dan TERDEPAN dalam MEMBANGUN dan MENGEMBANGKAN PEREKONOMIAN UMAT" />
    <meta name="author" content="Bagus Hernowo" />
    <meta name="keyword" content="koperasi, koperasi syariah, pesantren, syariah, bisnis, keuangan, keseahtan, haji, umroh, wisata" />
    <meta property="og:image" content="<?= base_url('asset/img/post/' . $detail['img'])  ?>">
    <link rel="shortcut icon" href="<?= base_url('asset/img/') ?>logo-kospe.png">

    <!-- css -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700" rel="stylesheet">
    <link itemprop="thumbnailUrl" href="" <?= base_url('asset/img/post/' . $detail['img'])  ?>"> <span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
        <link itemprop="url" href="" <?= base_url('asset/img/post/' . $detail['img'])  ?>">
    </span>
    <link href="<?= base_url('asset/') ?>css/bootstrap.css" rel="stylesheet" />
    <link href="<?= base_url('asset/') ?>css/bootstrap-responsive.css" rel="stylesheet" />
    <link href="<?= base_url('asset/') ?>css/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="<?= base_url('asset/') ?>css/jcarousel.css" rel="stylesheet" />
    <link href="<?= base_url('asset/') ?>css/flexslider.css" rel="stylesheet" />
    <link href="<?= base_url('asset/') ?>css/style.css" rel="stylesheet" />
    <!-- Theme skin -->
    <link href="<?= base_url('asset/') ?>skins/default.css" rel="stylesheet" />
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png" />
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png" />
    <link rel="shortcut icon" href="<?= base_url('asset/img/') ?>logo-kospe.png" />
    <script src="<?= base_url('asset/') ?>js/jquery.js"></script>
    <!-- =======================================================
    Theme Name: Flattern
    Theme URL: https://bootstrapmade.com/flattern-multipurpose-bootstrap-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
    <div id="wrapper">

        <!-- start header -->
        <header>
            <div class="container ">

                <div class="row nomargin">
                    <div class="span12">
                        <div class="headnav">

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="span4">
                        <div class="logo">
                            <a href="<?= base_url() ?>"><img src="<?= base_url('asset/img/') ?>logo-kospe.png" alt="" class="logo" width="100px" /></a>
                        </div>
                    </div>
                    <div class="span8">
                        <div class="navbar navbar-static-top">
                            <div class="navigation">
                                <nav>
                                    <ul class="nav topnav">
                                        <?php


                                        foreach ($menu as $key) {
                                            if ($key['nama'] == $detail['title']) :
                                        ?>
                                                <li class="dropdown active">
                                                <?php else : ?>
                                                <li class="dropdown">
                                                <?php endif ?>
                                                <?php if ($key['dropdown'] == 1) : ?>
                                                    <a href="#"><?php echo $key['nama']; ?><i class="icon-angle-down"></i></a>
                                                    <ul class="dropdown-menu">
                                                        <?php
                                                        $submenu = $this->db->get_where('tb_menu', array('acces' => 3, 'parent' => $key['id_menu']))->result_array();
                                                        foreach ($submenu as $sub) : ?>
                                                            <li><a href="<?php echo base_url($sub['attr_href']); ?>"><?php echo $sub['nama']; ?></a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                    </a>
                                                <?php else : ?>
                                                    <a href="<?= base_url($key['attr_href']) ?>"><?php echo $key['nama']; ?></a>
                                                <?php endif ?>
                                                </li>
                                            <?php } ?>
                                            <li class="dropdown btn-secondaru">
                                                <a href="https://member.kospe.net/">Login KOSPE</a>
                                            </li>

                                    </ul>
                                </nav>
                            </div>
                            <!-- end navigation -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header -->