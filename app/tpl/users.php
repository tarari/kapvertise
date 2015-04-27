<?php
  $menu=array(
      'Inici'=>APP_W.'dashboard',
      'Enrere'=>APP_W.'users/back'
      
    );
  include 'common.php';
?>

  <div class="menu">
    <?php
      KMenu::create($menu);
    ?>
  </div>
  <section>
  	<div class="users-table">
  		
  	</div>
  </section>
