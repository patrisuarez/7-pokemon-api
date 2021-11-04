<?php
// https://pokeapi.co/api/v2/pokemon/
$api = curl_init("https://pokeapi.co/api/v2/pokemon/");
curl_setopt($api,CURLOPT_RETURNTRANSFER,true);
$respuesta = curl_exec($api);
curl_close($api);
//results es el vector del json, al pedirlo sale solo la lista de pokemons
$json = json_decode($respuesta);
?>
<!-- numero total de pokemons -->
<!-- <h1>Total de Pokemon: <?php echo $json->count ?></h1> -->
<?php
// print_r($json->results);
$contador = 1;
for ($i=0;$i < count($json->results);$i++) {
    echo "<div>".$contador." - ";
    echo $json->results[$i]->name."</div><br>";
    $contador++;

}
//mientras next(siguiente pagina) sea distinto de null, seguira avanzando
while ($json->next != null) {
    $api = curl_init($json->next);
    curl_setopt($api,CURLOPT_RETURNTRANSFER,true);
    $respuesta = curl_exec($api);
    curl_close($api);
    $json = json_decode($respuesta);
    for ($i=0;$i < count($json->results);$i++) {
        echo "<div>".$contador." - ";
    echo $json->results[$i]->name."</div><br>";
    $contador++;
    
    }
}