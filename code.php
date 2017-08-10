header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json;charset=utf-8');

	$url = "http://itnthackathon.bweas.tm.com.my/api/getServiceOrderSiebel"; //tukae ldap -- staffprofile 
	$json = file_get_contents($url);

  echo $json;


  //
  $data = json_decode($json,true);

	//var_dump($data);

	//echo
	$datacount = count($data['getServiceOrderSiebel']['records']);

	for ($x = 0; $x < $datacount; $x++) {

		$SIEBEL_ORDER_NUMBER = $data['getServiceOrderSiebel']['records'][$x][1];
		$ACCOUNT_NAME = $data['getServiceOrderSiebel']['records'][$x][2];
		$NETWORK_ID = $data['getServiceOrderSiebel']['records'][$x][3];
		$SERVICE_ID = $data['getServiceOrderSiebel']['records'][$x][4];
		$PRODUCT_CODE = $data['getServiceOrderSiebel']['records'][$x][5];
		$BAU_SERVICE_ID = $data['getServiceOrderSiebel']['records'][$x][7];
		$NIS_SERVICE_ORDER_NO = $data['getServiceOrderSiebel']['records'][$x][8];

		$output[] = array('SIEBEL_ORDER_NUMBER' => $SIEBEL_ORDER_NUMBER,
						  'ACCOUNT_NAME' => $ACCOUNT_NAME,
						  'NETWORK_ID' => $NETWORK_ID,
						  'SERVICE_ID' => $SERVICE_ID,
						  'PRODUCT_CODE' => $ACCOUNT_NAME,
						  'BAU_SERVICE_ID' => $NETWORK_ID,
						  'NIS_SERVICE_ORDER_NO' => $SERVICE_ID
						 );

	}
	$output_unique = array_unique(array("data"=>$output));
	echo json_encode($output_unique);
