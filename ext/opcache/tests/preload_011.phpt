--TEST--
Argument/return types must be available for preloading
--INI--
opcache.enable=1
opcache.enable_cli=1
opcache.optimization_level=-1
opcache.preload={PWD}/preload_variance_ind.inc
--SKIPIF--
<?php require_once('skipif.inc'); ?>
--FILE--
<?php
interface K {}
interface L extends K {}
require __DIR__ . '/preload_variance.inc';

$a = new A;
$b = new B;
$d = new D;
$f = new F;
$g = new G;

?>
===DONE===
--EXPECTF--
Warning: Can't preload unlinked class H in %s on line %d

Warning: Can't preload unlinked class B in %s on line %d

Warning: Can't preload unlinked class A in %s on line %d
===DONE===
