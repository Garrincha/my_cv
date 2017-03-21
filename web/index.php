<?php

//imports
require_once '../vendor/autoload.php';

use Symfony\Component\Translation\Loader\YamlFileLoader;
use Silex\Application\TranslationTrait;
use Rpodwika\Silex\YamlConfigServiceProvider;

//init
$app = new Silex\Application();

//options
$app['debug'] = true;

//register
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
    ));

$app->register(new Silex\Provider\LocaleServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'locale_fallbacks' => array('en'),
    'locale' => 'fr',
));

$app->extend('translator', function ($translator, $app) {
    $translator->addLoader('yaml', new YamlFileLoader());

    $translator->addResource('yaml', __DIR__.'/locales/messages.en.yml', 'en');
    $translator->addResource('yaml', __DIR__.'/locales/messages.fr.yml', 'fr');

    return $translator;
});

$app->register(new YamlConfigServiceProvider(__DIR__.'/parameters.yml'));

//routes
$app->get('/', function () use ($app) {
    return $app['twig']->render('cv2.html.twig', [
        'data' => $app['config']['parameters']
    ]);
});

// $app->get('/fr', function () use ($app) {
//     return $app['twig']->render('cv2.html.twig', [
//         'data' => $app['config']['parameters']
//     ]);
// });


//run
$app->run();
