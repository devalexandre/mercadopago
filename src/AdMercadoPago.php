<?php


namespace Indev\Mercado;

use MercadoPago\SDK;
use MercadoPago\Preference;
use MercadoPago\Payer;
use MercadoPago\Item as PItem;


class AdMercadoPago
{
    
  private $email;
  private $items;
  private $clientId;
  private $ClientSecret;
  
  
  
  /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

/**
     * @return mixed
     */
    public function getItems(): Item
    {
        return $this->items;
    }

/**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

/**
     * @param mixed $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

/**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @return mixed
     */
    public function getClientSecret()
    {
        return $this->ClientSecret;
    }

    /**
     * @param mixed $clientId
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * @param mixed $ClientSecret
     */
    public function setClientSecret($ClientSecret)
    {
        $this->ClientSecret = $ClientSecret;
    }

public function save(){
      
     SDK::setClientId($this->getClientId());
     SDK::setClientSecret($this->getClientSecret());
     
     $preference = new Preference();
     
     $item = new PItem();
     $item->id = $this->getItems()->getId();
     $item->title = $this->getItems()->getNome();
     $item->quantity = $this->getItems()->getQuantidade();
     $item->currency_id = "BRL";
     $item->unit_price = $this->getItems()->getPreco();
     
     $payer = new Payer();
     $payer->email = $this->getEmail();
     # Setting preference properties
     $preference->items = array($item);
     $preference->payer = $payer;
     # Save and posting preference
     $preference->save();
     
     return $preference->init_point;
      
  }
  

}