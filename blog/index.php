<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- icon -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="index.css">
</head>

<body class="container">
    <div>
        <div id="navbar">
            <div class="header1">
                <span id="header"><span id="cap">J</span>osh</span>
            </div>
            <div id="options">
                <ul id="list">
                    <li class="pages"><a class="menus" href="index.html">Home</a></li>
                    <li class="pages"><a class="menus" href="#about">About</a></li>
                    <li class="pages"><a class="menus" href="blog.php">Blog</a></li>
                    <span>
                        <li class="pages"><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#loginModal">Login</button></li>
                        <li class="pages"><button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#signupModal">Sign Up</button></li>
                    </span>

                </ul>
                <span id="icon">
                    <a type="button" id="menu"><i class="fa fa-bars" style="font-size: 25px;"></i></a>
                </span>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Login Form Goes Here -->
                    <form action="login.php" method="post">
                        <div class="mb-3">
                            <label for="Email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="loginEmail"
                                placeholder="Enter email">
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="loginPassword"
                                placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Sign Up Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Sign Up Form Goes Here -->
                    <form action="register.php" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name">
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="int" class="form-control" name="mobile" placeholder="Mobile">
                        </div>
                        <div class="mb-3">
                            <label for="Email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email">
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>

                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12 text-center bg-dark text-white mt-4 content">
        <h1 id="contentname">Hello World!</h1>
        <p style="font-weight: bolder;">BY <span><?php echo "$username"; ?>
            </span> &vert; SEP 04,2023 &vert; <span>UNCATEGORIZED</span> &vert;
            <span>0 COMMENTS </span>
        </p>
    </div>
    <div style="display: flex;margin-top: 20px;" id="con1" >
        <div  class="col-sm-12" style="width: 70%;background-color: rgb(255, 255, 255);height: 100%;margin-right:10px;padding:20px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta iure dolor libero ipsa fugit placeat
                quaerat voluptatibus! Numquam, sit, corrupti ut veritatis suscipit sed, quam consectetur eos velit
                nostrum non.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut consequuntur suscipit at iste nulla debitis
                quasi iusto quam quibusdam! Asperiores, saepe veritatis ex commodi delectus molestias laborum! Illo, hic
                vitae.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur iure quia fuga accusantium
                laboriosam veritatis minima repellendus tempore necessitatibus dolorem, dolor repellat optio dolore, non
                nobis natus cum illo aut!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur iure quia fuga accusantium
                laboriosam veritatis minima repellendus tempore necessitatibus dolorem, dolor repellat optio dolore, non
                nobis natus cum illo aut!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur iure quia fuga accusantium
                laboriosam veritatis minima repellendus tempore necessitatibus dolorem, dolor repellat optio dolore, non
                nobis natus cum illo aut!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur iure quia fuga accusantium
                laboriosam veritatis minima repellendus tempore necessitatibus dolorem, dolor repellat optio dolore, non
                nobis natus cum illo aut!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur iure quia fuga accusantium
                laboriosam veritatis minima repellendus tempore necessitatibus dolorem, dolor repellat optio dolore, non
                nobis natus cum illo aut!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur iure quia fuga accusantium
                laboriosam veritatis minima repellendus tempore necessitatibus dolorem, dolor repellat optio dolore, non
                nobis natus cum illo aut!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur iure quia fuga accusantium
                laboriosam veritatis minima repellendus tempore necessitatibus dolorem, dolor repellat optio dolore, non
                nobis natus cum illo aut!</p>


        </div>
        <div  class="col-sm-12" id="con2" style="width: 30%;background-color:rgb(255, 255, 255);height:fit-content;
         box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 17px; padding-left: 30px;">
            <h4>Recent Posts</h4>
            <div style="float: left;font-size: 14px; font-weight: 600;">
                <p>Gallery Format</p>
                <p> Audio Format</p>
                <p> video Format</p>
                <p> quotes Format</p>
                <p> Link Format</p>
                <p>Image Format</p>
            </div>
        </div>
    </div>
    <div style="height: 100px;">

    </div>
</body>












<script>
let email = document.getElementById("loginEmail");
let pass = document.getElementById("loginPassword");
let submitButton = document.querySelector("#loginModal button[type='submit']");

email.addEventListener("input", validate);
pass.addEventListener("input", validate);

function validate() {
    const em = email.value;
    const pa = pass.value;

    if (em === "" || pa === "") {
        submitButton.disabled = true;
    } else {
        submitButton.disabled = false;
    }
}

// jQuery
$(document).ready(function() {
    $("#menu").click(function() {
        $(".pages").toggle(1000);
        $("#list").toggle(500);
    });
});
</script>
</body>

</html>