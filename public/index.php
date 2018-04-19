<?php

$extensions = array('png', 'gif','jpg','jpeg');
$files = '../src/uploads/';
if (isset($_POST['upload'])) {

    if (count($_FILES['fichier']['name']) > 0) {
        for ($i =0; $i< count($_FILES['fichier']['name']); $i++)
        {
            $extension = pathinfo($_FILES['fichier']['name'][$i], PATHINFO_EXTENSION);
            if(!in_array($extension, $extensions))
            {
                echo 'Your type file number :'.($i+1). ' is not JPEG or PNG or GIF'."<br>";
            } else {
                if(filesize($_FILES['fichier']['tmp_name'][$i])<1024000)
                {

                    if (move_uploaded_file($_FILES['fichier']['tmp_name'][$i], $files . $filename ='image' . uniqid() .'.'. $extension)) {
                        echo  'Your file number :'.($i+1). ' is uploaded successfully'."<br>";
                    } else {
                        echo 'Your files number :'.($i+1). ' has not uploaded'."<br>";
                    }
                }else {
                    echo 'Your file number :'.($i+1).' has not uploaded because it is larger than 1MB'."<br>";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
              crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <title>Upload Photos</title>
    </head>

    <body>


        <div class="container-fluid p-0">
            <div class="container text-center">
                <form method="POST" action="" enctype="multipart/form-data" class="form-group">
                    <h1 class="page-header">Upload  Files</h1>
                    <input type="file" name="fichier[]" class="form-control" multiple="multiple">
                    <input type="submit" name="upload" value="upload" class="btn btn-primary">
                </form>
            </div>
            <div class="row">
                <?php
                    $files = '../src/uploads/';
                    $photos = new FilesystemIterator($files);
                    foreach ($photos as $file){
                        echo
                '<div class="col-sm-6 col-md-2 photo text-center">
                    <div class="thumbnail">
                        <img src="'.$files.$file->getFilename().'" alt="">
                        <div class="caption">
                                 <p>'.$file->getFilename().'</p>
                                 <form action="../src/delete.php" method="get">
                                        <input type="hidden" name="delete" value="'.$file->getFilename();echo'">
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                 </form>
                        </div>          
                     </div>       
                </div>
               ';  } ?>
            </div>
         </div>
    </body>
</html>