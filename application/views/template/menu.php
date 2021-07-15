 <?php 
    foreach ($about as $key) :
        if ($key['nama'] == $detail['title']) : ?>
         <li class="highlight"><i class="icon-angle-right "></i>
             <a href="<?= base_url() . $key['attr_href'] ?>">
                 <strong>
                     <?= $key['nama'] ?>
                 </strong>
             </a><span></span>
         </li>
     <?php else : ?>
         <li><i class="icon-angle-right"></i><a href="<?= base_url() . $key['attr_href'] ?>"><?= $key['nama'] ?></a><span></span></li>
     <?php endif ?>
 <?php endforeach ?>