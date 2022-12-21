<?php

$filePath=".\database";

if(is_dir($filePath)){
	$files = scandir($filePath);
	$noOfFiles = count($files) - 2;
	//echo $noOfFiles;
	
}else{
	//echo "This is not Directory";
}
//var_dump($files);
$sqlFiles = array();

if(!empty($files)){
	foreach($files as $file){
		$extension = pathinfo($file, PATHINFO_EXTENSION);
		if($extension == 'sql'){
			array_push($sqlFiles,$file);
		}
	}
}
//print_r($sqlFiles);

$db = new PDO("mysql:host=127.0.0.1;dbname=company_portal;charset=utf8mb4", 'root', '');
if(!empty($sqlFiles)){
	foreach($sqlFiles as $sqlFile){
		//$sqlFilePath = $filePath.'\ '.$sqlFile;
	    //echo $sqlFilePath.PHP_EOL;
		 $select = $db->query(file_get_contents($filePath.' '.$sqlFile));
		 while ($row = $select->fetchAll(PDO::FETCH_ASSOC)){
			 print_r($row);
    	 
		}
	}
}
 

?>










