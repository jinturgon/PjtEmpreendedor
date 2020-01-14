<?php
$key = '495e185b-84a6-4344-8549-8a79d47f46b6';
$cep = array();
$cep[] = '07195330';
$cep[] = '07012-030';

$cepfiltrado = array();

var_dump($cep);


    foreach ($cep as $row){
            $jsonurl ='https://graphhopper.com/api/1/geocode?q='.$row.'&locale=br&debug=true&key='.$key.'&type=json&limit=1';
            echo $jsonurl."<br>";
            $json = file_get_contents($jsonurl);
            $json_output = json_decode($json,1);

            echo $row."<br>";

            $lai = $json_output['hits'][0]['point']['lat'];
            $long = $json_output['hits'][0]['point']['lng'];
            
            
            $cepfiltrado[] = $lai;
            $cepfiltrado[] = $long;

            echo $lai."<BR>";
            echo $long;

            echo "<BR><BR><BR><BR><BR>";
    }
    var_dump($cepfiltrado);

    $origem = $cepfiltrado[0].','.$cepfiltrado[1];
    $destino = $cepfiltrado[2].','.$cepfiltrado[3];

    $url='https://graphhopper.com/api/1/route?point='.$origem.'&point='.$destino.'&vehicle=car&locale=de&calc_points=false&key='.$key;
    echo $url."<br>";
    $data = file_get_contents($url);
    $json_outputEND = json_decode($data,1);

    $dist = $json_outputEND['paths']['0']['distance'];
    $temp = $json_outputEND['paths']['0']['time'];

    echo $dist."<BR>";
    echo $temp;

    echo "<BR><BR><BR><BR><BR>";

    var_dump($data);


    die();
?>