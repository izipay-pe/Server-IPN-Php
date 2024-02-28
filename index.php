<?php
header('Content-Type: application/json');

/***************** Para Local **************************/
$directorioActual = getcwd();                           
$ruta = $directorioActual . '/datos.json';              
/********************************************************/

/***************** Para Servidor ***********************/
/*   $ruta = sys_get_temp_dir() . '/datos.json';       */    
/*******************************************************/

$datos = array();
$datos = json_decode(file_get_contents($ruta), true);

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];

echo "Metodo: ".$requestMethod."\n";
echo "Endpoint: ".$requestUri."\n";

if ($requestMethod && $requestUri) {
    $condition = $requestMethod . $requestUri;
    switch ($condition) {
        case 'GET/IPN/Datos':

            echo("\nEsta es la ruta de lectura: ");
            echo $ruta. "\n";
            
            foreach ($datos as $clave) {
                echo  "\n".$clave . "\n";
            }

            break;

        case 'POST/IPN/Insertar':
            $newData = file_get_contents("php://input");

            /**Formato Correcto**/
            $decodedUrl = '{%0A' . str_replace('&', ',%0A', $newData). '"%0A}';
            $decodedUrl = str_replace('kr-hash-key=password', '"kr-hash-key":"password"', $decodedUrl);
            $decodedUrl = str_replace('kr-hash-algorithm=sha256_hmac', '"kr-hash-algorithm":"sha256_hmac"', $decodedUrl);
            $decodedUrl = str_replace('kr-answer=', '"kr-answer":[', $decodedUrl);
            $decodedUrl = str_replace('Payment%22%7D', 'Payment%22%7D%5D', $decodedUrl);
            $decodedUrl = str_replace('kr-answer-type=V4%2FPayment', '%22kr-answer-type%22%3A%22V4%2FPayment%22', $decodedUrl);
            $decodedUrl = str_replace('kr-hash=', '%22kr-hash%22%3A%22', $decodedUrl);
            $entrada = urldecode($decodedUrl);

            if ($entrada) {
                $datos[] = $entrada;
                file_put_contents($ruta, json_encode($datos, JSON_PRETTY_PRINT));
                echo("\nDato insertado....!!!!!!\nEsta es la ruta donde se guarda: ");
                echo $ruta."\n";
            }

            break;

        case 'PUT':
            // Manejar casos PUT
            // ...
            break;

        case 'DELETE/IPN/Limpiar':
            $datos = array();
            $datosNew = array();

            file_put_contents($ruta, json_encode($datosNew, JSON_PRETTY_PRINT));

            if (empty($datos)) {
                echo "Datos borrados....!!!!";
            } else {
                echo json_encode($datos);
            }
            break;
    }
}
?>
