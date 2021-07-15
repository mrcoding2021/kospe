<ul id="mycarousel" class="jcarousel-skin-tango recent-jcarousel clients">
        <?php foreach($logo as $key):?>
          
          <li>
            <a href="#">
              <img src="<?= base_url('asset/img/kospe/').$key['img']?>" class="client-logo" alt="" />
            </a>
          </li>

          <?php endforeach?>
    </ul>