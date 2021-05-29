<?php
// параметры подключения к бд
$db_host = "localhost";
$db_name = "diana";
$db_user = "root";
$db_pass = "root";

// количество новостей на странице
$tek=$_GET["tek"];

// счетчик для загрузки новостей из бд
$count=0;

// соединение с бд
$db = mysqli_connect ($db_host, $db_user, $db_pass, $db_name) or die ("Невозможно подключиться к БД");
mysqli_query ($db, "SET NAMES utf8"); // задаем кодировку данных
 
// Получаем первые 10 статей, которые будут видны изначально
$res = mysqli_query($db, "SELECT * FROM zadanie ORDER BY id");
 
// Формируем массив из статей
$arPosts = array();
if ($res){
    while($row = mysqli_fetch_assoc($res)){
        $arPosts[] = $row;
    }   
}

foreach ($arPosts as $article): 
    $count++;
     echo '<h3>'.$article['title'].'</h3>';
      echo '<p>'.$article['text'].'</p>';
      echo '<img src="'.$article['img'].'"><br>';
      if($count==$tek)break;
     endforeach; 
?>