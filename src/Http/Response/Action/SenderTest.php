<?php
declare(strict_types=1);

use Funivan\CustomersRest\Http\Response\Action\Sender;
use Funivan\CustomersRest\Http\Response\Body\PredefinedBody;
use Funivan\CustomersRest\Http\Response\PredefinedResponse;
use Funivan\CustomersRest\Http\Response\Status\PredefinedStatus;

return function (): Generator {
    yield 'Response should be valid json' => function () {
        ob_start();
        (new Sender())->execute(
            new PredefinedResponse(
                new PredefinedStatus(200, 'Ok'),
                new PredefinedBody(['test' => '123'])
            )
        );
        $result = ob_get_clean();
        return preg_replace('![\s\n]!', '', $result) === '{"test":"123"}';
    };
};
