<?php
session_start();

include("connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>

    <div class="container">
        <div class="form-box box">

            <?php

            if (isset($_POST['update'])) {
                $current_name = $_POST['current_name'];
                $w_username = $_POST['new_name'];
                $contact = $_POST['contact'];
                

                
                $edit_query = mysqli_query($conn, "UPDATE workers SET name='$w_username', contact='$contact'WHERE name = '$current_name'");

                if ($edit_query) {
                    echo "<div class='message'>
                <p>Profile Updated!</p>
                </div><br>";
                    echo "<a href='home.php'><button class='btn'>Go Home</button></a>";
                }
            } else {

                $id = $_SESSION['id'];
                $query = mysqli_query($conn, "SELECT * FROM workers WHERE id = '$id'") or die("error occurs");

                while ($result = mysqli_fetch_assoc($query)) {
                    $w_res_username = $result['new_name'];
                    $res_contact = $result['email'];
                    $res_id = $result['id'];
                }

                ?>

                <header>Change Profile</header>
                <form action="#" method="POST" enctype="multipart/form-data">

                    <div class="form-box">

                        <div class="input-container">
                            <i class="fa fa-user icon"></i>
                            <input class="input-field" type="text" placeholder="Current Worker Name" name="current_name"
                                required>
                        </div>

                        <div class="input-container">
                            <i class="fa fa-user icon"></i>
                            <input class="input-field" type="text" placeholder="New Worker Name" name="new_name"
                                 required>
                        </div>

                        <div class="input-container">
                            <i class="fa fa-envelope icon"></i>
                            <input class="input-field" type="text" placeholder="New Contact" name="contact"
                                 required>
                        </div>

                    </div>


                    <div class="field">
                        <input type="submit" name="update" id="submit" value="Update" class="btn">
                    </div>


                </form>
            </div>
        <?php } ?>
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