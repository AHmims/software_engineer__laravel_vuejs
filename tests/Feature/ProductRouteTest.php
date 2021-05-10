<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductRoute extends TestCase
{
    //TEST IF GET WILL PASS
    public function test_getAll_pass()
    {
        $response = $this->get('/api/product/all');

        $response->assertStatus(200);
    }

    //TEST IF INSERT WILL NOT PASS
    public function test_insert_pass()
    {
        $response = $this->post('/api/product/add', [
            "name" => "name_from_test",
            "description" => "desc",
            "price" => 50,
            "image" => "https://image.makewebeasy.net/makeweb/0/VmQjDdvOw/DefaultData/iphone_12_blue.png",
            "categories" => [1]
        ]);

        $response->assertStatus(200);
    }

    //TEST IF INSERT WILL NOT PASS
    public function test_insert_fail_1()
    {
        $response = $this->post('/api/product/add', [
            "name" => "name_from_test",
            "description" => "desc",
            "price" => 51,
            "image" => "https://image.makewebeasy.net/makeweb/0/VmQjDdvOw/DefaultData/iphone_12_blue.png",
            "categories" => []
        ]);

        $response->assertStatus(500);
    }

    //TEST IF INSERT WILL NOT PASS
    public function test_insert_fail_2()
    {
        $response = $this->post('/api/product/add', []);

        $response->assertStatus(500);
    }

    //TEST IF INSERT WILL NOT PASS
    public function test_insert_fail_3()
    {
        $response = $this->post('/api/product/add');

        $response->assertStatus(500);
    }

    //TEST IF INSERT WILL NOT PASS
    public function test_insert_fail_4()
    {
        $response = $this->post('/api/product/add', [
            "name" => "name_from_test",
            "description" => "desc",
            "price" => 51,
            "image" => "",
            "categories" => [1]
        ]);

        $response->assertStatus(500);
    }

    //TEST IF INSERT WILL NOT PASS
    public function test_insert_fail_5()
    {
        $response = $this->post('/api/product/add', [
            "name" => "name_from_test"
        ]);

        $response->assertStatus(500);
    }
}
