<?php

use App\Models\User;

it('has login page', function () {
    $response = $this->get(route('admin.auth.login'));

    $response->assertStatus(200);
});

test('can login with admin user', function() {
    $user = User::factory()->admin()->create();

    $response = $this->post(route('admin.auth.login.store'), [
        'email' => $user->email,
        'password' => 'password'
    ]);

    $response->assertStatus(200);
});

test('can not login with customer user', function() {
    $user = User::factory()->create();

    $response = $this->post(route('admin.auth.login.store'), [
        'email' => $user->email,
        'password' => 'password'
    ]);

    $response->assertStatus(401);
});