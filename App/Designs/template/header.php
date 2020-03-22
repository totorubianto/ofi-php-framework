<nav class="navbar navbar-expand-md 

<?php 
  if ($navbar['theme'] == 'dark') {
    echo 'bg-dark navbar-dark';
  } elseif($navbar['theme'] == 'white' || $navbar['theme'] == '') {
    echo 'bg-light navbar-light border-bottom';
  }
  
?>

">
  <!-- Brand -->
  <a class="navbar-brand" href="index/">
    <?php
      if ($navbar['title']) {
        echo PROJECTNAME;
      }  
    ?>
  </a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse 
  
  <?php
  if ($navbar['float'] == 'right') {
    echo "justify-content-end";

  } elseif($navbar['float'] == 'left') {
    echo "justify-content-start";
    
  } elseif($navbar['float'] == 'center') {
    echo "justify-content-center";
  }
  
  ?>

  " id="collapsibleNavbar">
    <ul class="navbar-nav">
    
      <?php for ($i=1; $i <= count($navbar['menu']) ; $i++) { ?>
      <?php $a = $i - 1; ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $navbar['menu'][$a]['url'] ?> "><?php echo $navbar['menu'][$a]['name'] ?></a>
        </li>
      <?php } ?>
      
    </ul>
  </div>
</nav>