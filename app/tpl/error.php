<?php
  $menu=array(
      'Inici'=>APP_W
      
    );
  include 'common.php';
?>
  <div class="menu">
    <?php
      KMenu::create($menu);
    ?>
  </div>
  <div class="content">
    <h2>Error</h2>
    <h3>Pàgina inexistent</h3>
  </div>