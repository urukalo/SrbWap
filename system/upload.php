<?php

    $includedir=$pwd."include/";

    include( $includedir."phpbb.php" );
    define ("SID" ,'sid=' . $userdata['session_id']); $atr="&amp;".SID;

//vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
//   You may change maxsize, and allowable upload file types.
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
//Mmaximum file size. You may increase or decrease.
$MAX_SIZE = 1024*300;
                            
//Allowable file Mime Types. Add more mime types if you want
$FILE_MIMES = array('image/jpeg','image/jpg','image/gif' ,'audio/mpeg'
                   ,'image/png','application/msword','audio/midi','audio/x-wav','application/x-zip', 'application/zip', 'text/plain', 'video/3gpp');

//Allowable file ext. names. you may add more extension names.          
$FILE_EXTS  = array('.zip','.jpg','.png','.gif', ',mid', '.amr', '.wav', '.jad', '.jar', '.mp3', '.3gp');

//Allow file delete? no, if only allow upload only
$DELETABLE  = 0;


//vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
//   Do not touch the below if you are not confident.
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
/************************************************************
 *     Setup variables
 ************************************************************/
$site_name = $_SERVER['HTTP_HOST'];
$url_dir = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
$url_this =  "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

$upload_dir = "Upload/";
$upload_url = $url_dir."Upload/";
$message ="";

/************************************************************
 *     Create Upload Directory
 ************************************************************/
function mk_dir($upload_dir){
if (!is_dir($upload_dir)) {
  if (!mkdir($upload_dir))
  	die ("upload_files directory doesn't exist and creation failed");
  if (!chmod($upload_dir,0777))
  	die ("change permission to 755 failed.");
}
}

mk_dir($upload_dir);
/************************************************************
 *     Process User's Request
 ************************************************************/
if ($_REQUEST[del] && $DELETABLE)  {
  $resource = fopen("log.txt","a");
  fwrite($resource,date("Ymd h:i:s")."DELETE - $_SERVER[REMOTE_ADDR]"."$_REQUEST[del]\n");
  fclose($resource);
  
  if (strpos($_REQUEST[del],"/.")>0);                  //possible hacking
  else if (strpos($_REQUEST[del],$upload_dir) === false); //possible hacking
  else if (substr($_REQUEST[del],0,6)==$upload_dir) {
    unlink($_REQUEST[del]);
    print "<script>window.location.href='$url_this?message=deleted successfully'</script>";
  }
}
else if ($_FILES['userfile']) {
  $resource = fopen("log.txt","a");
  fwrite($resource,date("Ymd h:i:s")." UPLOAD - $_SERVER[REMOTE_ADDR][$_SERVER[HTTP_USER_AGENT]] "
            .$_FILES['userfile']['name']." "
            .$_FILES['userfile']['type']."\n");
  fclose($resource);

	$file_type = $_FILES['userfile']['type']; 
  $file_name = $_FILES['userfile']['name'];
  $file_ext = strtolower(substr($file_name,strrpos($file_name,".")));

  //File Size Check
  if ( $_FILES['userfile']['size'] > $MAX_SIZE) 
     $message = "Fajl je veci od ".($MAX_SIZE/1024)."KB, izaberite nesto manje.";
  //File Type/Extension Check
  else if (!in_array($file_type, $FILE_MIMES) 
          && !in_array($file_ext, $FILE_EXTS) )
     $message = "Fajl $file_name($file_type) nema dozvolu za upload, dozvoljen je upload slicica i melodija, ako je ovo jedno od toga, prijavi mi.";
  else {

 $file_ext2 = str_replace(".","",$file_ext);
 $file_ext2 = str_replace("jad","jar",$file_ext2);

      $upload_dir2=$upload_dir.$file_ext2."/";
      mk_dir($upload_dir2);
     $message = do_upload($upload_dir2, $upload_url);
  }
  print "<script>window.location.href='$url_this?message=$message'</script>";
}
else if (!$_FILES['userfile']);
else 
	$message = "Invalid File Specified.";

/************************************************************
 *     List Files
 ************************************************************/
$handle=opendir($upload_dir);
$filelist = "";
while ($file = readdir($handle)) {
   if(!is_dir($file) && !is_link($file)) {
      $filelist .= "<a href='$upload_dir$file'>".$file."</a>";
      if ($DELETABLE)
        $filelist .= " <a href='?del=$upload_dir$file' title='delete'>x</a>";
      $filelist .= "<sub><small><small><font color=grey>  ".date("d-m H:i", filemtime($upload_dir.$file))
                   ."</font></small></small></sub>";
      $filelist .="<br>";
   }
}

function do_upload($upload_dir, $upload_url) {

	$temp_name = $_FILES['userfile']['tmp_name'];
	$file_name = $_FILES['userfile']['name']; 
  $file_name = str_replace("\\","",$file_name);
  $file_name = str_replace("'","",$file_name);
 $file_name = str_replace(" ","_",$file_name);
	$file_path = $upload_dir.$file_name;

	//File Name Check
  if ( $file_name =="") { 
  	$message = "Invalid File Name Specified";
  	return $message;
  }

  $result  =  move_uploaded_file($temp_name, $file_path);
  if (!chmod($file_path,0777))
   	$message = "change permission to 777 failed. $temp_name, $file_path";
  else
    $message = ($result)?"$file_name uploaded successfully." :
     	      "Somthing is wrong with uploading a file.";
  return $message;
}

?>

<center>
   <font color=red><?=$_REQUEST[message]?></font>
   <br>Velicina fajla je ogranicena na 300KB, a tip na slicice i melodije<br>
   <form name="upload" id="upload" ENCTYPE="multipart/form-data" method="post">
     Upload File <input type="file" id="userfile" name="userfile">
     <input type="submit" name="upload" value="Upload">
   </form>
<br/>
<a href="index.wml?put=upload&amp;<? echo SID ?>">Pregledaj fajlove</a>

</center>
 
