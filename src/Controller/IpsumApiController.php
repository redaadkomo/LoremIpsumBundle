<?php

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IpsumApiController extends AbstractController {

    private $knpUIpsum;
    private $eventDispatcher;

    public function __construct(KnpUIpsum $knpUIpsum, EventDispatcherInterface $eventDispatcher) {
        $this->knpUIpsum = $knpUIpsum;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function index() {

        $event = new FilterApiResponseEvent($data);
        $this->eventDispatcher->dispatch('knpu_lorem_ipsum.filter_api', $event);

        return $this->json($event->getData());
    }

}
