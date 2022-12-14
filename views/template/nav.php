<div class="row nav1 d-flex justify-content-between bg-dark bg-gradient" style="--bs-bg-opacity: .9;">
  <div class="col-1">
    <a href="/accueil"><img src="/assets/imgs/banniereWoodsLake2.png" alt=""></a>
  </div>
  <div class=" col-sm-10 col-md-9">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid justify-content-evenly">
        <button class="navbar-toggler text-center" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon bg-light"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
          <ul class="navbar-nav  m-auto text-center">
            <li class="nav-item">
              <a class="nav-link <?php if (isset($activeAccueil)){ echo $activeAccueil; } ?>" href="/accueil">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if (isset($activeGroupe)){ echo $activeGroupe; } ?>" href="/groupe">Le groupe</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if (isset($activeGalerie)){ echo $activeGalerie; } ?>" href="/galerie">Galerie</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?php if (isset($activeContact)){ echo $activeContact; } ?>" href="/contact">Nous contacter</a>
            </li>
            
              <?php 
                if (!empty($_SESSION)) {
                  echo '<li>'.$_SESSION['prenom'].' '.$_SESSION['nom'].'</li>';
                  echo '<li class="nav-item"><a class="nav-link'?> <?php if (isset($activeCompte)){ echo $activeCompte; } ?><?php echo '" href="/compte">Mon compte</a></li>';
                  echo '<li class="nav-item"><a href="/deconnexion"><button class="btn btn-success">Se déconnecter</button></a></li>';
                  if ($_SESSION['isAdmin']){
                  echo '<li class="nav-item"><a href="/administration"><button class="btn btn-info"><i class="fa fa-gear"></i></button></a></li>';
                  }
 
                }
                else{
                  echo '<li class="nav-item"><a href="/connexion"><button class="btn btn-success">Se connecter</button></a></li>';
                }
              ?>
            
          </ul>
        </div>
      </div>
    </nav>
  </div>

</div>