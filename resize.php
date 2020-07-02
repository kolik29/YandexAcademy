<?php
$db_connect = mysqli_connect('localhost', 'root', 'root', 'yandexacademy') or die('Ошибка ' . mysqli_error($db_connect));;

$jsonFile = file_get_contents('result.json');
$json = json_decode($jsonFile, true);
$id = count($json);
$json[] = [
	'status' => 'В ожидании'
];

try {
	$file = $_FILES['file'];

	list($width_orig, $height_orig) = getimagesize($file['tmp_name']);

	$percent = $_POST['size'];

	$width = $width_orig / 100 * $percent;
	$height = $height_orig / 100 * $percent;

	$ratio_orig = $width_orig / $height_orig;

	if ($width / $height > $ratio_orig)
		$width = $height * $ratio_orig;
	else
		$height = $width / $ratio_orig;

	$image_p = imagecreatetruecolor($width, $height);

	if (end(explode('.', $file['name'])) == 'jpg')
		$image = imagecreatefromjpeg($file['tmp_name']);
	else if (end(explode('.', $file['name'])) == 'png')
		$image = imagecreatefrompng($file['tmp_name']);
	else
		throw new Error('Ошибка формата файла');

	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

	$resampledName = explode('.', $file['name'])[0].'_'.date('dmYHis').'.jpg';

	imagejpeg($image_p, $resampledName, 100);

	$result = mysqli_query($db_connect, 'INSERT INTO pictures (name) VALUES ("'.$resampledName.'");') or die('Ошибка ' . mysqli_error($db_connect));

	$json[$id] = [
		'status' => 'Выполнено',
		'download' => $_SERVER['SERVER_NAME'].'/'.$resampledName
	];
}

catch (Error $e) {
	$json[$id] = [
		'status' => 'Произошла ошибка'
	];
}

file_put_contents('result.json', json_encode($json));

mysqli_close($db_connect);
?>