

<div class="row header">
    <div class="col">
    <div id="carouselHeader" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
  <div class="carousel-inner">
  <?php
      $photos = Src\Database\PhotoDataBase::read();
      foreach ($photos as $photo){ // On parcourt les photos
        if ($photo->galerie == 1){ // on affiche uniquement les photos de la galerie Carousel
          echo '
          <div class="carousel-item">
            <img src="/upload/'.$photo->image.'" class="d-block w-100" alt="'.$photo->description.'" style=" height: 500px; object-fit: cover;">
          </div>
          ';
        }
      }

    ?>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselHeader" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselHeader" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    </div>
</div>