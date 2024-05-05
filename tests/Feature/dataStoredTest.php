<?php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

test('user data is stored succefully in the database', function () {
    $userData = [
        'full_name' => 'John Doe',
        'user_name' => 'johndoe2',
        'birthdate' => '1990-05-25',
        'phone' => '1234567890',
        'address' => '123 Street, City',
        'password' => 'MyP@ssw0rd',
        'password_confirmation' => 'MyP@ssw0rd',
        'user_image' => 'example.jpg',
        'email' => '2@example.com',
    ];

    $response = $this->post('/postForm', $userData);

    $response->assertStatus(302); // Assuming a redirect response after successful registration

    $this->assertDatabaseHas('users', [
        'full_name' => $userData['full_name'],
        'user_name' => $userData['user_name'],
        'birthdate' => $userData['birthdate'],
        'phone' => $userData['phone'],
        'address' => $userData['address'],
        'user_image' => $userData['user_image'],
        'email' => $userData['email'],
    ]);

    $user = User::where('email', $userData['email'])->first();
    $this->assertTrue(Hash::check($userData['password'], $user->password));
});
