<?php

declare(strict_types=1);

namespace App\Handler;

use App\Service\Database;
use Laminas\Diactoros\Response\HtmlResponse;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class HomePageHandler implements RequestHandlerInterface
{
    private TemplateRendererInterface $template;
    private Database $database;

    public function __construct(
        TemplateRendererInterface $template,
        Database $database
    ) {
        $this->template = $template;
        $this->database = $database;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $data = ['measurements' => $this->database->fetchAll()];
        return new HtmlResponse($this->template->render('app::home-page', $data));
    }
}
