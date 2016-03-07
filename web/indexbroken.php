<?php

require('../vendor/autoload.php');

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Register view rendering
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

// Our web handlers


$dir_open = opendir('views/posts/');


$app->get('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
                      $post = array();
                    while(false !== ($filename = readdir($dir_open))){
                        if($filename != "." && $filename != ".."){
                            $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
                            array_push($post, $withoutExt);
                        }
                    }

                    closedir($dir_open);
                    
  return $app['twig']->render('index.twig', array('posts'=>$post));
  
  });

$app->get('/posts/{name}/', function($name) use($app) {
    $app['monolog']->addDebug('posts/' . $name . '.twig');
    return $app['twig']->render('posts/' . $name . '.twig');
});

$app->run();







                      $dir_open = opendir('views/posts/');
                    $post = array();
                    while(false !== ($filename = readdir($dir_open))){
                        if($filename != "." && $filename != ".."){
                            $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
                            array_push($post, $withoutExt);
                        }
                    }

                    closedir($dir_open);

  return $app['twig']->render('index.twig', array('posts'=>$post));

/\ index.php