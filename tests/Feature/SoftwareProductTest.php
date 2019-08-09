<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SoftwareProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCanVisitSoftwareProductsPage()
    {
        $response = $this->get('/software-products');
        $response->assertStatus(200);
    }

    public function testDisplayAllSoftwareProduct()
    {
        $software_products = factory(\App\SoftwareProduct::class, 3)->make();
        
        $response = $this->get('/software-products');

        foreach ($software_products as $product){
            $response->assertSeeText($product->name);
        }
    }

    public function testSavedSoftwareProductsShowsInSoftwareProductPage()
    {
        $softwareProductName = 'Connect';
        $briefDescription = 'Highly customizable platform to collect information from public.';

        $softwareProduct = factory(\App\SoftwareProduct::class)->create([
            'name' => $softwareProductName,
            'brief_description' => $briefDescription
        ]);

        $response = $this->get('/software-products');
        $response->assertSeeText($softwareProductName);
        $response->assertSeeText($briefDescription);
    }
}
