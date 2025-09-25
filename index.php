<?php
require __DIR__ . '/vendor/autoload.php';
use App\ReverseWords;

$input = $_GET['q'] ?? 'Cat';
echo ReverseWords::transform($input);