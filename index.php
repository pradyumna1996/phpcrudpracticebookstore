<?php
require_once("../crudphp/php/component.php");
require_once ("../crudphp/php/operations.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--Custom Style Sheet -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<main>
  <div class="container text-center">
  	<h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> Book Store</h1>

<div class="d-flex justify-content-center">
	<form action="" method="post" class="w-50">
		<div class="pt-2">
            <?php inputElement("<i class='fas fa-id-badge'></i>","Book ID","book_id",setBookId());  ?>
        </div>

<div class="pt-2">
	<?php inputElement("<i class='fas fa-book'></i>","Book Name","book_name","");  ?>
		</div>
        <div class="pt-2">
            <?php inputElement("<i class=\"fas fa-chalkboard-teacher\"></i>","Author","book_author","");  ?>
        </div>
        <div class="pt-2">
            <?php inputElement("<i class=\"fas fa-book-reader\"></i>","Given To","book_given_to","");  ?>
        </div>
     <div class="row pt-2">
         <div class="col">
             <?php inputElement("<i class='fas fa-people-carry'></i>","Publisher","book_publisher","");  ?>
         </div>
         <div class="col">
             <?php inputElement("<i class='fas fa-dollar-sign'></i>","Price","book_price","");  ?>
         </div>
     </div>
      <div class="d-flex justify-content-center">
          <?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i>","create","dat-toggle='tooltip' data-placement='bottom' title='Create' ");  ?>
          <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-sync'></i>","read","dat-toggle='tooltip' data-placement='bottom' title='Read' ");  ?>
          <?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i>","update","dat-toggle='tooltip' data-placement='bottom' title='Update' ");  ?>
          <?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i>","delete","dat-toggle='tooltip' data-placement='bottom' title='Delete' ");  ?>
            <?php deleteBtn();?>
      </div>

</form>
</div>
    <!-- Bootstrap Table-->
      <div class="d-flex table-data">
          <table class="table table-striped table-dark">
            <thead class="thead-dark">
            <th>Book ID</th>
            <th>Book Name</th>
            <th>Book Author</th>
            <th>Book Given To</th>
            <th>Book Publisher</th>
            <th>Book Price</th>
            <th>Edit Details</th>
            </thead>
          <tbody id="tbody">
                <?php
                //Get Data
                if (isset($_POST['read'])){
                    $result=getBook();
                   if($result){

                       while($row=mysqli_fetch_assoc($result)){ ?>
                            <tr>
                                <td data-id="<?php echo $row['book_id']; ?>"><?php echo $row['book_id'];?></td>
                                <td data-id="<?php echo $row['book_id'] ; ?>"><?php echo $row['book_name'];?></td>
                                <td data-id="<?php echo $row['book_id']  ;?>"><?php echo $row['book_author'];?></td>
                                <td data-id="<?php echo $row['book_id']  ;?>"><?php echo $row['book_given_to'];?></td>
                                <td data-id="<?php echo $row['book_id'] ; ?>"><?php echo $row['book_publisher'];?></td>
                                <td data-id="<?php echo $row['book_id'];  ?>"><?php echo $row['book_price'];?></td>
                                <td ><i class="fas fa-edit btnedit" data-id="<?php echo $row['book_id'];?>"></i></td>

                            </tr>

                           <?php
                       }
                   }

                }
                ?>


          </tbody>
          </table>
      </div>
  </div>
</main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/58f5ad2784.js" crossorigin="anonymous"></script>
<script src="php/main.js"></script>
</body>
</html>
