<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="css/style1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <div class="container">
    <div class="form-box box">


      <header>Sign Up as a worker </header>
      <hr>

      <form action="#" method="POST">


        <div class="form-box">

          <?php

          session_start();

          include "connection.php";

          if (isset($_POST['register'])) {

            $name = $_POST['worker-username'];
            $contact = $_POST['contact'];
            


            $check = "select * from workers where contact='{$contact}'";

            $res = mysqli_query($conn, $check);

            




            if (mysqli_num_rows($res) > 0) {
              echo "<div class='message'>
        <p>This email is used, Try another One Please!</p>
        </div><br>";

              echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";


            } else {

              if (TRUE) {

                $sql = "INSERT INTO workers(name, contact) VALUES('$name','$contact')";

                $result = mysqli_query($conn, $sql);

                if ($result) {

                  echo "<div class='message'>
      <p>You are register successfully!</p>
      </div><br>";

                  echo "<a href='login.php'><button class='btn'>Login Now</button></a>";

                } else {
                  echo "<div class='message'>
        <p>This email is used, Try another One Please!</p>
        </div><br>";

                  echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
                }

              } else {
                echo "<div class='message'>
      <p>Password does not match.</p>
      </div><br>";

                echo "<a href='signup.php'><button class='btn'>Go Back</button></a>";
              }
            }
          } else {

            ?>

            <div class="input-container">
              <i class="fa fa-user icon"></i>
              <input class="input-field" type="text" placeholder="Username" name="worker-username" required>
            </div>

            <div class="input-container">
              <i class="fa fa-envelope icon"></i>
              <input class="input-field" type="text" placeholder="Contact" name="contact" required>
            </div>

            

          </div>


          <center><input type="submit" name="register" id="submit" value="Signup" class="btn"></center>


          <div class="links">
            Sign-Up as a User? <a href="signup.php">Signup Now</a>
          </div>

        </form>
      </div>
      <?php
          }
          ?>
  </div>

  <script>
    const toggle = document.querySelector(".toggle"),
      input = document.querySelector(".password");
    toggle.addEventListener("click", () => {
      if (input.type === "password") {
        input.type = "text";
        toggle.classList.replace("fa-eye-slash", "fa-eye");
      } else {
        input.type = "password";
      }
    })
  </script>
</body>

</html>