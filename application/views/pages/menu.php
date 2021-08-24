 
 <?php $this->db->where('kategori', 1);
    $paket = $this->db->get('paket')->result();
    foreach ($paket as $key) :
        if ($key->nama == $detail['title']) : ?>
         <li class="highlight"><i class="icon-angle-right "></i>
             <a href="<?= base_url('simpanan/detail/') . str_replace(' ', '-', $key->nama) ?>">
             <strong class="text-danger">

                 <?= $key->nama ?>
             </strong>
             </a>
         </li>
     <?php else : ?>
         <li><i class="icon-angle-right"></i><a href="<?= base_url('simpanan/detail/') . str_replace(' ', '-', $key->nama)  ?>"><?= $key->nama ?></a><span></span></li>
     <?php endif ?>
 <?php endforeach ?>