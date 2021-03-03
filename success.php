<?php 
    session_start();
    require('mysqli_connect.php');

    $product_bought = 'SELECT book_name, book_quantity, book_image, book_price FROM bookinventory WHERE idBookInventory=' . $_SESSION['idBookInventory'];

    $result = $dbc->query($product_bought);

    if($result->num_rows === 1) {
        if($row = $result->fetch_assoc()) {
            $book_name = $row['book_name'];
            $book_image = 'images/' . $row['book_image'] . '.jpg';
            $book_price = $row['book_price'];
            $book_quantity = $row['book_quantity'] - 1;
            $current_id = $_SESSION["idBookInventory"];
        }
    }

    $update_quantity = "UPDATE bookinventory SET book_quantity = '$book_quantity' WHERE idBookInventory = $current_id";
    $result = $dbc->query($update_quantity);
    
?>

<html>
    <head>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
      integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ=="
      crossorigin="anonymous"
    />
    </head>
    <body>
    <div class="ui fixed inverted menu">
        <div class="ui container">
        <a href="#" class="header item">
        Book Store
        </a>
        </div>
    </div><br><br><br>
    <div class="ui main text container">
    <div class="ui icon message">
  <i class="check icon"></i>
  <div class="content">
    <div class="header">
      Congratulations! You have successfully placed your order with us
    </div>
    <p>You will find details pertaining to your order down below</p>
  </div>
</div>

<div class="ui link cards">
            <div class="card">
                <div class="image">
                <img src="images/<?php echo $row['book_image'] ?>.jpg" alt="">
                </div>
                <div class="content">
                    <div class="header"><?php echo $book_name ?></div>
                    <div class="description">Book Price - $
                        <?php echo $book_price ?>
                    </div>
                </div>
            </div>
</div>

    <br>
    <br>
    <a href="index.html"><button class="ui primary basic button">Return back to the store</button></a>
    </div>
    <br>
    <br>
    <footer class="ui inverted vertical segment">
        <center>Copyright © BookStore 2021</center>
      </footer>
</body>
</html>