<?php
namespace Tests\Unit;

use App\Category;
use App\Services\Category\ReadCategories;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class FtpTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testUrl()
    {
        $this->json('GET', '/categories/import')->assertStatus(200);
    }

    public function testCategory()
    {
        $this->json('GET', '/categories/import')->assertStatus(200);

        $count = Category::count();
        if ($count > 0) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false);
        }
    }

    public function testUser()
    {
        $this->assertDatabaseHas('users', [
            'name' => 'erdem',
            'email' => 'erdemoflaz4@gmail.com'
        ]);
    }

}
