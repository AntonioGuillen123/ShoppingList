<?php

namespace Tests\Feature\Api;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_CheckIfRecieveAllEntriesOfProductsInJsonFile()
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->getJson(route('listProductAPI'));

        $response
            ->assertStatus(200)
            ->assertJsonCount(5);
    }

    public function test_CheckIfPostAnEntryOfProductInJsonFile()
    {
        $this->seed(DatabaseSeeder::class);

        $data = [
            'name' => 'Test Product',
            'description' => 'Test Description'
        ];

        $response = $this->postJson(route('createProductAPI'), $data);

        $response
            ->assertStatus(201)
            ->assertJsonFragment($data);
    }

    public function test_CheckIfPostAnEntryOfProductWithExistsNameInJsonFile()
    {
        $this->seed(DatabaseSeeder::class);

        $data = [
            'name' => 'Milk',
            'description' => 'Test Description'
        ];

        $response = $this->postJson(route('createProductAPI'), $data);

        $errorData = [
            'message' => 'The product you have entered already exists :('
        ];

        $response
            ->assertStatus(406)
            ->assertJsonFragment($errorData);
    }

}
