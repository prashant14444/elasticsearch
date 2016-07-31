<?php
	session_start();
	require ( "db.php" );  
	$Link_L = mysqli_connect($servername, $username_db, $password_db, $dbname);
	if (!$Link_L)
	{
		die("Connection failed: " . mysql_connect_error());
	}
//include("JSON.php");
//$json = new Services_JSON();
$Param = $_GET;

                         //before using userid_list, we need to replace "," by "','"
                        //This stops SQL Injection in _POST / _GET / _REQUEST variables
                          foreach ($_POST as $key => $value)
                            {
                                $value = preg_replace('/[\'\"]/', '`', $value);
                                //$value = preg_replace('/[;]/', ',', $value);
                                 $_POST[$key] = mysqli_real_escape_string($Link_L,$value);

							}
							    if($_GET)
							    foreach ($_GET as $key => $value)
							    {

							      $value = preg_replace('/[\'\"]/', '`', $value);
							      //$value = preg_replace('/[;]/', ',', $value);
							      $_GET[$key] = mysqli_real_escape_string($Link_L,$value);
							    }  

mysqli_query($Link_L,"SET NAMES 'utf8'");
switch ($Param['purpose']) 
{

	//activity selection api---  http://localhost/api/api.php?purpose=get_activities

	 case 'get_cvid':
		//header('Content-Type: application/json');
	 	$response=array();
	 	$i=0;
		$sql = "select * from _temp";
		if ($query_run=mysqli_query($Link_L, $sql))
		{ 
			while($query_row=mysqli_fetch_assoc($query_run))
			{
				$id=$query_row['id'];
				$sql1 = "select * from jc_master where c_id='$id'";
				if ($query_run1=mysqli_query($Link_L, $sql1))
				{
					$query_row1=mysqli_fetch_assoc($query_run1);
					if(!empty($query_row1))
					{
						$public_userid_db=$query_row1['c_id'];
						$response[$i]['c_id']=$public_userid_db;
						$response[$i]['j_id']=$query_row1['j_id'];
						$i++;
					}
				}
			}
		}
	else 
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($Link_L);
		}	
	echo json_encode($response,JSON_PRETTY_PRINT);
	break;
}
?>