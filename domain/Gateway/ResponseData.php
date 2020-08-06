<?php

namespace Domain\Gateway;

use Psr\Http\Message\ResponseInterface;

class ResponseData
{
    private ResponseInterface $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    /**
     * @return \stdClass[]|array
     */
    public function getDecodedResponseContent(): array
    {
        return json_decode($this->response->getBody()->getContents());
    }
}
