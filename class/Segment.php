<?php

namespace MapCoordinates\Map;

class Segment
{
  private Point $start;
  private Point $end;
  private float $a;
  private float $b;
  private string $typeEquation;

  /**
   * Constructeur
   * @param Point $start 
   * @param Point $end 
   * @return void 
   */
  public function __construct(Point $start, Point $end)
  {
    $this->start = $start;
    $this->end = $end;
    $this->calculateEquation();
  }

  /**
   * Calcule l'équation et la stocke dans l'objet
   * @return void 
   */
  public function calculateEquation()
  {
    $divided = $this->end->getY() - $this->start->getY();
    $divisor = $this->end->getX() - $this->start->getX();
    
    $this->a = $divisor != 0 ? $divided / $divisor : 0;
    $this->b = $divisor != 0 ? $this->start->getY() - $this->a * $this->start->getX() : $this->start->getX();
    $this->typeEquation = $divisor != 0 ? 'y' : 'x';
  }

  /**
   * Vérifie si ce segment est sécant avec le segment en paramètre
   * @param Segment $segment 
   * @return bool 
   */
  public function isSecantWith(Segment $segment)
  {
    if ($this->a == $segment->a) {
      return false;
    }
    if ($this->typeEquation == 'y') {
      $x = ($segment->getB() - $this->b) / ($this->a - $segment->getA());
      $y = $this->a * $x + $this->b;
    }else{
      $y = ($segment->getB() - $this->b) / ($this->a - $segment->getA());
      $x = $this->a * $y + $this->b;
    }
    $point = new Point($x, $y);
    return $this->isPointInSegment($point) && $segment->isPointInSegment($point);
  }

  /**
   * Vérifie si le point est dans le segment
   * @param Point $point 
   * @return bool 
   */
  public function isPointInSegment(Point $point)
  {
    $minX = min($this->start->getX(), $this->end->getX());
    $maxX = max($this->start->getX(), $this->end->getX());
    $minY = min($this->start->getY(), $this->end->getY());
    $maxY = max($this->start->getY(), $this->end->getY());
    return $point->getX() >= $minX && $point->getX() <= $maxX && $point->getY() >= $minY && $point->getY() <= $maxY;
  }

  /**
   * Get the value of typeEquation
   */ 
  public function getTypeEquation()
  {
    return $this->typeEquation;
  }

  /**
   * Get the value of b
   */ 
  public function getB()
  {
    return $this->b;
  }

  /**
   * Get the value of a
   */ 
  public function getA()
  {
    return $this->a;
  }

  /**
   * Get the value of end
   */ 
  public function getEnd()
  {
    return $this->end;
  }

  /**
   * Get the value of start
   */ 
  public function getStart()
  {
    return $this->start;
  }
}