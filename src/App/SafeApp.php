<?php

namespace Funivan\CustomersRest\App;

use Funivan\CustomersRest\App\Response\Error\ErrorBody;
use Funivan\CustomersRest\App\Response\Error\ServerErrorResponse;
use Funivan\CustomersRest\Http\Handler\Handler;
use Funivan\CustomersRest\Http\Parameters\InvalidParameter;
use Funivan\CustomersRest\Http\Request\ServerRequest;
use Funivan\CustomersRest\Http\Response\PredefinedResponse;
use Funivan\CustomersRest\Http\Response\Response;
use Funivan\CustomersRest\Http\Response\Status\PredefinedStatus;

/**
 * Decorator pattern
 */
class SafeApp implements Handler
{
    /**
     * @var Handler
     */
    private $origin;

    public function __construct(Handler $origin)
    {
        $this->origin = $origin;
    }

    final public function handle(ServerRequest $request): Response
    {
        try {
            return $this->origin->handle($request);
        } catch (InvalidParameter $exception) {
            return new PredefinedResponse(
                new PredefinedStatus(400, 'Bad Request'),
                new ErrorBody(
                    $exception->getMessage()
                )
            );
        } catch (\Exception $exception) {
            return new ServerErrorResponse($exception);
        }
    }
}