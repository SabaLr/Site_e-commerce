<?php 
include 'db.php';
require 'session.php';
Session::start();
$select = $db->query("SELECT allitems_id, name, description, price, categorie, image FROM all_items");
$items = $select->fetchAll();
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="icon" href="img/logo.png">
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset="utf-8">
  <title>Update</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  
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

  <div class="nav">
    <div class="container">
      <div class="logo">
        <a class="navbar-brand" href="#"><img src="../img/logo.png" width="30px"><span class="nav-section-title">COCO
            YARN</span></a>
        <a href="logout.php"><span class="logout"><i class="fas fa-power-off"></i> Logout</span></a>
      </div>
    </div>
  </div>

  <div class="sidebar">
    <div class="container all-items">
      <h2>Update</h2>
    </div>
    <a href="dashboard.php"><i class="fa fa-fw fa-th-list"></i> All items</a>
    <a href="add.php"><i class="fa fa-fw fa-plus"></i> Add </a>
    <a href="delete.php"><i class="fa fa-fw fa-trash"></i> Delete </a>
    <a href="update.php"><i class="fa fa-fw fa-pen"></i> Update </a>
  </div>

  <div class="d-flex justify-content-center align-items-center">
    <table class="table w-75">
      <thead class="thead-light">
        <tr>
          <th scope="col">Number of item</th>
          <th scope="col">Name of item</th>
          <th scope="col">Description</th>
          <th scope="col">Price (DH)</th>
          <th scope="col">Catégorie</th>
          <th scope="col" style="text-align: center;">Image</th>
          <th scope="col">Update</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($items as $item):?>
        <tr>
          <td><?= $item['allitems_id'];?></td>
          <td><?= $item['name'];?></td>
          <td><span><?= $item['description'];?></span></td>
          <td><?= $item['price'];?> DH</td>
          <td><?= $item['categorie'];?></td>
          <td class="d-flex justify-content-center mt-2"><img class="imgstyle" src="../img/<?= $item['image'];?>"
              alt=""> </td>
          <td><a href="edit_item.php?id_item=<?=$item['allitems_id']; ?>"><i class="fa fa-fw fa-pen"></i></a></td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>

</body>

</html>