<?php

namespace Domain\Gateway;

use Psr\Http\Message\ResponseInterface;

class ResponseData
{
    /**
     * @var ResponseInterface
     */
    private $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    public function getDecodedResponse(): array
    {
        return json_decode($this->response->getBody()->getContents());
    }
}
