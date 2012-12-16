<?
//global $HTTP_POST_VARS;
if ($userfile_size >250000){$msg=$msg."Your uploaded file size is more than 250KB so please reduce the file size and then upload. Visit the help page to know how to reduce the file size.<BR>";
$file_upload="false";}

//Now let us check the file extension and only jpg or gif file pictures we will allow into our server. We will check this by using $userfile_type extension

if (!($userfile_type =="image/pjpeg" OR $userfile_type=="image/gif")){$msg=$msg."Your uploaded file must be of JPG or GIF. Other file types are not allowed<BR>";
$file_upload="false";}

//We will limit ourselves to these two type checks and if we find our $file_upload variable is not "false" then we can upload the file. This part is very simple in PHP and can be done in one step. Before that let us decide the file directory name where we will be placing the file. $add is the path with the file name relative to the script running this code where the uploaded file will be stored.

$add="upload/$userfile_name"; // the path with the file name where the file will be stored, upload is the directory name.

//Now let us copy the file to server. The command move_uploaded_file will does that job for us and if the action is successful then it will return true.

if(move_uploaded_file ($userfile, $add)){
echo "EXITO!";
}else{echo "Failed to upload file Contact Site admin to fix the problem";}
//Thats all... the file is placed in our directory (name: upload) 
?>