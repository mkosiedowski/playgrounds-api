<?php

namespace AppBundle\Controller;

use Playgrounds\Domain\Playground;
use Playgrounds\Domain\UseCase\GetPlaygrounds;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PlaygroundsController extends RestController implements GetPlaygrounds\Responder
{
    /** @var Playground[] */
    private $playgrounds;

    /**
     * @Route("/playgrounds", name="homepage")
     */
    public function indexAction()
    {
        // replace this example code with whatever you need
        $this->get('Playgrounds\Domain\UseCase\GetPlaygrounds')->execute(new GetPlaygrounds\Command(), $this);
        return $this->handleView($this->view($this->playgrounds));
    }

    /**
     * @inheritDoc
     */
    public function playgroundsFound(array $playgrounds): void
    {
        $this->playgrounds = $playgrounds;
    }
}
