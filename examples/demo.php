<?php

use MapCoordinates\Map\Point;
use MapCoordinates\Map\Polygone;
use MapCoordinates\Map\Segment;

require_once '../class/Point.php';
require_once '../class/Segment.php';
require_once '../class/Polygone.php';

$poly1 = new Polygone([
  Point::gm(46.69488180413321, -1.451045828610618), 
  Point::gm(46.69676560615525, -1.4472907362060705),
  Point::gm(46.68849404874383, -1.4396518053716765),
  Point::gm(46.6876403283518, -1.4443295776241987),
]);
$poly2 = new Polygone([
  Point::gm(46.698075982209524, -1.443450625029157),
  Point::gm(46.69944502074807, -1.435623554336536),
  Point::gm(46.695499934014826, -1.428531913104967),
  Point::gm(46.692923762927926, -1.439510824344952),
]);
$poly3 = new Polygone([
  Point::gm(46.70092210242916, -1.4539830259304005),
  Point::gm(46.70284945301629, -1.4502533479493533),
  Point::gm(46.69982330167494, -1.4525384323461923),
]);

$segment = new Segment(Point::gm(46.68856861790532, -1.4589775899554707),Point::gm(46.707594274746306, -1.4509381303205058));
?>
<ul>
  <li>Le polygone 1 <?php $poly1->isSecantWithSegment($segment) ? "est" : "n'est pas" ?> sécant avec notre segment</li>
  <li>Le polygone 2 <?php $poly2->isSecantWithSegment($segment) ? "est" : "n'est pas" ?> sécant avec notre segment</li>
  <li>Le polygone 3 <?php $poly3->isSecantWithSegment($segment) ? "est" : "n'est pas" ?> sécant avec notre segment</li>
</ul>