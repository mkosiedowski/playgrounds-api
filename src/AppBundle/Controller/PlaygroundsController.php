<?php

namespace AppBundle\Controller;

use AppBundle\DTO\Playground\CreatePlaygroundRequest;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcher;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Playgrounds\Domain\Playground;
use Playgrounds\Domain\UseCase\AddPlayground;
use Playgrounds\Domain\UseCase\GetPlaygrounds;

class PlaygroundsController extends RestController implements GetPlaygrounds\Responder, AddPlayground\Responder
{
    /** @var Playground[] */
    private $playgrounds;

    /** @var Playground */
    private $playground;

    /**
     * @ApiDoc()
     * @Rest\QueryParam(name="limit", default="10", requirements="^(10|20|50|100)$")
     * @Rest\QueryParam(name="page", default="0", requirements="^\d*$")
     * @Rest\Get("/playgrounds", name="homepage")
     */
    public function getPlaygroundsAction(ParamFetcher $fetcher)
    {
        // replace this example code with whatever you need
        $this->get('Playgrounds\Domain\UseCase\GetPlaygrounds')->execute(
            new GetPlaygrounds\Command($fetcher->get('page'), $fetcher->get('limit')),
            $this
        );

        return $this->handleView($this->view($this->playgrounds));
    }

    /**
     * @Rest\Post("/playgrounds")
     * @ApiDoc(
     *     input={"class" = "AppBundle\DTO\Playground\CreatePlaygroundRequest"},
     *     output={"class" = "AppBundle\DTO\Playground\CreatePlaygroundResponse"}
     * )
     * @param CreatePlaygroundRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function postPlaygroundAction(CreatePlaygroundRequest $request)
    {
        $this->get('Playgrounds\Domain\UseCase\AddPlayground')->execute(
            new AddPlayground\Command(
                $request->name,
                $request->location,
                $request->description,
                $request->features,
                $request->openingHours,
                $this->getUserInformation()
            ),
            $this
        );

        return $this->handleView($this->view($this->playground, 201));
    }

    /**
     * @inheritDoc
     */
    public function playgroundsFound(array $playgrounds): void
    {
        $this->playgrounds = $playgrounds;
    }

    /**
     * @inheritDoc
     */
    public function playgroundCreated(Playground $playground): void
    {
        $this->playground = $playground;
    }
}
