<?php
try {
  $filename = 'files/bases.xml';
  $doc = new DOMDocument;

  if (!file_exists($filename)) {
    throw new Exception("Arquivo {$filename} não encontrado.<br>".PHP_EOL);
  }

  if (!is_readable($filename)) {
    throw new Exception("Arquivo {$filename} sem permissão de leitura.<br>" . PHP_EOL);
  }

  if (!$doc->load($filename)){
    throw new Exception("Não foi possível fazer a carga no arquivo: {$filename}.<br>" . PHP_EOL);
  }

  $bases = $doc->getElementsByTagName('base');

  foreach ($bases as $base) {
    print "ID: " . $base->getAttribute('id') . "<br>" . PHP_EOL;

    $names =  $base->getElementsByTagName('name');
    $hosts =  $base->getElementsByTagName('host');
    $types =  $base->getElementsByTagName('type');
    $users =  $base->getElementsByTagName('user');

    $name = $names->item(0)->nodeValue;
    $host = $hosts->item(0)->nodeValue;
    $type = $types->item(0)->nodeValue;
    $user = $users->item(0)->nodeValue;

    print "Name: $name <br>".PHP_EOL;
    print "Host: $host <br>".PHP_EOL;
    print "Type: $type <br>".PHP_EOL;
    print "User: $user <br>".PHP_EOL;
    print "<br>".PHP_EOL;
  }
} catch (Exception $e) {
  print $e->getMessage();
}



