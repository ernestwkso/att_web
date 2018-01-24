<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define ("DB_USER", "root");
define ("DB_PASSWORD", "root");
define ("DB_DATABASE", "feed_check");
define ("DB_HOST", "localhost");
define ("DB_PORT", "8889");

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);
$q = $_GET['q']; 

$sql = "SELECT DISTINCT league_id, league_name FROM match_fixture
		WHERE league_name LIKE '%".$q."%'"; 
$result = $mysqli->query($sql);

$json = [];
while($row = $result->fetch_assoc()){
     $json[] = ['id'=>$row['league_id'], 'text'=>$row['league_name']];
}
echo json_encode($json);

?>