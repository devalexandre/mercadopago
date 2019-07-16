<?php
declare(strict_types=1);

namespace Indev\Test;

use Indev\Mercado\AdMercadoPago;
use PHPUnit\Framework\TestCase;
use Indev\Mercado\Item;



class TestPagamento  extends TestCase
{

    public function testPagamentoCartao(){
        $pg = new AdMercadoPago();
        $pg->setClientId("5182956848164606");
        $pg->setClientSecret("fG6VrQcSWkjg6WQBB4EMXyK8mF6yHTs5");
        
        $item = new Item();
        $item->setId(1);
        $item->setNome("Teste");
        $item->setPreco(200.00);
        $item->setQuantidade(1);
        
        $pg->setItems($item);
        $pg->setEmail('alexandre@indev.net.br');
        
        $pagar = $pg->save();
        
        $this->assertStringStartsWith('https://', $pagar);
        
      
    }
   
}

