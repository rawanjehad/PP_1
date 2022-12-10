<?php 
include('class.db.php');
$error=['iderror'=>'',
'fileerror'=>''];

if(isset($_POST['do']) && $_POST['do']=='upload_img'){
 $up = uploadImage($_FILES);

    $error = 0;
     if($up == false)
     {
       $error = 1;
	   $data['msg_error']= 'Invalid format. Only jpg / jpeg/ png /gif format allowed';
     }
     else {
       $photo = $up;
     }	
    if($error==0){
		$date=date("Y-m-d H:i:s");
		 $db = new Db();
   $result1 = $db -> query("INSERT INTO `uploadimage_tb` ( `url_img`,`date`)
     VALUES ('$photo','$date')");
	
	  
	 if($result1){
	 $data['msg_succ']="successfully";
	 }else{
		 $data['msg_error']="There is an error, please try again";
	 }
	 

	}
}

 
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
<div class="row ">
<div class="col-md-8 col-sm-12">
<?php
if(isset($data['msg_error'])){ ?>
  <div class="alert alert-danger " role="alert" style="margin-top: 15px;margin-left: 15px;margin-right: 15px;">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>  

          <?php print $data['msg_error'];
           ?>

  </div>
  <?php } ?>
  <?php
if(isset($data['msg_succ'])){ ?>
  <div class="alert alert-success " role="alert" style="margin-top: 15px;margin-left: 15px;margin-right: 15px;">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>

          <?php print $data['msg_succ'];
           ?>

  </div>
  <?php } ?>
  </div>  </div> 
<form action="upload_mayar.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" />
    <button type="submit">Upload key</button>
	<input type="hidden" name="do" value="upload_img" />  
</form>
</div> 
<div  class="form-text error "><?php echo $error['fileerror']?></div>
</div>
<div  class="form-text error form-label"><?php echo $error['iderror'] ?></div>
</div>  

   </main>
</body> 
<?php 
function uploadImage($files) {

  $target_dir = "uploads/";

  $finalFilename = md5(date("Y-m-d H:i:s")) .basename($files["fileToUpload"]["name"]);
  $target_file = $target_dir . $finalFilename;


  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "JPG" && $imageFileType != "PNG"
  && $imageFileType != "gif" ) {
    //  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {

  return false;

  } else {
      if (move_uploaded_file($files["fileToUpload"]["tmp_name"], $target_file)) {
        return 'http://localhost/PP_1/uploads/'.$finalFilename;
      } else {
        return false;
      }
  }





}


?>