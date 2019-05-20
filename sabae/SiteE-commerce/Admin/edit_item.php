<?php 
include 'db.php';
require 'session.php';
Session::start();

if($_SERVER['REQUEST_METHOD'] == "POST"){ 

    /** Traitement Table Work */
        try{
            if(isset($_POST['name']) && isset($_POST['image']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['categorie'])){
                $id_item = (int)$_GET['id_item'];
                $name = $db->quote($_POST['name']);
                $image = $_POST['image'];
                $description = $db->quote($_POST['description']);
                $categorie = $db->quote($_POST['categorie']);
                $price = (int)$_POST['price'];
                if(!empty($image)){
                    $query = "update all_items set name=$name,description=$description,price=$price,categorie=$categorie,image='$image' where allitems_id=$id_item";

                }else{
                    $query = "update all_items set name=$name,description=$description,price=$price,categorie=$categorie where allitems_id=$id_item";

                }
                $msg=$query;
                $select = $db->query($query);
                if(!empty($select)){
                    header('Location:update.php');                
                } else {
                    $msg="Error Work";
                }
            }
        }catch(Exception $e){
            $msg ='Exception Work';
        }
        /***************** */

        
       
}else{
    $msg ='Erreur POST';
}
$select = $db->query("SELECT allitems_id, name, description, price, categorie, image FROM all_items where allitems_id =".$_GET['id_item']);
$items = $select->fetchAll();
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="icon" href="../img/logo.png">
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="add.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset="utf-8">
  <title>Edit items</title>
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

  <div class="nav fixed-top">
    <div class="container">
      <div class="logo">
        <a class="navbar-brand" href="#"><img src="../img/logo.png" width="30px"><span class="nav-section-title">COCO
            YARN</span></a>
            <a href="logout.php"><span class="logout"><i class="fas fa-power-off"></i> Logout</span></a>
      </div>
    </div>
  </div>
  <div class="d-flex flex-row justify-content-center align-items-center">
  <div class="sidebar">
  <div class="container add-items" id="add">
    <h2>Edit items</h2>
  </div>
    <a href="dashboard.php"><i class="fa fa-fw fa-th-list"></i> All items</a>
    <a href="add.php"><i class="fa fa-fw fa-plus"></i> Add </a>
    <a href="delete.php"><i class="fa fa-fw fa-trash"></i> Delete </a>
    <a href="update.php"><i class="fa fa-fw fa-pen"></i> Update </a>
  </div>  
  
  <?php foreach($items as $item):?>

  <form action="#" method="POST" class="mt-5">
    <div class="form-col">
      <div class="form-group col-md-6">
        <label class="input" for="inputName">Name</label>
        <input type="text" class="form-control" id="inputEmail4" name="name" value="<?=$item['name']; ?>" placeholder="Name">
      </div>
      <div class="form-group col-md-2">
        <label class="input" for="inputDesc">Description</label>
        <textarea name="description" rows="4" cols="60" placeholder="Description"><?=$item['description']; ?></textarea>
      </div>
      <div class="form-group col-md-6">
        <label class="input" for="inputPrise">Price</label>
        <input type="text" class="form-control" id="inputAddress" value="<?=$item['price']; ?>" name="price" placeholder="DH">
      </div>
      <div class="form-group col-md-4">
        <label class="input" for="inputCatég">Catégorie</label>
        <select id="inputState" name="categorie" class="form-control">
          <option selected><?=$item['categorie']; ?></option>
          <option>Yarn</option>
          <option>Crochet</option>
          <option>Knitting</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <p class="input">Image</p>
        <img id="imageWorks" src="../img/<?=$item['image']; ?>" alt="">
        <input type="file" id="import" name="image" placeholder="Import an image">
      </div>
      <button type="submit" class="btn btn-danger">Edit item</button>
    </div>
  </form>
  </div>
  <?php endforeach;?>


</body>

</html>