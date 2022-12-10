<?php
include"connect.php";
$id=$_POST['iddata'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display image</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!-- <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,200;0,300;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <header>
        <nav>   
            <div class="container">
           <img class="logo" src="imges/logo.png.png" alt=""/>
               
               
               
       <div class="links">
           <ul>
            <li><a href="index.php">Home</a></li>
               <li><a href="upload.php">Upload</a></li>
               <li><a href="Display image.php">Display image</a></li>
               <li><a href="Display Keys.php">Display Keys</a></li>
               <li><a href="Current statistices.php">Current statistices</a></li>
               </ul>
               </div>    
               
       
       </div>
   </nav>

    </header>
    <main>
        <div class="current">
            <h2>Get image</h2>
            <hr>
            <div class="forms">
                <form action="" method="post">
                    <div>
                        <label>Key:</label>
                        <input type="text"  name="name" />
                    </div>
                </form>
                <a class="get" href="#" >Get image </a>
        
        </div>
        
      
        </div>
    </main>
</body>