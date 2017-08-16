<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Context\Context;
use FOS\RestBundle\Controller\FOSRestController;
use Playgrounds\Domain\LogInfo;

abstract class RestController extends FOSRestController
{
    /**
     * @param string[] $errorList
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function handleValidationError($errorList)
    {
        $data = [
            'code' => 400,
            'message' => 'Validation failed',
            'errors' => $errorList
        ];

        return $this->handleView($this->view($data, 400));
    }

    /**
     * @param string $errorMessage
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function handleSecurityViolation($errorMessage)
    {
        $data = [
            'code' => 403,
            'message' => 'Forbidden',
            'details' => $errorMessage,
        ];

        return $this->handleView($this->view($data, 403));
    }

    /**
     * @param string $errorMessage
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function handleGone($errorMessage)
    {
        $data = [
            'code' => 410,
            'message' => 'Gone',
            'details' => $errorMessage,
        ];

        return $this->handleView($this->view($data, 410));
    }

    /**
     * @param string $errorMessage
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function handleDuplicateError($errorMessage)
    {
        $data = [
            'code' => 409,
            'message' => 'Conflict',
            'details' => $errorMessage,
        ];

        return $this->handleView($this->view($data, 409));
    }

    /**
     * @param string $errorMessage
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function handleBadRequest($errorMessage)
    {
        $data = [
            'code' => 400,
            'message' => 'Bad Request',
            'details' => $errorMessage
        ];

        return $this->handleView($this->view($data, 400));
    }

    /**
     * @param string $message
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function handleCreated(string $message = 'CREATED')
    {
        $data = [
            'code' => 201,
            'message' => 'Created',
            'details' => $message
        ];

        return $this->handleView($this->view($data, 201));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function handleIdChangeError()
    {
        return $this->handleBadRequest('Id of the object cannot be changed');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function handleOk()
    {
        $data = [
            'code' => 200,
            'message' => 'OK',
        ];

        return $this->handleView($this->view($data, 200));
    }

    protected function handleNotFound()
    {
        $data = [
            'code' => 404,
            'message' => 'Not found',
        ];

        return $this->handleView($this->view($data, 404));
    }

    /**
     * @param string $message
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function handleInternalError($message = 'Internal server error')
    {
        $data = [
            'code' => 500,
            'message' => $message,
        ];

        return $this->handleView($this->view($data, 500));
    }

    /**
     * @inheritDoc
     */
    protected function view($data = null, $statusCode = null, array $headers = [])
    {
        $view = parent::view($data, $statusCode, $headers);
        $context = new Context();
        $context->enableMaxDepth();
        $view->setContext($context);

        return $view;
    }

    /**
     * @return UserInformation
     */
    protected function getUserInformation(): UserInformation
    {
        /** @var User $user */
        $user = $this->getUser();
        $userName = $user ? $user->getUsername() : '';
        $ip = $this->container->get('request_stack')->getCurrentRequest()->getClientIp();

        return new LogInfo($ip, $userName);
    }
}
