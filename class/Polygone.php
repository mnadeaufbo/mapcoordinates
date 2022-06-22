<?php

namespace Sidunis\MapCoordinates;

class Polygone
{
  private array $points;
  private array $segments;

  /**
   * Constructeur
   * @param Point[] $points 
   * @return void 
   */
  function __construct(array $points)
  {
    $this->points = $points;
    $this->segments = $this->createSegments();
  }

  /**
   * Créé les segments entre les points
   * @return Segment[] 
   */
  public function createSegments(): array
  {
    $segments = [];
    for ($i = 0; $i < count($this->points); $i++) {
      $segments[] = new Segment($this->points[$i], $this->points[($i + 1) % count($this->points)]);
    }
    return $segments;
  }

  /**
   * Vérifie si le point est sécant avec le polygone
   * @param Segment $segment 
   * @return bool 
   */
  public function isSecantWithSegment(Segment $segment): bool
  {
    foreach ($this->segments as $segment2) {
      if ($segment->isSecantWith($segment2)) {
        return true;
      }
    }
    return false;
  }
}