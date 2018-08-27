<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class LoginTest extends TestCase

{

	use RefreshDatabase;

    public function test_a_user_receives_correct_message_when_passing_in_wrong_credentials()
    {
    	$user = factory(Absltcast\User::class)->create();

    	$this->postJson('/login', [

    		'email' => $user->email,
    		'password' => 'wrong-password'

    	])->assertStatus(422)
    	->assertJson([

    		'message' => 'these credential do not match'

    	]);
    }
}
