<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .container {
            max-width: 400px;
            margin: auto; /* Center horizontally */
            margin-top: auto; /* Center vertically */
            margin-bottom: auto; /* Center vertically */
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px ;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
        .message {
            margin-top: 10px;
            text-align: center;
        }
        .register-link {
            text-align: center;
            margin-top: 20px;
        }
        .header {
            background-color: #8B0000;
            color: black;
            text-align: center;
            padding: 10px 0;
        }
        .sub-header {
            color: yellow;
            margin-top: 5px; 
            margin-bottom: 5px;
        }

        .footer {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .footer a {
            color: #FFFFED;
            text-decoration: none;
            margin: 0 10px;
        }

        .footer-text {
            float: left;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Tech<span style="color: black;">Mak</span></h1>
        <p class="sub-header" style="color: #FFFFED">The Technology Makers</p>
    </div>

    <div class="container">
        <h2>Login</h2>
        <form action="../controller/login_controller.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Login">
        </form>
        <div class="message">
            Don't have an account? <a href="registration.php">Create an account</a>
        </div>
    </div>
    <div class="footer">
        <div class="footer-text">TechMak</div>
        <p>Address: Road-1, House-61, Block-A, Bashundhara R/A</p>
        <p>Contact: 01601899738</p>
        <p>Email: techmak66@gmail.com</p>
        <div>
            <a href="#">EMI Terms</a>
            <a href="#">Privacy Policy</a>
            <a href="#">About Us</a>
            <a href="#">Contact Us</a>
            <a href="#">Online Delivery</a>
        </div>
    </div>
</body>
</html>
