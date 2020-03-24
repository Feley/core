<?php
require_once _DIR_.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$name = $request->get('name', 'Netesy');

$response = new Response(sprintf('Hello %s', $name);
$response->send();
?>