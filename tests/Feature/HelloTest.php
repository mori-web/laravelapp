<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Person;

class HelloTest extends TestCase
{
  /**
   * A basic feature test example.
   */

  // use DatabaseMigrations;

  public function test_example(): void
  {
    // $response = $this->get('/');

    // $response->assertStatus(200);

    // $this->assertTrue(true);

    // $response = $this->get('/');
    // $response->assertStatus(200);

    // $response = $this->get('/hello');
    // $response->assertStatus(302);

    // $user = factory(User::class)->create();
    // $response = $this->actingAs($user)->get('/hello');
    // $response->assertStatus(200);

    // $response = $this->get('/no_route');
    // $response->assertStatus(404);

    // $arr = [];
    // $this->assertEmpty($arr);

    // $msg = "Hello";
    // $this->assertEquals('Hello', $msg);

    // $n = random_int(0, 100);
    // $this->assertLessThan(100, $n);

    factory(User::class)->create([
      'name' => 'AAA',
      'email' => 'BBB@CCC.COM',
      'password' => 'ABCABC',
    ]);
    factory(User::class, 10)->create();
    $this->assertDatabaseHas('users', [
      'name' => 'AAA',
      'email' => 'BBB@CCC.COM',
      'password' => 'ABCABC',
    ]);
    // ダミーで利用するデータ
    factory(Person::class)->create([
      'name' => 'XXX',
      'mail' => 'YYY@ZZZ.COM',
      'age' => 123,
    ]);
    factory(Person::class, 10)->create();
    $this->assertDatabaseHas('people', [
      'name' => 'XXX',
      'mail' => 'YYY@ZZZ.COM',
      'age' => 123,
    ]);
  }
}
