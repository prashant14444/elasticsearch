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

	 case 'get_cv':
			$sql = "select id,hrc_id,hrc_id1,temp,company_id,company_id1,n1,n2,n3,n4,n5,n6,n7,n8,n9,n10,n11,n12,n13,n14,n15,n16,n17,n18,n19,n20,n21,n22,n23,n24,n25,n26,n27,n28,n29,n31,n32,n33,n34,n35,n811,n511,n36,n37,n38,n40,n41,n42,n43,n44,n45,n46,n47,n48,n49,n50,n101,n102,f_sc,i_sc,a_sc,abc_0,n121,n122 from _temp";
			if ($query_run=mysqli_query($Link_L, $sql))
			{ 
				
				$i=1;
				while($query_row=mysqli_fetch_assoc($query_run))
				{
					echo "{".'"'."index".'"'.":"."{".'"'."_id".'"'.":".'"'.$i.'"'."}"."}";
					echo '<br>';
					$response['id']=(int)$query_row['id'];
					$response['hrc_id']=$query_row['hrc_id'];
					$response['hrc_id1']=$query_row['hrc_id1'];
					$response['temp']=$query_row['temp'];
					$response['company_id']=$query_row['company_id'];
					$response['company_id1']=$query_row['company_id1'];
					$response['n1']=(int)$query_row['n1'];
					$response['n2']=(int)$query_row['n2'];
					$response['n3']=(int)$query_row['n3'];
					$response['n4']=(int)$query_row['n4'];
					$response['n5']=(int)$query_row['n5'];
					$response['n6']=(int)$query_row['n6'];
					$response['n7']=(int)$query_row['n7'];
					$response['n8']=(int)$query_row['n8'];
					$response['n9']=(int)$query_row['n9'];
					$response['n10']=(int)$query_row['n10'];
					$response['n11']=(int)$query_row['n11'];
					$response['n12']=(int)$query_row['n12'];
					$response['n13']=(int)$query_row['n13'];
					$response['n14']=(int)$query_row['n14'];
					$response['n15']=(int)$query_row['n15'];
					$response['n16']=(int)$query_row['n16'];
					$response['n17']=(int)$query_row['n17'];
					$response['n18']=(int)$query_row['n18'];
					$response['n19']=(int)$query_row['n19'];
					$response['n20']=(int)$query_row['n20'];
					$response['n21']=(int)$query_row['n21'];
					$response['n22']=(int)$query_row['n22'];
					$response['n23']=(int)$query_row['n23'];
					$response['n24']=(int)$query_row['n24'];
					$response['n25']=(int)$query_row['n25'];
					$response['n26']=(int)$query_row['n26'];
					$response['n27']=(int)$query_row['n27'];
					$response['n28']=(int)$query_row['n28'];
					$response['n29']=(int)$query_row['n29'];
					$response['n31']=(int)$query_row['n31'];
					$response['n32']=(int)$query_row['n32'];
					$response['n33']=(int)$query_row['n33'];
					$response['n34']=(int)$query_row['n34'];
					$response['n35']=(int)$query_row['n35'];
					$response['n811']=(int)$query_row['n811'];
					$response['511']=(int)$query_row['n511'];
					$response['n36']=(int)$query_row['n36'];
					$response['n37']=(int)$query_row['n37'];
					$response['n38']=(int)$query_row['n38'];
					$response['n40']=(int)$query_row['n40'];
					$response['n41']=(int)$query_row['n41'];
					$response['n42']=(int)$query_row['n42'];
					$response['n43']=(int)$query_row['n43'];
					$response['n44']=(int)$query_row['n44'];
					$response['n45']=(int)$query_row['n45'];
					$response['n46']=(int)$query_row['n46'];
					$response['n47']=(int)$query_row['n47'];
					$response['n48']=(int)$query_row['n48'];
					$response['n49']=(int)$query_row['n49'];
					$response['n50']=(int)$query_row['n50'];
					$response['n101']=$query_row['n101'];
					$response['n102']=$query_row['n102'];
					//$respone[$i]['n103']=$query_row['n103'];
					$response['f_sc']=(int)$query_row['f_sc'];
					$response['a_sc']=(int)$query_row['a_sc'];
					$response['i_sc']=(int)$query_row['i_sc'];
					$response['abc_0']=(int)$query_row['abc_0'];
					$response['n121']=(int)$query_row['n121'];
					$response['n122']=(int)$query_row['n122'];
					echo json_encode($response)."<br>";
					$i++;
					//break;
				}
			}
	else 
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($Link_L);
		}	
	//echo json_encode($response,JSON_PRETTY_PRINT);
	break;

	case 'get_j_id_bulk':
	 	$response=array();
	 	$i=0;
	 	$k=1;
	 	$j=101;
	 	$flag=0;
		$sql = "select * from _temp";
		if ($query_run=mysqli_query($Link_L, $sql))
		{ 
			while($query_row=mysqli_fetch_assoc($query_run))
			{
				$id=$query_row['id'];
				$sql1 = "select * from jc_master where c_id='$id'";
				if ($query_run1=mysqli_query($Link_L, $sql1))
				{
					while($query_row1=mysqli_fetch_assoc($query_run1))
					{
						if(!empty($query_row1))
						{
							echo "{".'"'."index".'"'.":"."{".'"'."_id".'"'.":".$j.','.'"'."parent".'"'.":".$k."}"."}";
							echo '<br>';
							$public_userid_db=$query_row1['c_id'];
							$response['c_id']=$public_userid_db;
							$response['j_ids']=$query_row1['j_id'];
							$response['candidate_name']=$query_row1['candidate_name'];
							$response['job_title']=$query_row1['job_title'];
							$response['status']=$query_row1['status'];
							$response['job_title']=$query_row1['job_title'];
							$response['j_id_status']=(int)$query_row1['j_id_status'];
							$i++;
							echo json_encode($response,JSON_PRETTY_PRINT);
							echo "<br><br>";
							$j++;
							$k++;
							if($j==111)
							{
								break;
								break;
							}
						}
					}
				}
			}
		}
	else 
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($Link_L);
		}	
	
	break;

	case 'get_cv_id_bulk':
	 	$response=array();
	 	$i=0;
	 	$j=1;
		$sql = "select * from _temp";
		if ($query_run=mysqli_query($Link_L, $sql))
		{ 
			while($query_row=mysqli_fetch_assoc($query_run))
			{
				
				$id=$query_row['id'];
				$sql1 = "select * from jc_master where c_id='$id'";
				if ($query_run1=mysqli_query($Link_L, $sql1))
				{
					// echo "{".'"'."index".'"'.":"."{".'"'."_id".'"'.":".'"'.$j.'"'."}"."}";
					// echo '<br>';
					$query_row1=mysqli_fetch_assoc($query_run1);
					if(!empty($query_row1))
					{
						echo "{".'"'."index".'"'.":"."{".'"'."_id".'"'.": ".$j."}"."}";
						echo '<br>';
						$public_userid_db=$query_row1['c_id'];
						$response['c_ids']=$public_userid_db;
						$i++;
						echo json_encode($response,JSON_PRETTY_PRINT);
						echo "<br>";
						$j++;
						// if($j==11)
						// {
						// 	break;
						// 	break;
						// }
					}
				}
				// if(!empty($response))
				// {
				// 	break;
				// }
				
			}
		}
	else 
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($Link_L);
		}
	
	break;



	case 'get_job_id_details_bulk':
	 	$response=array();
	 	$i=0;
	 	$l=1;
	 	$k=101;
	 	$j=1001;
		$sql = "select * from _temp";
		if ($query_run=mysqli_query($Link_L, $sql))
		{ 
			while($query_row=mysqli_fetch_assoc($query_run))
			{
				
				$id=$query_row['id'];
				$sql1 = "select * from jc_master where c_id='$id'";
				if ($query_run1=mysqli_query($Link_L, $sql1))
				{

					while($query_row1=mysqli_fetch_assoc($query_run1))
					{
						if(!empty($query_row1))
						{
							$public_userid_db=$query_row1['c_id'];
							$j_id_db=$query_row1['j_id'];
							//echo $j_id_db.", "."\t";
							$sql2 = "select * from jobpublished_m where job_id='$j_id_db'";
							if ($query_run2=mysqli_query($Link_L, $sql2))
							{
								//echo $j_id_db.", "."\t";
								// echo "{".'"'."index".'"'.":"."{".'"'."_id".'"'.":".$j.','.'"'."parent".'"'.":".$k.','.'"'."routing".'"'.":".$l."}"."}";
								// echo '<br>';
								while($query_row2=mysqli_fetch_assoc($query_run2))
								{
									echo "{".'"'."index".'"'.":"."{".'"'."_id".'"'.":".$j.','.'"'."parent".'"'.":".$k.','.'"'."routing".'"'.":".$l."}"."}";
									echo '<br>';
									$public_userid_db=$query_row1['c_id'];
									$response['c_id']=$public_userid_db;
									$response['j_ids']=$j_id_db;
									$response['job_id']=$query_row2['job_id'];
									$response['title']=$query_row2['title'];
									$response['company']=$query_row2['company'];
									$response['city']=$query_row2['city'];
									$response['client_id']=$query_row2['client_id'];
									echo json_encode($response,JSON_PRETTY_PRINT);
									echo "<br>";
									// if($k==111)
									// {
									// 	break;
									// 	break;
									// }
									$i++;
									$j++;
									$k++;
									$l++;
								}
							}
						}
					}
				}
				// if($k==111)
				// {
				// 	break;
				// }
			}
		}
	else 
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($Link_L);
		}

	break;	


	case 'get_client_id_details':
	 	$response=array();
	 	$i=0;
	 	$l=1;
	 	$k=1001;
	 	$j=10001;
	 	$count=1;
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
						$j_id_db=$query_row1['j_id'];
						$sql2 = "select * from jobpublished_m where job_id='$j_id_db'";
						if ($query_run2=mysqli_query($Link_L, $sql2))
						{
							while($query_row2=mysqli_fetch_assoc($query_run2))
							{
								$client_id_db=$query_row2['client_id'];
								$sql3 = "select * from client where c_id='$client_id_db'";
								if ($query_run3=mysqli_query($Link_L, $sql3))
								{
									echo "{".'"'."index".'"'.":"."{".'"'."_id".'"'.":".$j.','.'"'."parent".'"'.":".$k.','.'"'."routing".'"'.":".$l."}"."}";
									echo '<br>';
									while($query_row3=mysqli_fetch_assoc($query_run3))
									{
										$response['c_id']=$query_row3['c_id'];
										$response['company_id']=$query_row3['company_id'];
										$response['name']=$query_row3['name'];
										$response['address']=$query_row3['address'];
										$response['description']=$query_row3['description'];
										$response['city']=$query_row3['city'];
										$response['size']=$query_row3['size'];
										$response['industry']=$query_row3['industry'];
										$response['active']=$query_row3['active'];
										echo json_encode($response,JSON_PRETTY_PRINT);
										echo "<br>";
										if($k==1011)
								{
									break;
									break;
								}
										$i++;
										$j++;
										$k++;
										$l++;
									}
								}
								else 
								{
									echo "Error: " . $sql3 . "<br>" . mysqli_error($Link_L);
								}
							}
						}
					}
				}
				if($k==1011)
				{
					break;
				}
			}
		}
	else 
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($Link_L);
		}
		if (empty($response)) 
		{
			echo "no client found";
		}

	break;	



	case 'update_cv_child':
		$sql = "SELECT _temp.id,jc_master.c_id,jc_master.j_id FROM _temp LEFT JOIN jc_master ON _temp.id=jc_master.c_id order by jc_master.j_id desc";
			if ($query_run=mysqli_query($Link_L, $sql))
				{ 
					$i=0;
					$response=array();
					while($query_row=mysqli_fetch_assoc($query_run))
					{
						$id=$query_row['id'];
						$c_id=$query_row['c_id'];
						$j_id=$query_row['j_id'];

						// $response[$i]['temp_id']=$temp_id;
						// $response[$i]['jc_master_c_id']=$jc_master_c_id;
						$sql1="update _temp set c='$j_id' where id='$id'";
						if($query_run1=mysqli_query($Link_L, $sql1))
						{
							echo "updated"."<br>";
						}
						else
						{
							echo "Error: " . $sql1 . "<br>" . mysqli_error($Link_L);
						}
						$i++;
					}
				}
		else 
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($Link_L);
			}	
			if($query_run) {
				// echo json_encode($response,JSON_PRETTY_PRINT);
			}
			else 
				echo "Error";
		break;
	// "SELECT _temp.id,jc_master.c_id,jc_master.j_id,COUNT(jc_master.j_id) FROM _temp LEFT JOIN jc_master ON _temp.id=jc_master.c_id order by jc_master.j_id desc"	



	case 'update_job_id_child':
		$sql = "SELECT jc_master.j_id,jobpublished_m.job_id FROM jc_master LEFT JOIN jobpublished_m ON jobpublished_m.job_id=jc_master.j_id order by jobpublished_m.job_id DESC";
			if ($query_run=mysqli_query($Link_L, $sql))
				{ 
					$i=0;
					$response=array();
					while($query_row=mysqli_fetch_assoc($query_run))
					{
						$j_id=$query_row['j_id'];
						$job_id=$query_row['job_id'];

						// $response[$i]['temp_id']=$temp_id;
						// $response[$i]['jc_master_c_id']=$jc_master_c_id;
						$sql1="update jc_master set c='$job_id' where j_id='$job_id'";
						if($query_run1=mysqli_query($Link_L, $sql1))
						{
							echo "updated"."<br>";
						}
						else
						{
							echo "Error: " . $sql1 . "<br>" . mysqli_error($Link_L);
						}
						$i++;
					}
				}
		else 
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($Link_L);
			}	
			if($query_run) {
				// echo json_encode($response,JSON_PRETTY_PRINT);
			}
			else 
				echo "Error";
		break;
}
?>