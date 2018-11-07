<?php

include_once "TwigView.php"; ##Agregar en el esqueleto

class Home extends TwigView {
    
    public function show($array, $view) {
        
        switch ($view) {
        	case 'home':
        		echo self::getTwig()->render('home.html.twig', $array);
        		break;
        }
    }
}
