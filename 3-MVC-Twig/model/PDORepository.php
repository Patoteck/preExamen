<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PDORepository
 *
 * @author fede
 */
abstract class PDORepository {
    
    const USERNAME = "root";
    const PASSWORD = "alumno";
	const HOST ="127.0.0.1";
	const DB = "parcial";
    
    
    private function getConnection(){
        $u=self::USERNAME;
        $p=self::PASSWORD;
        $db=self::DB;
        $host=self::HOST;
        $connection = new PDO("mysql:dbname=$db;host=$host", $u, $p);
        return $connection;
    }
    
    protected function queryList($sql, $args){
        $connection = $this->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($args);
        return $stmt->fetchAll();
    }

    protected function execute($sql, $args=null)
    {
        $connection = $this->getConnection();
        $stmt = $connection->prepare($sql);
        // Acá se podría mirar si la consulta falla o no.
        if (is_null($args)) {
            $stmt->execute();
        }else{
            $stmt->execute($args);
        }
        return $stmt;
    }
    
}
