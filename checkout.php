<?php 
    session_start();

    if($_GET["idBookInventory"] !== NULL) {
        $_SESSION['idBookInventory'] = $_GET["idBookInventory"];
    }

    else {
        header('Location:store.php');
    }

    require('mysqli_connect.php');
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
    <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/form.min.js" integrity="sha512-VM6WNFlVLFwKXphssthAXJpG3cKWUK3G4edfsydLITA4iSeZmvJ+2gKBrR6qYkt/3A/I8hDHnAuIBz7xtfVtOg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous"></script>
    <script>
    $('.ui.form')
  .form({
    fields: {
      first_name: {
        identifier: 'first_name',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter your first name'
          }
        ]
      },
      last_name: {
        identifier: 'last_name',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter your last name'
          }
        ]
      },
      address: {
        identifier: 'address',
        rules: [
          {
            type   : 'minCount[5]',
            prompt : 'Please enter a valid street name'
          }
        ]
      },
      address2: {
        identifier: 'address2',
        rules: [
          {
            type   : 'minCount[1]',
            prompt : 'Please enter a valid apt number'
          }
        ]
      },
      card_number: {
        identifier: 'card_number',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter card_number'
          }
        ]
      },
      cvv: {
        identifier: 'cvv',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter cvv'
          },
          {
            type   : 'minLength[3]',
            prompt : 'Cvv should be three digits'
          }
        ]
      },
      card_expiry_month: {
        identifier: 'card_expiry_month',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter expiry month'
          },
        ]
      },
      card_expiry_year: {
        identifier: 'card_expiry_year',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter expiry year'
          },
          {
            type   : 'minLength[4]',
            prompt : 'Your expiry year must be at least four digits'
          }
        ]
      }
    }
  })
;
</script>
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
    <h1 class="ui header">Checkout Cart</h1>
    <form class="ui form">
  <h4 class="ui dividing header">Shipping Information</h4>
  <div class="field">
    <label>Name</label>
    <div class="two fields">
      <div class="field">
        <input type="text" name="first_name" placeholder="First Name">
      </div>
      <div class="field">
        <input type="text" name="last_name" placeholder="Last Name">
      </div>
    </div>
  </div>
  <div class="field">
    <label>Billing Address</label>
    <div class="fields">
      <div class="twelve wide field">
        <input type="text" name="address" placeholder="Street Address">
      </div>
      <div class="four wide field">
        <input type="text" name="address2" placeholder="Apt #">
      </div>
    </div>
  </div>
  <h4 class="ui dividing header">Billing Information</h4>
  
  <div class="fields">
    <div class="seven wide field">
      <label>Card Number</label>
      <input type="text" name="card_number" maxlength="16" placeholder="Card #">
    </div>
    <div class="three wide field">
      <label>CVC</label>
      <input type="text" name="card_cvc" maxlength="3" placeholder="CVC">
    </div>
    <div class="six wide field">
      <label>Expiration</label>
      <div class="two fields">
        <div class="field">
          <select class="ui fluid search dropdown" name="card_expiry_month">
            <option value="">Month</option>
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
          </select>
        </div>
        <div class="field">
          <input type="text" name="card_expiry_year" maxlength="4" placeholder="Year">
        </div>
      </div>
    </div>
  </div>
  
  <a href="success.php"><div class="ui primary submit button">Checkout</div></a>
  <div class="ui error message"></div>
</form>
    </div>
    <br>
    <br>
    <br>
    <footer class="ui inverted vertical segment">
        <center>Copyright © BookStore 2021</center>
      </footer>
</body>

</html>