<?php

namespace Tests\Feature;

use Tests\TestCase;
use Mail;
use Absltcast\User;
use Absltcast\Mail\ConfirmYourEmail;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    public function test_a_user_has_a_default_username_after_registration()
    {
    	Mail::fake();
    	$this->withoutExceptionHandling();
    	$this->post('/register', [

    		'name' => 'damar huda',
    		'email' => 'damarhuda@live.com',
    		'password' => 'secret'

    	])->assertRedirect();

    	$this->assertDatabaseHas('users', [

    		'username' => str_slug('damar huda')
    	]);
    }

    public function test_a_user_has_a_token_after_registration()
    {

    	Mail::fake();
    	$this->withoutExceptionHandling();
    	$this->post('/register', [

    		'name' => 'damar huda',
    		'email' => 'damarhuda@live.com',
    		'password' => 'secret'

    	])->assertRedirect();

    	$user = User::find(1);

    	$this->assertNotNull($user->confirm_token);
    	$this->assertFalse($user->isConfirmed());
    }

    public function test_an_email_is_sent_to_newly_registered_users()
    {
    	$this->withoutExceptionHandling();
    	Mail::fake();

    	$this->post('/register', [

    		'name' => 'damar teplok',
    		'email' => 'mie.yaminasin@gmail.com',
    		'password' => 'secret'

    	])->assertStatus(302);

    	Mail::assertSent(ConfirmYourEmail::class);

    }
}
