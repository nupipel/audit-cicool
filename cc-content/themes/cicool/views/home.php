<?= get_header(); ?>

<body id="page-top">
   <?= get_navigation(); ?>

   <header>
      <div class="header-content">
         <div class="header-content-inner">
            <h1 id="homeHeading">SIMAK3</h1>
            <h3>SISTEM INFORMASI MANAJEMEN AUDIT KESELAMATAN DAN KESEHATAN KERJA</h3>
            <hr>

            <div class="row d-flex">
               <?php foreach ($logo as $l) : ?>
                  <img src="<?= BASE_URL . 'uploads/images/' . $l->image ?>" alt="..." style="max-height: 100px">
               <?php endforeach; ?>
            </div>

         </div>
      </div>
   </header>
   <?= get_footer(); ?>