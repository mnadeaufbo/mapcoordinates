<?php

namespace MapCoordinates\Map;

class Point
{
  private float $x;
  private float $y;

  /**
   * Constructeur
   * @param float $x 
   * @param float $y 
   * @return void 
   */
  public function __construct(float $x, float $y)
  {
    $this->x = $x;
    $this->y = $y;
  }

  /**
   * Pour créer un objet avec les coordonnées dans le même ordre qu'elles sont indiquées sur Gmaps
   */
  public static function gm(float $y, float $x) {
    return new Point($x, $y);
  }

  /**
   * Get the value of x
   */ 
  public function getX()
  {
    return $this->x;
  }

  /**
   * Get the value of y
   */ 
  public function getY()
  {
    return $this->y;
  }
}
