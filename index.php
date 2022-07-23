<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
</head>

<body>

<?php

include'lib/db.php';
include'lib/function.php';



$category_list=$db->query("SELECT * FROM category",PDO::FETCH_OBJ)->fetchAll();


?>


    <div class="container">
        <h3 class="text-center">Kategori / Alt Kategori</h3>
        <div class="row">
            <div class="col-md-6 bg-light">
                <h4 class="text-center">Kategoryi Ekleme</h4>
                <hr>
                <form action="lib/category_db.php" method="post">
                    <div class="form-group">
                        <label>Kategori Adı</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Varsa Üst Kategori İsmi</label>
                        <select name="parent_id" class="form-control">
                            <option selected value="0">Yok</option>
                          <?php foreach($category_list as $category) {?>
<option value="<?php echo $category->id;?>"><?php echo $category->title;?><option>

                            <?php } ?>

                            </select>
                    </div>
                 <button type="submit" class="btn btn-success">Kaydet</button>
                 
                </form>
            </div>
            <div class="col-md-6 well bg-blue">
                <div class="col-md-11 bg-light">
                <h4 class="text-center">Kategori Sınıfı</h4>
                <hr>
               <?php drawElements(buildTree($category_list)); ?>
            </div>
            </div>
        </div>
   
</body>

</html>