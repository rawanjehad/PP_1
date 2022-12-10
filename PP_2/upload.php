<?php 
include('connect.php');
$error=['iderror'=>'',
'fileerror'=>''];
if(isset($_POST['upload'])){
$id=$_POST[' key'];
 $filename=$_FILES['file']["name"];
 $filetype=$_FILES['file']["type"];
 $temp=$_FILES['file']["tmp_name"];
 $folder ="imges/".$filename;
$extension = substr($filename,strlen($filename)-4,strlen($filename));
$allowed_extensions = array(".jpg",".jpeg",".png",".gif");
    if(empty( $filename)){
        $error['fileerror']='please enter the  image';
    }
    elseif(!in_array($extension,$allowed_extensions))
    {
        $error['fileerror']= 'Invalid format. Only jpg / jpeg/ png /gif format allowed';
    }
    if(empty($id)){
    $error['iderror']='please enter the id';
    }
    elseif(!filter_var($id,FILTER_VALIDATE_INT)){
        $error['iderror']='please enter the id integer';
    }
else{
   if($id!=""&& $filename!="")
     {
        move_uploaded_file($temp,$folder);
          $query="insert into uploadimage(image,key) values (' $filename',$id)";
          $data=mysqli_query($connection,$query);
       if($data){
        echo "<script>alert('successfully');</script>";
       }
        else
        
        echo "<script>alert(' Error');</script>";  
     }
}
    mysqli_close($connection);
}
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
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
 
<div class="box-3">
    <h3> Welcome To upload page</h3>
<hr>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image" />
    <button type="submit">Upload key</button>
</form>
</div> 
<div  class="form-text error "><?php echo $error['fileerror']?></div>
</div>
<div  class="form-text error form-label"><?php echo $error['iderror'] ?></div>
</div>  

   </main>
</body> 
