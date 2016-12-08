<?php
require_once('../vendor/autoload.php');
require_once('classes/ParsingNews.php');

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

$newses = classes\ParsingNews::get_instance()->get_newses();
echo $twig->render('index.html', array('newses' => $newses));