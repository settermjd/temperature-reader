<?php

declare(strict_types=1);

namespace AppTest\Handler;

use App\Handler\HomePageHandler;
use App\Service\Database;
use Laminas\Diactoros\Response\HtmlResponse;
use Laminas\Diactoros\Response\JsonResponse;
use Mezzio\Router\RouterInterface;
use Mezzio\Template\TemplateRendererInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;

use function get_class;

class HomePageHandlerTest extends TestCase
{
    use ProphecyTrait;

    /** @var ContainerInterface|ObjectProphecy */
    protected $container;

    protected function setUp(): void
    {
        $this->container = $this->prophesize(ContainerInterface::class);
    }

    public function testReturnsHtmlResponseWhenTemplateRendererProvided()
    {
        /** @var TemplateRendererInterface|ObjectProphecy $renderer */
        $renderer = $this->prophesize(TemplateRendererInterface::class);
        $renderer
            ->render('app::home-page', Argument::type('array'))
            ->willReturn('');

        $measurements = [
            [
                'date_time' => '30-12-2010 12:10',
                'temp' => 12.04
            ],
        ];


        /** @var Database|ObjectProphecy */
        $database = $this->prophesize(Database::class);
        $database
            ->fetchAll()
            ->willReturn($measurements);

        $homePage = new HomePageHandler(
            $renderer->reveal(),
            $database->reveal()
        );

        /** @var ServerRequestInterface|ObjectProphecy $request */
        $request = $this->prophesize(ServerRequestInterface::class);
        $response = $homePage->handle(
            $request->reveal()
        );

        self::assertInstanceOf(HtmlResponse::class, $response);
    }
}
