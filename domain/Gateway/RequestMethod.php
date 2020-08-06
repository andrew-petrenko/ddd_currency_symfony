<?php

namespace Domain\Gateway;

use Domain\Utils\AbstractEnum;

/**
 * @method static RequestMethod get()
 * @method static RequestMethod post()
 * @method static RequestMethod put()
 * @method static RequestMethod patch()
 * @method static RequestMethod delete()
 */
final class RequestMethod extends AbstractEnum
{
    protected const GET = 'GET';
    protected const POST = 'POST';
    protected const PUT = 'PUT';
    protected const PATCH = 'PATCH';
    protected const DELETE = 'DELETE';
}
