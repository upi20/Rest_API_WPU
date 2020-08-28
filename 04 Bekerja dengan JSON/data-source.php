<?php
define('baseUrl', 'https://www.themealdb.com/api/json/v1/1');

function getRandomCategory()
{
	$categiories = getCategories();
	$numb = rand(0,sizeof($categiories)-1);
	return $categiories[$numb]["strCategory"];
}

function getCategories(){
	$categiory = json_decode(file_get_contents(baseUrl . '/categories.php'), true);
	return $categiory["categories"];
}

function getRandomData(){
	$data = json_decode(file_get_contents(baseUrl . '/filter.php?c=' . getRandomCategory()), true);
	$meals = json_encode($data);
	return $meals;
}

function getDataByCategory($category){
	$data = json_decode(file_get_contents(baseUrl . '/filter.php?c=' . $category), true);
	$meals = json_encode($data);
	return $meals;
}

function getAllData(){
	$categiories = getCategories();
	$data['meals'] = [];
	foreach ($categiories as $category) {
		$gets = json_decode(getDataByCategory($category['strCategory']), true);
		$get = $gets['meals'];
		foreach ($get as $g) {
		    array_push($data['meals'], $g);
		}
	}
	return json_encode($data);
}

function notFound(){
	$data = [
		"error" => true,
		"messsage" => "404 Not Found",
		"status" => 404
	];
	return json_encode($data);
}


if (isset($_GET["data"])) {
	switch ($_GET["data"]) {
		case 'meals':
			echo getRandomData();
			break;
		
		case 'randomcategories':
			echo getRandomCategory();
			break;

		case 'category':
			if (isset($_GET["c"])) {
				echo getDataByCategory($_GET["c"]);
			} else {
				echo notFound();
			}
			break;

		case 'all':
			echo getAllData();
			break;

		default:
			echo notFound();
			break;
	}
} else {
	$html = '
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Data Source</title>
			<link rel="stylesheet" href="">
		</head>
		<body>
			<h1>Data Source Meal</h1>
				<h2>Get Data Random By Category</h2>
					<p>http://localhost/aplikasi/Rest_API_WPU/04%20Bekerja%20dengan%20JSON/data-source.php?data=meals</p>
				<h2>Get Random Categories</h2>
					<p>http://localhost/aplikasi/Rest_API_WPU/04%20Bekerja%20dengan%20JSON/data-source.php?data=randomcategories</p>
				<h2>Get Data By Categories</h2>
					<p>http://localhost/aplikasi/Rest_API_WPU/04%20Bekerja%20dengan%20JSON/data-source.php?data=category&c={category name}</p>
				<h2>Get All Data</h2>
					<p>http://localhost/aplikasi/Rest_API_WPU/04%20Bekerja%20dengan%20JSON/data-source.php?data=all</p>
		</body>
		</html>
	';
	echo $html;
}
?>
