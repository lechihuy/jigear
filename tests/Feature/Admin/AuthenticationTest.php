<?php

it('has login page', function () {
    $response = $this->get(route('admin.auth.login'));

    $response->assertStatus(200);
});
