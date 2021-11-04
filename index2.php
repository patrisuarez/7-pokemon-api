<?php
// https://pokeapi.co/api/v2/pokemon/
$pokemon = '109';
$api = curl_init("https://pokeapi.co/api/v2/pokemon/".$pokemon);
curl_setopt($api,CURLOPT_RETURNTRANSFER,true);
$respuesta = curl_exec($api);
curl_close($api);
$json = json_decode($respuesta);
print_r($respuesta);