<?php

namespace Service;
interface ShipStorageInterface
{

    /**
     *
     * @return array
     */
  public function fetchAllShipsData();
    /**
     * @return id
     */
  public function fetchSingleShipData($id);
}