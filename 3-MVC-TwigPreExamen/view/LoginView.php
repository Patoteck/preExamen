<?php

require_once('./view/TwigView.php');

class LoginView extends TwigView
{
  public function show($view, $array)
  {
    switch ($view) {
      case 'login':
        echo self::getTwig()->render('login.twig.html', $array);
        break;
    }
  }
}
