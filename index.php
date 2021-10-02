<?php 
// error_reporting(0);
// Fetching JSON
$req_url = 'https://v6.exchangerate-api.com/v6/1fca918a82cf5772aab3ea46/latest/USD';
$response_json = file_get_contents($req_url);

// Continuing if we got a result
if(false !== $response_json) {

    // Try/catch for json_decode operation
    try {

		// Decoding
		$response = json_decode($response_json);
        

		// Check for success
		if('success' === $response->result) {

			// YOUR APPLICATION CODE HERE, e.g.
			$base_price = 12; // Your price in USD
			$EUR_price = round(($base_price * $response->conversion_rates->EUR), 2);

		}
        

    }
    catch(Exception $e) {
        // Handle JSON parse error...
    }

}
 //print_r($response_json);
//  echo "Country"; </br>
//  echo $response->conversion_rates->USD; // Access Object data


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo $response->base_code; ?></h1>
    <h3>KURS Rate</h3>
    <table border="1">
        <tr>
            <th>Currency</th>
            <th>MMK</th>
        </tr>        
        <tr>
            <td>USD</td>
            <td><?php echo $response->conversion_rates->USD; ?></td>
        </tr>
        <tr> 
            <td>AED</td>
            <td><?php echo $response->conversion_rates->AED; ?></td>
        </tr>
        <tr>
            <td>AFN</td>
            <td><?php echo $response->conversion_rates->AFN; ?></td>
        </tr>
        <tr>
            <td>ALL</td>
            <td><?php echo $response->conversion_rates->ALL; ?></td>            
        </tr>        
    </table>
</body>
</html> 