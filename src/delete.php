<?php

if (file_exists('../src/uploads/' . $_GET['delete'] ))
{
    unlink('../src/uploads/' . $_GET['delete']);
}
header("Location:../public/index.php");
