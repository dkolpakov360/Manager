<?php

/*

1. Все на своих местах

a. Создайте класс Manager - он будет расставлять объекты по местам. класс содержит только один
метод place($item).

■ Если в этот метод передан объект типа Бумажный, то метод должен вывести строку:
'Положил <Имя класса> на стол'

■ Если в этот метод передан объект типа Инструмент, то метод должен вывести строку:
'Убрал <Имя класса> внутрь стола'

■ Если в этот метод передано что-то другое, то метод должен вывести строку:
'Выкинул <Имя класса, если объект, либо переданное значение> в корзину'

■ внутри <> - нужно подставить то, что требуется, например: 'Положил Document на стол'

b. Создайте два абстрактных класса Papers (Бумажный) и Instrument (Инструмент)

c. Создайте Менеджера, и передайте ему не менее 5-ти различных $item’ов, так чтобы хотя-бы по
одному разу было выведено каждое из сообщений.

*/

spl_autoload_register(function($class) {

	// Префикс пространства имен
	$prefix = 'Manager\\';

	$base_dir = __DIR__ . '/Manager/';

	// Использует ли класс префикс пространства имен?
	$len = strlen($prefix);

	if (strncmp($prefix, $class, $len) !== 0) {
		//нет, переходим к следующему зарегистрированному автоподгрузчику
		return;
	}

	//Получаем относительное имя класса
	$relative_class = substr($class, $len);

	//Создаем имя файла
	$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

	// если файл существует, подключаем его
	if (file_exists($file)) {
		require $file;
	}

});

$manager = new \Manager\Manager;
$manager->place(new \Manager\Document);
$manager->place(new \Manager\Book);
$manager->place(new \Manager\Hammer);
$manager->place(new \Manager\Screw);
$manager->place(new \Manager\Laptop);
