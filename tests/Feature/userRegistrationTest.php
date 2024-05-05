<?php
it('registers a new user', function () {
    $userData = [
        'full_name' => 'John Doe',
        'user_name' => 'johndoe9',
        'birthdate' => '1990-05-25',
        'phone' => '1234567890',
        'address' => '123 Street, City',
        'password' => 'MyP@ssw0rd',
        'password_confirmation' => 'MyP@ssw0rd',
        'user_image' => 'example.jpg',
        'email' => '10@example.com',
    ];

    $response = $this->post('/postForm', $userData);
    $response->assertRedirect('/register')->assertSessionHas('success', 'Registration successful!');
});
