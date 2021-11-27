<!-- Урок 2. -->

<!-- Задание 1.
Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. 
Затем написать скрипт, который работает по следующему принципу:
Если $a и $b положительные, вывести их разность.
Если $а и $b отрицательные, вывести их произведение.
Если $а и $b разных знаков, вывести их сумму.
Ноль можно считать положительным числом. -->

<?php
echo '<br> Задание 1. <br>';
$a = 3;
$b = -5;

if ($a >= 0 && $b >= 0)
  echo $a - $b;
else if ($a < 0 && $b < 0)
  echo $a * $b;
else
  echo $a + $b;
echo '<br>';
?>

<!-- Задание 2.
Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора
switch организовать вывод чисел от $a до 15. -->

<?php
echo '<br> Задание 2. <br>';
$a = 5;
switch ($a) {
  case '0':
    echo '0, ';
  case '1':
    echo '1, ';
  case '2':
    echo '2, ';
  case '3':
    echo '3, ';
  case '4':
    echo '4, ';
  case '5':
    echo '5, ';
  case '6':
    echo '6, ';
  case '7':
    echo '7, ';
  case '8':
    echo '8, ';
  case '9':
    echo '9, ';
  case '10':
    echo '10, ';
  case '11':
    echo '11, ';
  case '12':
    echo '12, ';
  case '13':
    echo '13, ';
  case '14':
    echo '14, ';
  case '15':
    echo '15';
}
echo '<br>';
?>

<!-- Задание 3.
Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. 
Обязательно использовать оператор return. -->

<?php
echo '<br> Задание 3. <br>';
$a = 3;
$b = 5;

function sum($arg1, $arg2) {
  return $arg1 + $arg2;
}

function sub($arg1, $arg2) {
  return $arg1 - $arg2;
}

function mul($arg1, $arg2) {
  return $arg1 * $arg2;
}

function div($arg1, $arg2) {
  return $arg1 / $arg2;
}

echo 'sum = ' . sum($a,$b) . '<br>';
echo 'sub = ' . sub($a,$b) . '<br>';
echo 'mul = ' . mul($a,$b) . '<br>';
echo 'div = ' . div($a,$b) . '<br>';
?>

<!-- Задание 4.
Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), 
где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. 
В зависимости от переданного значения операции выполнить одну из арифметических операций 
(использовать функции из пункта 3) и вернуть полученное значение (использовать switch). -->

<?php
echo '<br> Задание 4. <br>';

function mathOperation($arg1, $arg2, $operation) {
  switch ($operation) {
    case 'sum':
      return sum($arg1,$arg2);
      break;
    case 'sub':
      return sub($arg1,$arg2);
      break;
    case 'mul':
      return mul($arg1,$arg2);
      break;
    case 'div':
      return div($arg1,$arg2);
      break;
  }
}

echo 'sum = ' . mathOperation($a,$b,'sum') . '<br>';
echo 'sub = ' . mathOperation($a,$b,'sub') . '<br>';
echo 'mul = ' . mathOperation($a,$b,'mul') . '<br>';
echo 'div = ' . mathOperation($a,$b,'div') . '<br>';
?>

<!-- Задание 5.
Посмотреть на встроенные функции PHP. 
Используя имеющийся HTML шаблон, вывести текущий год в подвале при помощи встроенных функций PHP. -->

<?php
echo '<br> Задание 5. <br>';
echo date('Y');
echo '<br>';
?>

<!-- Задание 6.
*С помощью рекурсии организовать функцию возведения числа в степень. 
Формат: function power($val, $pow), где $val – заданное число, $pow – степень. -->

<?php
echo '<br> Задание 6. <br>';

$a = 3;
$b = 5;

function power($val, $pow) {
  if ($pow <= 1)
    return $val;
  return $val *= power($val, $pow - 1);
}

echo power($a,$b);

echo '<br>';
?>

<!-- Задание 7.
Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, 
например: 22 часа 15 минут, 21 час 43 минуты. -->

<?php
echo '<br> Задание 7. <br>';

function rightTime() {
  $hour = (int)strftime("%H");
  $minute = (int)strftime("%M");
  $second = (int)strftime("%S");

  $hour_str = match ($hour) { // сделал через match, работает только на php 8+
    1, 21 => 'час',
    2, 3, 4, 22, 23, 24 => 'часа',
    default => 'часов'
  };

  $minute_str = match ($minute) {
    1, 21, 31, 41, 51 => 'минута',
    2, 3, 4, 22, 23, 24, 32, 33, 34, 42, 43, 44, 52, 53, 54 => 'минуты',
    default => 'минут'
  };

  $second_str = match ($second) {
    1, 21, 31, 41, 51 => 'секунда',
    2, 3, 4, 22, 23, 24, 32, 33, 34, 42, 43, 44, 52, 53, 54 => 'секунды',
    default => 'секунд'
  };

  echo "$hour $hour_str $minute $minute_str $second $second_str";
}

rightTime();

echo '<br>';
?>