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

$sql = "SELECT away_team_id, away_team FROM match_fixture
		WHERE away_team LIKE '%".$q."%'"; 
$result = $mysqli->query($sql);

$json = [];
while($row = $result->fetch_assoc()){
     $json[] = ['id'=>$row['away_team_id'], 'text'=>$row['away_team']];
}
echo json_encode($json);

?>