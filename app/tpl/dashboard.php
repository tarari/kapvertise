<?php
  $menu=array(
      'Inici'=>APP_W.'dashboard',
      'Publica'=>APP_W.'dashboard/publish',
      'Sortir'=>APP_W.'home/logout'
    );
  $adm=array(
    'Usuaris',
    'Anuncis'
    );
  include 'common.php';
?><div class="menu">
    <?php
      KMenu::create($menu);
    ?>
  </div>
  <div class="admin">
  <?php
    if ((isset($_COOKIE['rol']))&&($_COOKIE['rol']==3)){
      KButton::create($adm);
    }
  ?>
  </div>
  <div class="content">
  <div class="users-table"></div>
    
  </div>