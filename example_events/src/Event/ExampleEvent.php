<?php

namespace Drupal\example_events\Event;

use Symfony\Component\EventDispatcher\Event;

class ExampleEvent extends Event
{
  const SUBMIT = 'event.submit';
  protected $referenceID;

  public function __construct($referenceID)
  {
    $this->referenceID = $referenceID;
  }

  public function getReferenceID()
  {
    return $this->referenceID;
  }

  public function myEventDescription()
  {
    return "Ceci est un exemple d'événement.";
  }
}
