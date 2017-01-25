<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
    public function testGetAllProducts()
    {
        factory('App\Inventory::class')->create();

        $response = $this->call('GET', '/v1/products');
        $products = json_decode($response->getContent(), true);
        $this->assertGreaterThan(0, count($products));
    }

    public function testGetASingleProduct()
    {
    	$inventory = factory('App\Inventory::class')->create();

        $response = $this->call('GET', '/v1/products/'.$inventory->id);
        $jsoninventory = json_decode($response->getContent(), true);

        $this->assertEquals($inventory->id, $inventory['id']);
        $this->assertEquals($inventory->name, $inventory['name']);
        $this->assertEquals($inventory->price, $inventory['price']);
        $this->assertGreaterThan(0, count($inventory));
    }

    public function testCreateProduct()
    {
    	$category = factory('App\Category::class')->create();
        $user = factory('App\User::class')->create();
    	$inventory = factory('App\Inventory::class')->create();

        $response = $this->call('POST', '/v1/products', [
        	'category' => $category->id,
            'name' => 'TimeTable',
            'price' => 200,
        ]);
        
        $inventory = json_decode($response->getContent(), true);
        $this->assertGreaterThan(0, count($inventory));
    }
}