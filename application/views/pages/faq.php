 <section id="inner-headline">
   <div class="container">
     <div class="row">
       <div class="span8">
         <div class="inner-heading">
           <h2><?= $detail['title'] ?></h2>
         </div>
       </div>
       <div class="span4">
         <ul class="breadcrumb">
           <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
           <li><a href="#"><?= $detail['header'] ?></a><i class="icon-angle-right"></i></li>
           <li class="active"><?= $detail['title'] ?></li>
         </ul>
       </div>
     </div>
   </div>
 </section>
 <section id="content">
   <div class="container">
     <div class="row">
       <div class="span8">

         <div class="row">
           <div class="span8">
             <div class="post-image">
               <img src="<?= base_url('asset/img/post/')  ?>faq.png" alt="" width="100%" />
             </div>

             <div class="accordion" id="accordion2">
               <div class="accordion-group">
                 <div class="accordion-heading">
                   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                     <i class="icon-plus"></i> FAQ 1 </a>
                 </div>
                 <div id="collapseOne" class="accordion-body collapse" style="height: 0px;">


                   <div class="tabbable tabs-left">
                     <ul class="nav nav-tabs bold">
                       <li class="active"><a href="#topone" data-toggle="tab"> One</a></li>

                     </ul>
                     <div class="tab-content">
                       <div class="tab-pane active" id="topone">
                         <p>
                           <strong>Augue iriure</strong> dolorum per ex, ne iisque ornatus veritus duo. Ex nobis integre lucilius sit, pri ea falli ludus appareat. Eum quodsi fuisset id, nostro patrioque qui id. Nominati eloquentiam in mea.
                         </p>
                         <p>
                           No eum sanctus vituperata reformidans, dicant abhorreant ut pro. Duo id enim iisque praesent, amet intellegat per et, solet referrentur eum et.
                         </p>
                       </div>
                     </div>
                   </div>
                   <!-- end tab -->

                 </div>
               </div>

             </div>

             <div class="bottom-article">
               <ul class="meta-post">
                 <li><i class="icon-user"></i><a href="#"> Admin</a></li>
               </ul>

             </div>
           </div>
         </div>




       </div>
       <div class="span4">
         <?php $this->load->view('template/sidebar'); ?>
       </div>
     </div>
   </div>
 </section>