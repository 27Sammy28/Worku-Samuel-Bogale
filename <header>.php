<header>
</header>

<footer>
  <!-- Your footer content goes here -->
</footer>

CREATE TABLE users(
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL
);

<?php
$host = 'localhost'; // MySQL host
$username = 'your_username'; // MySQL username
$password = 'your_password'; // MySQL password
$database = 'your_database'; // MySQL database name

// Create a connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>

<?php
require_once('config.php'); // Include the database connection

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Insert user into the database
  $sql = "INSERT INTO users (name, username, password) VALUES ('$name', '$username', '$password')";
  if (mysqli_query($conn, $sql)) {
    echo "User registered successfully!";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>

<html>
<head>
  <title>Sign up</title>
</head>
<body>
  <?php include('header.php'); ?>

  <h2>Sign up</h2>
  <p>Please fill in this form to create an account.</p>
            <hr>
             
            <label for="Firstname"><b>Firstname  </b></label>
            <input type="text" placeholder="Enter Firstname" name="Firstname" required>
            
            <br>
            <label for="Lastname"><b>Lastname  </b></label>
            <input type="text" placeholder="Enter Lastname" name="Lastname" required>
            
            <br>
   
             

            <label for="Username"><b>Username  </b></label>
            <input type="text" placeholder="Enter Username" name="Username" required>
            
            <br>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
      
            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
            
            <label>
              <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      
      
            </label>
           
            <br>

            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <link
              rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
            />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
            <input id="phone" type="tel" name="phone"  required>
            <br> 
          
            </head>
          <body>
           
             <br>
        


            <p>By creating an account you agree to our <a href="#" style="color:rgb(255, 38, 30)">Terms & Privacy</a>.</p>
      
            <div class="clearfix">
              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
              <button type="submit" class="signupbtn">Sign Up</button>
          
           
    <input type="submit" value="Sign up">
  </form>

  <?php include('footer.php'); ?>
</body>
</html>


<?php
require_once('config.php'); // Include the database connection

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Check if user exists in the database
  $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);
  
  if ($count == 1) {
    // Start a session to maintain login status
    session_start();
    $_SESSION['email'] = $email;
    header("Location: menu.php");
    exit();
  } else {
    echo "Invalid login credentials!";
  }
}
?>

<html>
<head>
  <title>Login</title>
</head>
<body>
  <?php include('header.php'); ?>

  <h2>Login</h2>
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>

  <?php include('footer.php'); ?>
</body>
</html>


<?php
session_start();

// Check if the user is authenticated
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}
?>

<html>
<head>
  <title>Menu</title>
</head>
<body>
  <?php include('header.php'); ?>

  <!-- Your menu content goes here -->

  <?php include('header.php'); ?>
  <h2>Menu</h2>

  <input type="radio" name="pizza" value="Pizza" data-price="100">  Ham pizza <br>
                    <img src="Ham.jpeg" alt="Pizza">
                    <button onclick="addToCart('Ham',100)">Add to Cart</button>
  
                    <input type="radio" name="pizza" value="pizza " data-price="150"> Margerita pizza <br><br>
                    <img src="Margherita.jpeg" alt="Pizza">
                    <button onclick="addToCart('Margherita',150)">Add to Cart</button>
  
                    <input type="radio" name="pizza" value="pizza" data-price="200"> Tuna pizza ($200)<br><br>
                    <img src="Tuna pizza.jpeg" alt="Pizza">
                    <button onclick="addToCart('Tuna',200)">Add to Cart</button>
  
                    <input type="radio" name="pizza" value="pizza" data-price="300"> Special pizza ($300)<br><br>
                    <img src="Special.jpeg" alt="Pizza">
                    
                    <button onclick="addToCart('Special',300)">Add to Cart</button>
  


                         </div>
              
              
              
              
              
                <div class="item">
                    <h2> <Menu> Burger </Menu> </h2>
                 
                    <input type="radio" name="burger" value="Burger" data-price="90">  Hamburger<br>
                    <img src="Ham1.jpeg" alt="burger">
                    <button onclick="addToCart('Hamburger',90)">Add to Cart</button>
               
                    <input type="radio" name="burger" value="Burger" data-price="150"> Cheese burger<br><br>
                    <img src="cheeseburger.jpeg" alt="burger">
                  4      <button onclick="addToCart('Cheese burger ',150)">Add to Cart</button>
               
                    <input type="radio" name="burger" value="Burger" data-price="190"> Double burger <br><br>
                    <img src="double.jpeg" alt="burger">
                    <button onclick="addToCart('Double ',190)">Add to Cart</button>
               
                  
                    <input type="radio" name="burger" value="Burger" data-price="200"> Special burger <br><br>
                    <img src="Special_1.jpeg" alt="burger">
                    <button onclick="addToCart('Special_1 ',200)">Add to Cart</button>
               
                     <input type="radio" name="burger" value="Burger" data-price="190"> Sandwitch<br> <br>
                     <img src="Sandwitch.jpeg" alt="burger">
                     <button onclick="addToCart('Sandwitch ',125)">Add to Cart</button>
               
                  </div>
                <div class="item">
                    <h2> <Menu> Ethiopian Traditional Foods </Menu> </h2>
                   
                    <input type="radio" name="additionalFood" value="additionalFood" data-price="300"> Kitfo <br><br>
                    <img src="Tradditonal.jpeg" alt="additionalFood">
                    <button onclick="addToCart('Kitfo ',300)">Add to Cart</button>
               
                    <input type="radio" name="additionalFood" value="additionalFood" data-price="250"> Tibs<br><br>
                    <img src="Tibs.jpeg" alt="additionalFood">
                    <button onclick="addToCart('Tibs',250)">Add to Cart</button>
                    <input type="radio" name="additionalFood" value="additionalFood" data-price="260"> Tere siga <br><br>
                    <img src="Tere siga.jpeg" alt="additionalFood">
                    <button onclick="addToCart('Tere siga',260)">Add to Cart</button>
                    <input type="radio" name="additionalFood" value="additionalFood" data-price="190"> Doro<br><br>
                    <img src="Doro.jpeg" alt="additionalFood">
                    <button onclick="addToCart('Doro',190)">Add to Cart</button>
                   
       
                </div>

            
        </div>
        

                           
        <div class="item">
            <h2> <Menu> Drinks </Menu> </h2>

       
            <input type="radio" name="Drinks" value="Soda" data-price="70"> Soda <br><br>
            <img src="Soda.jpeg" alt="Drinks">
            <button onclick="addToCart('Soda',70)">Add to Cart</button>
            <input type="radio" name="Drinks" value="beer" data-price="50"> beer <br><br>
            <img src="beer.jpeg" alt="Drinks">
            <button onclick="addToCart('Beer',50)">Add to Cart</button>
            <input type="radio" name="Drinks" value="smoothies" data-price="85"> smoothies <br> <br>
            <img src="smoothies.jpeg" alt="Drinks">
            <button onclick="addToCart('smoothies',85)">Add to Cart</button>
                       
</div>



<div class="item">
    <h2> <Menu> Other foods </Menu> </h2>


    <input type="radio" name="Other food" value="Buffalo" data-price="250"> Buffalo <br><br>
    <img src="Buffalo.jpeg" alt="Other food">
    <button onclick="addToCart('Buffalo',250)">Add to Cart</button>
    <input type="radio" name="Other food" value="chinese food" data-price="230"> chinese food <br><br>
    <img src="chinese food.jpeg" alt="Other food">
    <button onclick="addToCart('chinese food',230)">Add to Cart</button>
    <input type="radio" name="Other food" value="Chicken" data-price="185"> Chicken<br> <br>
    <img src="Chicken.jpeg" alt="Drinks">
    <button onclick="addToCart('Chicken',185)">Add to Cart</button>
</div>

<div> 


    <h2> Dessert food </h2>
<input type="radio" name="Dessert food" value="Pancake" data-price="150"> Pancake <br><br>
 <img src="Pancake.jpeg" alt="Dessert food">
<button onclick="addToCart('Pancake',150)">Add to Cart</button>
<input type="radio" name="Dessert food" value="Ice cream" data-price="185"> Ice cream<br> <br>
 <img src="Ice cream.jpeg" alt="Drinks">
<button onclick="addToCart('Ice cream',185)">Add to Cart</button>

</div>
    </div>


    <?php include('footer.php'); ?>

    <h1>Payment </h1>

  <form>
    <label for="cardNumber">Card Number:</label>
    <input type="text" id="cardNumber" name="cardNumber" required><br>

    <label for="expiryDate">Expiry Date:</label>
    <input type="text" id="expiryDate" name="expiryDate" required><br>

    <label for="cvv">CVV:</label>
    <input type="text" id="cvv" name="cvv" required><br>

    <label for="name">Name on Card:</label>
    <input type="text" id="name" name="name" required><br>

    <input type="submit" value="Make Payment">
  </form>

  <h2>Delivery Method</h2>

  <select id="deliveryMethod" name="deliveryMethod" onchange="showMap()">
    <option value="">Select an option</option>
    <option value="pickup">Pickup</option>
    <option value="delivery">Delivery</option>
  </select>

  <?php include('header.php'); ?>

  <!-- Your menu content goes here -->

  <?php include('header.php'); ?>






</body>
</html>

   


