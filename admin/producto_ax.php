<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1); 
include('includes/config.php');
include('includes/simpleimage.class.php');

if($_POST['what'] == 'upload'){

	$oauth_provider = "facebook";
	$oauth_uid = $_POST['meid'];
	//$oauth_uid = '100000900733094';
	$date = date('Y-m-d H:i:s');
	$imagen_full = $oauth_uid . '_' . basename( $_FILES['file_upload']['name']);

	$target_path = "productos/" . $imagen_full;

	if(move_uploaded_file($_FILES['file_upload']['tmp_name'], $target_path)) {

		$con = mysql_connect(BD_HOST, BD_USER, BD_PASSWORD);
		mysql_select_db(BD_NAME);

	//$res = mysql_query("SELECT * FROM alessi_user_picture WHERE oauth_uid = '".$oauth_uid."' AND oauth_provider = 'facebook'");
	//$aff = mysql_affected_rows($con);

	//if($aff != 0){
	//	mysql_query("UPDATE alessi_user_picture SET imagen_full = '$imagen_full', fecha_crea = '$date' WHERE oauth_uid = ".$oauth_uid." AND oauth_provider = 'facebook'");
	//}else{
		//Resize a 500x300px
			$image = new SimpleImage();
			$image->load($target_path);
			$image->resize(500,300);
			$image->save($target_path);
	
			mysql_query("INSERT INTO alessi_user_picture (oauth_uid, oauth_provider, imagen_full, fecha_crea) VALUES ('".$oauth_uid."','facebook','$imagen_full','$date')");	
			$insertedID = mysql_insert_id($con);
	//}
		mysql_close($con);
	
		echo "<script type='text/javascript'>top.location.href = '".FACEBOOK_CANVAS_URL."?p=confirmaparticipa&id=".$insertedID."';</script>";
	
	} else {
		switch ($_FILES['file_upload']['error'])
		{  
			case 1:
				print '<p> The file is bigger than this PHP installation allows</p>';
				break;
			case 2:
				print '<p> The file is bigger than this form allows</p>';
				break;
			case 3:
				print '<p> Only part of the file was uploaded</p>';
				break;
			case 4:
				print '<p> No file was uploaded</p>';
				break;
	 	}
	}
}
?>