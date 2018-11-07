<?php

include_once "TwigView.php"; ##Agregar en el esqueleto

class Login extends TwigView {
    
    public function show($array, $view) {
        
        switch ($view) {
        	case 'login':
        		echo self::getTwig()->render('login.html.twig', $array);
        		break;
        }
    }
}
