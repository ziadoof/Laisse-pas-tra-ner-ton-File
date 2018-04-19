


     function checkSizeFile($file):bool
        {
        if ($file<=1024000){
            return true;
            }
        else {
            return false;
             }
        }

     function checkTypeFile(string $file):bool

     {
         $extensions = array('/png', '/gif', '/jpg', '/jpeg');
         $extension = strrchr($file,'/');
         if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
         {
             return false;
         }
         else
             return true;
     }

function checkSizeTypeFile($fileSize,$fileType):string
    {

        while ($fileSize && !$fileType){
            return "your file type is not JPG or PNG or GIF";
            break;
        }
        while (!$fileSize && $fileType){
            return "has not uploaded because it is larger than 1MB";
            break;
        }
        while (!$fileSize && !$fileType){
            return "has not uploaded because it is Not picture AND larger than 1MB";
            break;
        }
        while ($fileSize && $fileType){
            return "your file is uploaded";
            break;
        }
    }
    function deleteFile ($id){

        if (file_exists ( $id)){
            unlink ($id);
        }
        header("Location:index.php");
    }


