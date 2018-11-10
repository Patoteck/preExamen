<?php

require_once('./view/TwigView.php');

class ProductView extends TwigView
{
  public function show($view, $array)
  {
    switch ($view) {
      case 'listProducts':
        echo self::getTwig()->render('listProducts.twig.html', $array);
        break;

      case 'formNewProduct':
        echo self::getTwig()->render('formNewProduct.twig.html', $array);
    }
  }
}
