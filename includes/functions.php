<?php
function encrypt_url($string) {
        $key = "1j2h3g1kj23hg1k2jh3g1k"; //preset key to use on all encrypt and decrypts.
        $result = '';
   for($i=0; $i<strlen($string); $i++) {
     $char = substr($string, $i, 1);
     $keychar = substr($key, ($i % strlen($key))-1, 1);
     $char = chr(ord($char)+ord($keychar));
     $result.=$char;
   }
   return urlencode(base64_encode($result));
}

function decrypt_url($string) {
        $key = "1j2h3g1kj23hg1k2jh3g1k";
        $result = '';
        $string = base64_decode(urldecode($string));
   for($i=0; $i<strlen($string); $i++) {
     $char = substr($string, $i, 1);
     $keychar = substr($key, ($i % strlen($key))-1, 1);
     $char = chr(ord($char)-ord($keychar));
     $result.=$char;
   }
   return $result;
}

function truncate($string, $max = 20, $rep = '') 
{ 
    if (strlen($string) <= ($max + strlen($rep))) 
    { 
        return $string; 
    } 
    $leave = $max - strlen ($rep); 
    return substr_replace($string, $rep, $leave); 
} 

function tree_set($index,$op)
{
	
    //global $menu; Remove this.
	$tscon = mysql_connect(BD_HOST,BD_USER,BD_PASSWORD);
	mysql_select_db(BD_NAME,$tscon);

    $q = mysql_query("select * from categorias where padre ='$index'");
    $t = mysql_num_rows($q);
    if(mysql_num_rows($q) === 0)
    {
       return;
    }

    // User $tree instead of the $menu global as this way there shouldn't be any data duplication
    //$tree = $index > 0 ? '<ul>' : ''; // If we are on index 0 then we don't need the enclosing ul
	$tree = '<ul>';
	
	if(isset($op['inicio'])){

		if(!isset($op['iniciolink'])){ $op['iniciolink'] = '#'; }
		if(!isset($op['iniciotext'])){ $op['iniciotext'] = 'Inicio'; }
		
		$tree .= '<li><a href="'.$op['iniciolink'].'">'.$op['iniciotext'].'</a></li>';
	}
	
	if($t > 0){
    while($arr = mysql_fetch_assoc($q))
    {
    	$tscon2 = mysql_connect(BD_HOST,BD_USER,BD_PASSWORD);
		mysql_select_db(BD_NAME,$tscon2);
		
 		$subFileCount = mysql_query("select * from categorias where padre ='{$arr['id']}'");
        if(mysql_num_rows($subFileCount) > 0)
        {
            $class = 'folder';
        }
        else
        {
            $class = 'file';
        }

        $tree .= '<li>';
        $tree .= '<a href="?p=relojeria&cat='.$op['cat'].'&scat='.$arr['id'].'"><span class="'.$class.'">'.$arr['nombre'].'</span></a>';
        $tree .=tree_set("".$arr['id']."",array());
        $tree .= '</li>'."\n";
    }
	//mysql_close($tscon2);
    }
    //$tree .= $index > 0 ? '</ul>' : ''; // If we are on index 0 then we don't need the enclosing ul
	$tree .= '</ul>';
	
	//mysql_close($tscon);
	
    return $tree;
}

function getTotalPaginas($id,$t)
{
	$categorias = getSubCategorias($id);
	$gtpcon = mysql_connect(BD_HOST,BD_USER,BD_PASSWORD);
	mysql_select_db(BD_NAME,$gtpcon);
	if($t == 0)
	{
		$gtpqry = "select count(*) as total from productos where categoria in (".$categorias.")";
	}
	if($t == 1){
		$gtpqry = "select count(*) as total from productos where categoria = '$id'";
	}

    $gtpq = mysql_query($gtpqry);
    $tot = 0;
    $t = mysql_affected_rows($gtpcon);
    
    if($t > 0){
    	while($gtpr = mysql_fetch_assoc($gtpq)){
    		$tot = $gtpr['total'];
    	}
    }
	mysql_close($gtpcon);
    return $tot;
}

function buildTree($pid) {
 
    $btcon = mysql_connect(BD_HOST,BD_USER,BD_PASSWORD);
	mysql_select_db(BD_NAME,$btcon);

    //make sure we can use our arrays outside of the function
    $sql = "SELECT * FROM categorias WHERE padre ='$pid'";
    $re = mysql_query($sql);
    while($data = mysql_fetch_assoc($re))
    {
    
    //$data = mysql_fetch_assoc(mysql_query($sql));
 	
    //store values into the next key on the array
	    //$tree_arr[]   	= $data['nombre'];
	    if($pid == 0) { echo '--'; }
	    echo $data['nombre'].'<br>';
    	//$treeid_arr[] 	= $data['id'];
    	if(hasChildren($data['id']) != 0){
	    	$pid			= $data['id'];
    	}else{
	    	$pid			= 0;
    	}
    	
    //check that parent_id
 
	    if($pid > 0) {
        //call function recursively and pass ID
			buildTree($pid);
    	}
    }
    //mysql_close($btcon);
}

function hasChildren($id)
{
	$hccon = mysql_connect(BD_HOST,BD_USER,BD_PASSWORD);
	mysql_select_db(BD_NAME,$hccon);

    $gscq = mysql_query("select count(*) as total from categorias where padre ='$id'");
    $cate = '';
    while($r = mysql_fetch_assoc($gscq)){
    	$cate = $r['total'];
    }
    
	mysql_close($hccon);
	
    return $cate;
}

function getSelCategorias()
{
	$gccon = mysql_connect(BD_HOST,BD_USER,BD_PASSWORD);
	mysql_select_db(BD_NAME,$gccon);

    $gcq = mysql_query("select * from categorias ORDER by id");
    $i = 0;
    while($r = mysql_fetch_assoc($gcq)){
    	$cats['row'.$i] = array('id'=>$r['id'],'nombre'=>$r['nombre']);
    	$i++;
    }
    
	mysql_close($gccon);
	
    return $cats;
}

function getSubCategorias($id)
{
	$gsccon = mysql_connect(BD_HOST,BD_USER,BD_PASSWORD);
	mysql_select_db(BD_NAME,$gsccon);

    $gscq = mysql_query("select * from categorias where padre ='$id'");
    $cate = '';
    $i = 0;
    while($r = mysql_fetch_assoc($gscq)){
    	if($i == 0){ $cate .= $r['id']; }else{ $cate .= ','.$r['id']; }
    	$i++;
    }
    
	mysql_close($gsccon);
	
    return $cate;
}

function getFecha($t)
{
	switch($t)
	{
		case 'i':
			$f = date('Y-m-d 09:00:00');
		break;
		case 'f':
			$f = date('Y-m-d 21:00:00');
		break;
		default:
			$f = date('Y-m-d H:i:s');
		break;
	}
	
	return $f;
}

function appActivo(){
	
	$fecha_i = getFecha('i');
	$fecha_f = getFecha('f');
	
	$horarestriccion = date('Y-m-d H:i:s',strtotime ("+1 hour"));
	if(($horarestriccion < $fecha_i) || ($horarestriccion > $fecha_f))
	{
		$v = false;
	}else{
		$v = true;
	}
	
	$v = true;
	
	return $v;
}

function getOauthUid($id){

	$con = mysql_connect(BD_HOST, BD_USER, BD_PASSWORD);
	mysql_select_db(BD_NAME);
	
	$res = mysql_query("SELECT oauth_uid FROM cpass_user WHERE id = $id");
	$aff = mysql_fetch_assoc($res);
	
	return $aff['oauth_uid'];


}
?>