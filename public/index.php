<?php /** @noinspection GlobalVariableUsageInspection */
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

use Funivan\CustomersRest\App\App;
use Funivan\CustomersRest\App\Endpoint\Create\CreateCustomers;
use Funivan\CustomersRest\App\Endpoint\Delete\DeleteCustomers;
use Funivan\CustomersRest\App\Endpoint\ListCustomers\ListCustomers;
use Funivan\CustomersRest\App\Endpoint\Update\UpdateCustomers;
use Funivan\CustomersRest\App\Repository\Db\CustomersDbRepository;
use Funivan\CustomersRest\App\Repository\Db\Db;
use Funivan\CustomersRest\App\Response\Error\NotFoundResponse;
use Funivan\CustomersRest\App\SafeHandler;
use Funivan\CustomersRest\Format\JsonFormat;
use Funivan\CustomersRest\Http\Request\ServerRequest;
use Funivan\CustomersRest\Router\MethodRoute;
use Funivan\CustomersRest\Router\PathRoute;
use Funivan\CustomersRest\Router\Router;
use Funivan\CustomersRest\Spl\ArrayObject\ParametersFromEnvironmentFile;
use Funivan\CustomersRest\Spl\ArrayObject\PredefinedArray;

require __DIR__ . '/../vendor/autoload.php';
$repository = new CustomersDbRepository(
    new Db(
        new ParametersFromEnvironmentFile(__DIR__ . '/../variables.env')
    )
);
$app = new App(
    new JsonFormat(),
    new SafeHandler(
        new Router(
            [
                new PathRoute(
                    '/v1/customers/',
                    new Router(
                        [
                            new MethodRoute('GET', new ListCustomers($repository, '/v1/customers/')),
                            new MethodRoute('POST', new CreateCustomers($repository)),
                            new MethodRoute('DELETE', new DeleteCustomers($repository)),
                            new MethodRoute('PUT', new UpdateCustomers($repository))
                        ],
                        new NotFoundResponse('Unsupported method')
                    )
                )
            ],
            new NotFoundResponse('Unsupported endpoint')
        )
    )
);
$app->execute(
    new ServerRequest(
        new PredefinedArray($_GET),
        new PredefinedArray($_POST),
        new PredefinedArray($_SERVER)
    )
);