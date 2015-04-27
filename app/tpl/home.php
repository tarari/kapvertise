<?php
  $menu=array(
      'Inici'=>APP_W,
      'Registre'=>APP_W.'reg'
    );
  include 'common.php';
?><div class="menu">
    <?php
      KMenu::create($menu);
    ?>
  </div>
  <div class="content">
    <div class="art">
    </div>
    <div class="art">
    </div>
  </div>
