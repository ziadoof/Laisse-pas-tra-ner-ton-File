<?php

if (file_exists('uploads/' . $_GET['delete'] ))
{
    unlink('uploads/' . $_GET['delete']);

}
header("Location:../index.php");
echo  'Your file is deleted successfully'."<br>";