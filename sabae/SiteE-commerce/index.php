<?php 
include 'Admin/db.php';
require 'Admin/session.php';
Session::start();

$select1 = $db->query("SELECT allitems_id, name, description, price, categorie, image FROM all_items where categorie = 'Yarn'");
$items1 = $select1->fetchAll();
$select2 = $db->query("SELECT allitems_id, name, description, price, categorie, image FROM all_items where categorie = 'Crochet'");
$items2 = $select2->fetchAll();
$select3 = $db->query("SELECT allitems_id, name, description, price, categorie, image FROM all_items where categorie = 'Knitting'");
$items3 = $select3->fetchAll();
?>


<!DOCTYPE html>
<html>

<head>
  <link rel="icon" href="img/logo.png">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset="utf-8">
  <title>COCO YARN</title>
  
</head>

<body>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>

  <!--...........................Navbar.............................-->

  <header class="main_h ">

    <div class="row mx-auto d-flex justify-content-between align-items-center">
      <a class="logo d-flex flex-row justify-content-center align-items-center" href="#"><img src="img/logo.png"
          class="w-100"> <span class="display-5 text-center"> COCO YARN</span></a>

      <div class="mobile-toggle">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <nav>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#Yarn">Yarn</a></li>
          <li><a href="#Hook">Hook</a></li>
          <li><a href="#Knitting">Knitting</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </nav>

    </div> <!-- / row -->

  </header>

  <section class="home">
    <div class="section_header"><span class="display-1 font-weight-bold text-danger">Welcome</span>
    </div>
  </section>
  <div style="height: 1000px">

    <!--//////////////////////////////////Les articles///////////////////////////////////////-->

    <!--ARTICLE I...............................................................................................................................-->
    <div class="article">

      <div class="container-fluid">
        <div class="h2" id="Yarn">
          <h2>Yarn</h2>
          <hr>
        </div>
      </div>

      <div class="container-fluid card mb-5 w-75 d-flex flex-column justify-content-center align-items-center">
        <img src="img/p1.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title1">Yarn closeout</h5>
        </div>

        <div class="row row__">
          <?php foreach($items1 as $item):?>

          <div class="col">
            <div class="card mb-5" style="width: 25rem;">
              <img src="img/<?= $item['image'];?>" class="card-img-top _card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?= $item['name'];?></h5>
                <p class="card-text"><strong><?= $item['price'];?></strong> DH</p>
                <button type="button" class="btn btn-outline-info">Add to shopping bag</button>
              </div>
            </div>
          </div>

          <?php endforeach;?>
        </div>
      </div>

      <!--ARTICLE II.........................................................................................................................;;-->

      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <div class="h2" id="Hook">
              <h2>Hook</h2>
              <hr>
            </div>
          </div>
        </div>

      </div>

      <div class="container-fluid card mb-5 w-75 d-flex flex-column justify-content-center align-items-center">
        <img src="img/h8.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title1">Yarn closeout</h5>
        </div>

        <div class="row row__">
          <?php foreach($items2 as $item):?>

          <div class="col">
            <div class="card mb-5" style="width: 25rem;">
              <img src="img/<?= $item['image'];?>" class="card-img-top _card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?= $item['name'];?></h5>
                <p class="card-text"><strong><?= $item['price'];?></strong> DH</p>
                <button type="button" class="btn btn-outline-info">Add to shopping bag</button>
              </div>
            </div>
          </div>

          <?php endforeach;?>
        </div>
      </div>

      <!--ARTICLE III.......................................................................................................................-->

      <div class="container-fluid">
        <div class="h2" id="Knitting">
          <h2>knitting</h2>
          <hr>
        </div>
      </div>

      <div class="container-fluid card mb-5 w-75 d-flex flex-column justify-content-center align-items-center">
        <img src="img/p3.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title1">Knitting needles</h5>
        </div>

        <div class="row row__">
          <?php foreach($items3 as $item):?>

          <div class="col">
            <div class="card mb-5" style="width: 25rem;">
              <img src="img/<?= $item['image'];?>" class="card-img-top _card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?= $item['name'];?></h5>
                <p class="card-text"><strong><?= $item['price'];?></strong> DH</p>
                <button type="button" class="btn btn-outline-info">Add to shopping bag</button>
              </div>
            </div>
          </div>

          <?php endforeach;?>
        </div>
      </div>
    </div>
  </div>



  <!-- Function used to shrink nav bar removing paddings and adding black background -->

  <script>
    // Sticky Header
    $(window).scroll(function () {

      if ($(window).scrollTop() > 100) {
        $('.main_h').addClass('sticky');
      } else {
        $('.main_h').removeClass('sticky');
      }
    });

    // Mobile Navigation
    $('.mobile-toggle').click(function () {
      if ($('.main_h').hasClass('open-nav')) {
        $('.main_h').removeClass('open-nav');
      } else {
        $('.main_h').addClass('open-nav');
      }
    });

    $('.main_h li a').click(function () {
      if ($('.main_h').hasClass('open-nav')) {
        $('.navigation').removeClass('open-nav');
        $('.main_h').removeClass('open-nav');
      }
    });

    // navigation scroll lijepo radi materem
    $('nav a').click(function (event) {
      var id = $(this).attr("href");
      var offset = 70;
      var target = $(id).offset().top - offset;
      $('html, body').animate({
        scrollTop: target
      }, 500);
      event.preventDefault();
    });
  </script>
  <script src="file.js"></script>

</html>