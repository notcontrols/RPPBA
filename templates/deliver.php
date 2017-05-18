<?php 

$backurl=$_SERVER['login.php'];  // На какую страничку переходит после отправки письма 

// ----------------------------конфигурация-------------------------- // 
 
$subEmail=$email;  // e-mail подписчика
 
$date=date("d.m.y"); // число.месяц.год 
 
$time=date("H:i"); // часы:минуты:секунды 
 
//---------------------------------------------------------------------- // 
 
// Принимаем данные с формы 
 
$name="магазин авто"; 
 
$msg=$_POST['message']; 
 
$msg=" 

Дата: $date $time 
 
Имя: $name
 
Сообщение: $msg
 
"; 
 
  
 
 // Отправляем письмо
 
mail("$subEmail", "$date $time Сообщение 
от $name", "$msg"); 
 
  
 
// Сохраняем в базу данных 
 
$f = fopen("message.txt", "a+"); 

fwrite($f," \n Кому послано: $subEmail"); 
 
fwrite($f," \n $date $time Сообщение от $name"); 
 
fwrite($f,"\n $msg "); 
 
fwrite($f,"\n ---------------"); 
 
fclose($f); 
 
  
 
// Выводим сообщение пользователю 
 
/*print "<script language='Javascript'><!-- 
function reload() {location = \"$backurl\"}; setTimeout('reload()', 6000); 
//--></script> 
 
$msg 
 
<div><div><p style='font:20px;text-align:center;'>Сообщение отправлено! Подождите, сейчас вы будете перенаправлены обратно...</p>";  
exit; */
 
?>