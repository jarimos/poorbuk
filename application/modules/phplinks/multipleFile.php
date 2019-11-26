<?php
//echo "lort1";
	include ("../phpgeneral/headercheck.php");	
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpgeneral/functionsJarim.php');
		
	require_once(POORBUK_PATH_ABSOLUTE_MODULES.'/phpclasses/FileUploadClass.php');
	startConnectionDB();

	
	//if (!(isset( $_POST['userfolderfile'] )) || $_POST['userfolderfile']==""){exit;}	
	//if (!(isset( $_FILES['myFileTutorials'] )) || $_FILES['myFileTutorials']==""){exit;}	
	
	$file=$_FILES['myFileTutorials'];
	$userFolder = $_POST['userfolderfile'];	
	$tutorialsfolder = $_POST['tutorialsfolder'];		
	if(!( sanityCheckScapeByReference($userFolder, 'string', 100)  ))
	{
		//echo 'Username is not set';
		exit();
	}
//echo "lort3";	
//for($i=0; $i<count($_FILES['upload']['name']); $i++) 
//{


	//INITIALIZE CLASSES
	$FileUploadClass = new FileUploadClass;
	$LinksClass = new LinksClass;

if ($_FILES['upload']) {
    $file_ary = $FileUploadClass->multipleFilesToOneFile($_FILES['upload']);

    foreach ($file_ary as $file) {
        print "<br>".'File Name: ' . $file['name']."<br>";
        print 'File Type: ' . $file['type']."<br>";
        print 'File Size: ' . $file['size']."<br>";
		print 'tmp_name: ' . $file['tmp_name']."<br>"."<br>";

	//$NewFileUploaded = $FileUploadClass->UploadFile($userFolder,$file);
	list ($newPhysicalPathFile,$fileNameOriginal,$linksFolder,$linksUID) = $FileUploadClass->UploadFile($userFolder,$file,$tutorialsfolder);
	$LinksClass->linksInsert($newPhysicalPathFile,$fileNameOriginal,$linksFolder,$linksUID);

    }
}






 
//}
	//$userFolder="1";
	//echo 'userid = '.$userid;

	//echo '<br>$NewFileUploaded = '.$NewFileUploaded.'<br>';
	//echo '<br>$myfilenameX = '.$myfilenameX.'<br>';
	//echo '<br>lortttttttttttttttt';
	//$NewFileUploaded = "lorttttttttttttttttt";
	//$myfilenameX = "lorttttttttttttttttt";

?>
	<script language="javascript" type="text/javascript">window.top.doneloadingTutorials('<?php echo $pathFileUploaded; ?>','<?php echo $myfilenameX; ?>');</script>  
	
	
	
	