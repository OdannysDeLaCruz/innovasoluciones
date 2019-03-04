<?php
require __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../bootstrap/app.php';


// session()->forget('cart');

$cart = session('cart');

// $value = Session::get('key');

// Request
// function del() {
// 	$value = $request->session()->get('key');
// 	echo $value;

// }

// del();