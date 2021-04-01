<?php

namespace Model;
abstract class AbstractShip
{


    private $id;

    private $name;

    private $weaponPower = 0;

    private $strength = 0;

    abstract public function getJediFactor();

    abstract public function isFunctional();

    abstract public function getType();
    /**
     * @return int
     */

    public function __construct($name)
    {

        $this->name = $name;
    }



    public function getWeaponPower()
    {
        return $this->weaponPower;
    }

    /**
     * @param int $weaponPower
     */
    public function setWeaponPower($weaponPower)
    {
        $this->weaponPower = $weaponPower;
    }



    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


    public function setStrength($strength) {

        if(!is_numeric($strength)) {
            throw new \Exception('invalid strength passed' .$strength);
        }

        $this->strength = $strength;
    }

    public function getStrength() {


        return $this->strength;
    }

    public function getName() {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNameAndSpecs($useShorFormat = false) {
        if($useShorFormat) {
            return sprintf(
                '%s: %s/%s/%s',
                $this->name,
                $this->weaponPower,
                $this->getJediFactor(),
                $this->strength
            );


        } else {
            return sprintf(
                '%s: w:%s, j:%s, s:%s',
                $this->name,
                $this->weaponPower,
                $this->getJediFactor(),
                $this->strength
            );

        }
    }


    public function doesGivenShipHasMoreStrength($givenShip) {
        return  $this->strength  < $givenShip->strength;

    }

    public function  __toString()
    {
       return $this->getName();
    }

}