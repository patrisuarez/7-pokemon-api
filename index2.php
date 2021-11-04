<?php
    // https://pokeapi.co/api/v2/pokemon/

    //muestra pokemon concreto
//    $pokemon = '1'; 

   //muestra pokemon aleatorio entre 1 y 1118 que es el total
   //strval convierte a un string
    $pokemon = strval(random_int(1,1118));
   $api = curl_init("https://pokeapi.co/api/v2/pokemon/".$pokemon);
   curl_setopt($api,CURLOPT_RETURNTRANSFER,true);
   $respuesta = curl_exec($api);
   curl_close($api);

   $json = json_decode($respuesta);
//    print_r($respuesta);
    // print_r($json->sprites->other);
    // echo "<br><br>";
    // print_r($json->sprites->other->home);
    // echo "<br><br>";
    // print_r($json->sprites->other->{'official-artwork'});
echo '<h1> Pokemon Nro:'.$pokemon.' - '.$json->name.'</h1>';
// echo '<h1> Pokemon Nro:'.$pokemon.' - '.$json->forms->name.'</h1>';
    // foto
    echo '<img src="'.$json->sprites->other->{'official-artwork'}->front_default.'" width ="200">';

    // cantidad de tipos que tiene el pokemon seleccionado
    echo '<h2> Tipos :'.count($json->types). '</h2>';

    //tipo de pokemon por nombre
    for ($i=0;$i < count($json->types);$i++){
        echo $json->types[$i]->type->name.'<br>';
    }
 ?>  