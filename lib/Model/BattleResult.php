<?php

namespace Model;

class BattleResult implements \ArrayAccess
{
    private $usedJediPowers;

    private $winningShips;

    private $losingShips;

    public function __construct($usedJediPowers, AbstractShip $winningShips = null, AbstractShip $losingShips = null)
    {
     $this->losingShips = $losingShips;
     $this->winningShips = $winningShips;
     $this->usedJediPowers = $usedJediPowers;
    }

    /**
     * @return boolean
     */
    public function wereJediPowersUsed()
    {
        return $this->usedJediPowers;
    }

    /**
     * @return Ship or null
     */
    public function getWinningShips()
    {
        return $this->winningShips;
    }

    /**
     * @return Ship or null
     */
    public function getLosingShips()
    {
        return $this->losingShips;
    }
    public function isThereAWinner()
    {
        return $this->getWinningShips() !==null;
    }

    public function offsetExists($offset)
    {
       return property_exists($this, $offset);
    }

    public function offsetGet($offset)
    {
        return $this->$offset;
    }

    public function offsetSet($offset, $value)
    {
        $this->$offset = $value;
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }


}