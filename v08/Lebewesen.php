<?php
/**
 * Created by PhpStorm.
 * User: Dam-Hoon
 * Date: 28.10.2014
 * Time: 19:15
 */
abstract class Lebewesen{
    private $alter;

    /**
     * Soll den Programmieren zwingen, diese Methode zu implementieren
     * @return mixed
     */
    abstract function altern();

    /**
     * Ein ausprogrammierter Getter für das Alter Attribut
     * @return mixed
     */
    public function getAlter(){
        return $this ->alter;
    }
}