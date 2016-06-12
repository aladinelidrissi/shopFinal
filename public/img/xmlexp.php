<?php
// setting up PDO
$dbLocation = 'mysql:dbname=shop;host=localhost';
$dbUser = 'root';
$dbPass = '';
$db = new PDO($dbLocation, $dbUser, $dbPass);

// prepare all queries...
$dbProducts = $db->prepare("SELECT * FROM products");


// fetch all products
$dbProducts->execute();
$products=$dbProducts->fetchAll(PDO::FETCH_ASSOC);


$x=new XMLWriter();
$x->openMemory();
$x->startDocument('1.0','UTF-8');
$x->startElement('product');

foreach ($products as $product) {

    $x->startElement('name');
    $x->writeAttribute('name',$product['name']);

    $x->startElement('description');
    $x->writeAttribute('description',$product['description']);

    $x->startElement('price');
    $x->writeAttribute('price',$product['price']);

    $x->startElement('file_url');
    $x->writeAttribute('file_url',$product['file_url']);

    $x->endElement(); // product
} // foreach $products

$x->endElement(); // product
$x->endDocument();
$xml = $x->outputMemory();
