<?php 
require("mysqli_connect.php");
?>

<html>
    <head>
        <title>Book Store</title>
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
    <h1 class="ui header">Product List</h1>
    <p>Below you will find a list of products currently for sale</p>

    <?php 
    $query = "SELECT * FROM bookinventory";

$result = mysqli_query($dbc, $query);

// if(!$result) {
//     echo "Error: " . mysqli_error($dbc);
// }

// while($row = mysqli_fetch_array($result)) {
//     echo "<p>{$row['book_name']}, {$row['book_price']}</p><p>{$row['book_quantity']}</p>";
    
// }

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
        ?>
        <div class="ui link cards">
            <div class="card">
                <div class="image">
                <img src="images/<?php echo $row['book_image'] ?>.jpg" alt="">
                </div>
                <div class="content">
                    <div class="header"><?php echo $row["book_name"] ?></div>
                    <div class="description">Book Price - $
                        <?php echo $row['book_price'] ?>
                    </div>
                </div>
                <div class="extra content">
                    <span class="right floated">
                    <a href="checkout.php?idBookInventory=<?php echo $row["idBookInventory"] ?>">
                    <button class="ui purple basic button">Add to Cart</button>
                    </a>
                    </span>
                    <span>
                    Quantity: <?php echo $row["book_quantity"] ?>
                    </span>
                </div>  

            </div>
        </div>
        <?php 
    }
}
?>

    </div>
    <br>
    <br>
    <br>
    <footer
    <footer class="ui inverted vertical segment">
        <center>Copyright © BookStore 2021</center>
      </footer>
    </body>
</html>
