<?php $this->load->view('template/main/up_header'); ?>
<style>
    .overflow {
        overflow: auto !important;
    }

    ::-webkit-scrollbar {
        width: 5px;
        background: white;
    }

    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(1, 1, 1, 0.1);
        background: white;
    }

    ::-webkit-scrollbar-thumb {
        background: #d1d1d1;
    }
</style>
<div id="main-wrapper">
    <style>
    </style>
    <aside class="left-sidebar position-fixed">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar text-white overflow">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav" class="pt-2">
                    <li class="sidebar-item text-center hide-menu bg-light text-dark"><small class="hide-menu" id=""> Menu Utama</small></li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('welcome'); ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Home Page</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="<?php echo base_url('member_dashboard'); ?>" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Dashboard</span></a></li>
                    <!-- <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark" href="<?php echo base_url() ?>marketplace" aria-expanded="false"><i class="mdi mdi-shopping"></i><span class="hide-menu">Marketplace</span></a></li> -->
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-shopping"></i><span class="hide-menu">Marketplace</span></a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item side-down ml-2"><a class="sidebar-link waves-effect waves-dark" href="<?php echo base_url() ?>marketplace" aria-expanded="false"><i class="mdi mdi-label pr-2"></i><span class="hide-menu"> Semua Kategori </span></a></li>
                            <span class="pilih-kategori-produk-list"></span>
                        </ul>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark" href="<?php echo base_url() ?>member_events" aria-expanded="false"><i class="mdi mdi-flag"></i><span class="hide-menu">News & Events</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Referral Page</span></a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <!-- <li class="sidebar-item side-down ml-2"><a class="sidebar-link waves-effect waves-dark" href="<?php echo base_url() ?>member_lead" aria-expanded="false"><i class="mdi mdi-account-star"></i><span class="hide-menu">My Leads</span></a></li> -->
                            <li class="sidebar-item side-down ml-2"><a href="<?php echo base_url() ?>member_tools/galeri" class="sidebar-link"><i class="mdi mdi-file-image"></i><span class="hide-menu"> Photo</span></a></li>
                            <li class="sidebar-item side-down ml-2"><a href="<?php echo base_url() ?>tools_video" class="sidebar-link"><i class="mdi mdi-video"></i><span class="hide-menu">Video Ecollabs</span></a></li>
                            <li class="sidebar-item side-down ml-2"><a href="<?php echo base_url() ?>tools_video/produk" class="sidebar-link"><i class="mdi mdi-video"></i><span class="hide-menu">Video Produk</span></a></li>
                            <li class="sidebar-item side-down ml-2"><a href="<?php echo base_url() ?>member_tools/copy_writing" class="sidebar-link"><i class="mdi mdi-tooltip-edit"></i><span class="hide-menu">Copy Writing</span></a></li>
                            <!-- <li class="sidebar-item side-down ml-2"><a href="<?php echo base_url() ?>member_tools/landing_page" class="sidebar-link"><i class="mdi mdi-book-variant"></i><span class="hide-menu">Landing Page</span></a></li> -->
                        </ul>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark" href="<?php echo base_url() ?>membership" aria-expanded="false"><i class="mdi mdi-wallet-membership"></i><span class="hide-menu">Membership</span></a></li>
                    <li class="sidebar-item"><a href="<?php echo base_url() ?>member_training" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Training Centre</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark" href="<?php echo base_url() ?>order_status" aria-expanded="false"><i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu">Order Status</span></a></li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <?php $this->load->view('template/main/down_header'); ?>
    <div class="alert alert-primary alert-dismissible fade show fixed-top text-center" hidden role="alert" id="konfirmasiPembayaranSukses">
        <strong>Selamat !! </strong> Konfirmasi Pembayaran Berhasil
    </div>

    <script>
        $(document).ready(function() {});
    </script>
    <div class="container-flui">