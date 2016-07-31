
<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  
<form method="post" action="">  
  table1: <input type="text" style="height:20px;width:430px;" name="table1" value="" placeholder="col_name1:val1,col_name2:val2"  >
  <br><br>
  table2: <input type="text" style="height:20px;width:430px;" name="table2" value="">
  <br><br>
  table3: <input type="text" style="height:20px;width:430px;" name="table3" value="">
  <br><br>
  agg column: <input type="text" style="height:20px;width:130px;" name="agg_col" value="">
  <br><br>
  <input type="submit" style="height:40px;width:100px;" name="submit" value="SUBMIT">  
</form>

</body>
</html>


<?php
if (isset($_POST['table1'])&&isset($_POST['table2'])&&isset($_POST['table3']))
{
	$response=array();
	$agg_table='';
	$table1=($_POST['table1']);
	$table2=($_POST['table2']);
	$table3=($_POST['table3']);
	$agg_col=($_POST['agg_col']);

	if(!empty($agg_col))
	{
		$agg_col=chop($agg_col,",");
		$agg_col=explode(":", $agg_col);
		$agg_table=$agg_col[0];
		$agg_column=chop($agg_col[1]," ");
		$agg_by_type="agg_by_".chop($agg_col[1],"");
	}
	else
	{
		die();
	}


	switch($agg_table)
	{

		case 'table1':
			header('Content-Type: application/json');
			$i=0;
			$j=0;
			$k=0;
			$response_api['api']="http://fa643719.ngrok.io/prashant/_search";
			echo json_encode($response_api,JSON_PRETTY_PRINT);
			$response['size']=0;
			//conditions for table 1 columns
			if(!empty($table1))
			{
				$table1=explode(",", $table1);
				foreach($table1 as $column_data)
				{
					$column_data=explode(":", $column_data);
					$key=$column_data[0];
					$value=$column_data[1];
					$response['query']['bool']['must'][$i]['match'][$key]=$value;
					$i++;
				}
				//print_r($table1);
			}
			else
			{
			$response['query']['bool']['must'][$i]['match_all']=(object)null;
			$i++;
			}

			$response['query']['bool']['must'][$i]['has_child']['type']="j_id";
			//conditions for table 2 columns
			if(!empty($table2))
			{
				$table2=explode(",", $table2);
				foreach($table2 as $column_data)
				{
					$column_data=explode(":", $column_data);
					$key=$column_data[0];
					$value=$column_data[1];
					$response['query']['bool']['must'][$i]['has_child']['query']['bool']['must'][$j]['match'][$key]=$value;
					
					$j++;

				}
				$i++;
				//print_r($table2);
			}
			else
			{
				$response['query']['bool']['must'][$i]['has_child']['query']['bool']['must'][$j]['match_all']=(object)null;
				$i++;
			}
			
			$response['query']['bool']['must'][$i]['query']['has_child']['type']="j_id";
			$response['query']['bool']['must'][$i]['query']['has_child']['query']['has_child']['type']="job_details";
			//conditions for table 3 columns
			if(!empty($table3))
			{
				$table3=explode(",", $table3);
				foreach($table3 as $column_data)
				{
					$column_data=explode(":", $column_data);
					$key=$column_data[0];
					$value=$column_data[1];
					$response['query']['bool']['must'][$i]['query']['has_child']['query']['has_child']['query']['bool']['must'][$k]['match'][$key]=$value;
					$k++;

				}
				print_r($table3);
			}
			else
			{
				$response['query']['bool']['must'][$i]['query']['has_child']['query']['has_child']['query']['bool']['must'][$k]['match_all']=(object)null;
			}
			
			$response['aggs'][$agg_by_type]['terms']['field']=$agg_col[1];
			$response['aggs'][$agg_by_type]['terms']['size']=300;

			echo json_encode($response,JSON_PRETTY_PRINT);
		break;




	case 'table2':

			header('Content-Type: application/json');
			$i=0;
			$j=0;
			$k=0;
			$response_api['api']="http://fa643719.ngrok.io/prashant/j_id/_search";
			echo json_encode($response_api,JSON_PRETTY_PRINT);
			$response['size']=0;
			//conditions for table 1 columns
			if(!empty($table2))
			{
				$table2=explode(",", $table2);
				foreach($table2 as $column_data)
				{
					$column_data=explode(":", $column_data);
					$key=$column_data[0];
					$value=$column_data[1];
					$response['query']['bool']['must'][$i]['match'][$key]=$value;
					$i++;
				}
				//print_r($table2);
			}
			else
			{
			$response['query']['bool']['must'][$i]['match_all']=(object)null;
			$i++;
			}

			$response['query']['bool']['must'][$i]['query']['has_parent']['type']="cv_id";
			//conditions for table 2 columns
			if(!empty($table1))
			{
				$table1=chop($table1,",");
				$table1=explode(",", $table1);
				foreach($table1 as $column_data)
				{
					$column_data=explode(":", $column_data);
					$key=$column_data[0];
					$value=$column_data[1];
					$response['query']['bool']['must'][$i]['query']['has_parent']['query']['bool']['must'][$j]['match'][$key]=$value;
					$j++;
				}
				$i++;
				//print_r($table1);
			}
			else
			{
				$response['query']['bool']['must'][$i]['query']['has_parent']['query']['bool']['must'][$j]['match_all']=(object)null;
				$i++;
			}


			$response['query']['bool']['must'][$i]['query']['has_child']['type']="job_details";
			//conditions for table 3 columns

			if(!empty($table3))
			{
				$table3=chop($table3,",");
				$table3=explode(",", $table3);
				foreach($table3 as $column_data)
				{
					$column_data=explode(":", $column_data);
					$key=$column_data[0];
					$value=$column_data[1];
					$response['query']['bool']['must'][$i]['query']['has_child']['query']['bool']['must'][$k]['match'][$key]=$value;
					$k++;
				}
				$i++;
				//print_r($table1);
			}
			else
			{
				$response['query']['bool']['must'][$i]['query']['has_child']['query']['bool']['must'][$k]['match_all']=(object)null;
				$i++;
			}
			
			
			
			$response['aggs'][$agg_by_type]['terms']['field']=$agg_col[1];
			$response['aggs'][$agg_by_type]['terms']['size']=300;

			echo json_encode($response,JSON_PRETTY_PRINT);
		break;





	case 'table3':
			header('Content-Type: application/json');
			$i=0;
			$j=0;
			$k=0;
			$response_api['api']="http://fa643719.ngrok.io/prashant/job_details/_search";
			echo json_encode($response_api,JSON_PRETTY_PRINT);
			$response['size']=0;
			//conditions for table 1 columns
			if(!empty($table3))
			{
				$table3=explode(",", $table3);
				foreach($table3 as $column_data)
				{
					$column_data=explode(":", $column_data);
					$key=$column_data[0];
					$value=$column_data[1];
					$response['query']['bool']['must'][$i]['match'][$key]=$value;
					$i++;
				}
				//print_r($table1);
			}
			else
			{
			$response['query']['bool']['must'][$i]['match_all']=(object)null;
			$i++;
			}

			$response['query']['bool']['must'][$i]['has_parent']['type']="j_id";
			//conditions for table 2 columns
			if(!empty($table2))
			{
				$table2=explode(",", $table2);
				foreach($table2 as $column_data)
				{
					$column_data=explode(":", $column_data);
					$key=$column_data[0];
					$value=$column_data[1];
					$response['query']['bool']['must'][$i]['has_parent']['query']['bool']['must'][$j]['match'][$key]=$value;
					
					$j++;

				}
				$i++;
				//print_r($table2);
			}
			else
			{
				$response['query']['bool']['must'][$i]['has_parent']['query']['bool']['must'][$j]['match_all']=(object)null;
				$i++;
			}
			
			$response['query']['bool']['must'][$i]['query']['has_parent']['type']="j_id";
			$response['query']['bool']['must'][$i]['query']['has_parent']['query']['has_parent']['type']="cv_id";
			//conditions for table 3 columns
			if(!empty($table1))
			{
				$table1=explode(",", $table1);
				foreach($table1 as $column_data)
				{
					$column_data=explode(":", $column_data);
					$key=$column_data[0];
					$value=$column_data[1];
					$response['query']['bool']['must'][$i]['query']['has_parent']['query']['has_parent']['query']['bool']['must'][$k]['match'][$key]=$value;
					$k++;

				}
				//print_r($table1);
			}
			else
			{
				$response['query']['bool']['must'][$i]['query']['has_parent']['query']['has_parent']['query']['bool']['must'][$k]['match_all']=(object)null;
			}
			
			$response['aggs'][$agg_by_type]['terms']['field']=$agg_col[1];
			$response['aggs'][$agg_by_type]['terms']['size']=300;

			echo json_encode($response,JSON_PRETTY_PRINT);
		break;
	}
}
?>
