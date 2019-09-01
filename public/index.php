<?php /** @noinspection GlobalVariableUsageInspection */
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

use Funivan\CustomersRest\App\Endpoint\Create\CreateCustomers;
use Funivan\CustomersRest\App\Endpoint\Delete\DeleteCustomers;
use Funivan\CustomersRest\App\Endpoint\ListCustomers\ListCustomers;
use Funivan\CustomersRest\App\Endpoint\Update\UpdateCustomers;
use Funivan\CustomersRest\App\Repository\CustomersDbRepository;
use Funivan\CustomersRest\App\Response\Error\NotFoundResponse;
use Funivan\CustomersRest\App\SafeApp;
use Funivan\CustomersRest\Http\Parameters\Parameters;
use Funivan\CustomersRest\Http\Request\ServerRequest;
use Funivan\CustomersRest\Http\Response\Action\Sender;
use Funivan\CustomersRest\Router\MethodRoute;
use Funivan\CustomersRest\Router\PathRoute;
use Funivan\CustomersRest\Router\Router;

require __DIR__ . '/../vendor/autoload.php';
$request = new ServerRequest(
    new Parameters($_GET),
    new Parameters($_POST),
    new Parameters($_SERVER)
);
$repository = new CustomersDbRepository(new PDO('dsn'));
$sender = new Sender();
$app = new SafeApp(
    new Router(
        [
            new PathRoute(
                '/v1/customers/',
                new Router(
                    [
                        new MethodRoute('GET', new ListCustomers($repository)),
                        new MethodRoute('POST', new CreateCustomers()),
                        new MethodRoute('DELETE', new DeleteCustomers()),
                        new MethodRoute('PUT', new UpdateCustomers())
                    ],
                    new NotFoundResponse('Unsupported method')
                )
            )
        ],
        new NotFoundResponse('Unsupported endpoint')
    )
);
$sender->execute(
    $app->handle($request)
);