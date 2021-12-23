<!-- Урок1 -->

<!-- Задание 1.
Установить программное обеспечение: веб-сервер, базу данных, интерпретатор, текстовый редактор. Проверить, что все работает правильно. -->

<!-- Установил openserver. локальный домен настроил. -->

<!-- Задание 2.
Выполнить примеры из методички и разобраться, как это работает. -->

<!-- Выполнил, работает :) -->

<!-- Задание 3.
Объяснить, как работает данный код: -->

<?php
    $a = 5;
    $b = '05';
    var_dump($a == $b);         // Почему true?
    // сравнение по значению, из строки берётся число, 5 = 5
    var_dump((int)'012345');     // Почему 12345?
    // строку приводим к числовому значению, 0 отсекается
    var_dump((float)123.0 === (int)123.0); // Почему false?
    // явноесравние не только по значению но и по типы, типы разные
    var_dump((int)0 === (int)'hello, world'); // Почему true?
    // преведение строки в которой нет чисел к числу даёт в результате 0, типы и значения равны
?>

<!-- Задание 4.
Используя имеющийся HTML-шаблон, сделать так, чтобы главная страница генерировалась через PHP. 
Создать блок переменных в начале страницы. Сделать так, чтобы h1, title и текущий год генерировались в блоке контента из созданных переменных. -->
<?php
  $h1 = 'h1';
  $title = 'title';
  $year = date('Y');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>
</head>
<body>
  <br>
  <h1><?php echo $h1; ?></h1>
  <br>
  <span><?php echo $year; ?></span>
  <br>
</body>
</html>

<!-- Задание 5.
*Используя только две переменные, поменяйте их значение местами. 
Например, если a = 1, b = 2, надо, чтобы получилось b = 1, a = 2. 
Дополнительные переменные использовать нельзя. -->
<?php
  $a = 1;
  $b = 2;
  $a+=+$b-$b=$a;
  echo "a = $a ";
  echo "b = $b ";
?>
<!-- Первое что выдал гугл по данному решению :) -->