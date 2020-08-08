<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

$app->get('/', function(Request $request, Response $response) use ($app)
{
    $flash = $this->flash->getMessages();

    $messages_link = $this->router->pathFor('messages');
    $login_link = $this->router->pathFor('login');
    $logout_link = $this->router->pathFor('logout');
    $register_link = $this->router->pathFor('registeruserform');

    $this->logger->info('Home page deployed');

    return $this->view->render($response,
        'homepage.html.twig',
        [
            'css_path' => CSS_PATH,
            'app_url' => APP_URL,
            'messages_link' => $messages_link,
            'login_link' => $login_link,
            'register_link' => $register_link,
            'logout_link' => $logout_link,
            'title' => 'M2m Home',
            'landing_page' => $_SERVER["SCRIPT_NAME"],
            'page_title' => 'Sessions Demonstration',
            'flash' => $flash
        ]);
})->setName('homepage');


