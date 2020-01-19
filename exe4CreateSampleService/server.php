<?php

if (isset($_POST['data'])) {
	$date = new DateTime($_POST['data']);
	$date->add(new DateInterval('PT12H'));
	echo json_encode(["data" => $date->format('Y-m-d H:i:s')]);
}