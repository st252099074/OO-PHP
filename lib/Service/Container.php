<?php
namespace Service;

class Container
{

   private $configuration;
   private $pdo;
   private $shipLoader;
   private $battleManager;
   private $shipStorage;

   public function __construct(array $configuration)
   {
       $this->configuration = $configuration;
   }


    public function getPDO()
    {
        /**
         * @return \PDO
         */
        if ($this->pdo === null) {

            $this->pdo = new \PDO(
                $this->configuration['db_dsn'],
                $this->configuration['db_user'],
                $this->configuration['db_pass']);
         };
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $this->pdo;

 }

    /**
     * @return ShipLoader
     */

    public function getShipLoader() {

       if($this->shipLoader === null) {
           $this->shipLoader = new ShipLoader($this->getShipStorage());
       }
        return $this->shipLoader;
    }


    /**
     * @return ShipStorageInterface
     */

    public function getShipStorage() {

        if($this->shipStorage === null) {
           $this->shipStorage = new PdoShipStorage($this->getPDO());
            //  $this->shipStorage = new JsonFileShipStorage(__DIR__.'/../../resources/ships.json');
        }
        return $this->shipStorage;
    }



    public function getBattleManager() {
        if($this->battleManager ===null) {
            $this->battleManager = new BattleManager();
        }
        return $this->battleManager;

    }

}