<?php
/**
 * @file
 * Contains \Drupal\example_events\ExampleEventSubscriber.
 */
namespace Drupal\example_events\EventSubscriber;
use Drupal\Core\Config\ConfigCrudEvent;
use Drupal\Core\Config\ConfigEvents;
use Drupal\example_events\Event\ExampleEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
/**
 * Class ExampleEventSubscriber.
 *
 * @package Drupal\example_events
 */
class ExampleEventSubscriber implements EventSubscriberInterface {
  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    return
      [ConfigEvents::SAVE => ['savingConfig', 800],
       ExampleEvent::SUBMIT => array('executeAction', 800)
      ];
  }
  /**
   * Subscriber Callback for the event.
   * @param ExampleEvent $event
   */
  public function executeAction(ExampleEvent $event) {
    \Drupal::messenger()->addStatus(t("Vous avez souscrit à l'événement ExampleEvent qui a été dispatché lors de l'enregistrement du formulaire avec " . $event->getReferenceID() . " comme référence "));
  }
  /**
   * Subscriber Callback for the event.
   * @param ConfigCrudEvent $event
   */
  public function savingConfig(ConfigCrudEvent $event) {
    \Drupal::messenger()->addStatus(t("La configuration " . $event->getConfig()->getName() . " a été sauvegardée"));
  }
}
