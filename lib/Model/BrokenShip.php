<?php
namespace Model;

class BrokenShip extends AbstractShip
{


    public function getType()
    {
        return 'Broken';
    }


    public function isFunctional() {

        return false;
    }


    public function getJediFactor()
    {
        return 0;
    }

}