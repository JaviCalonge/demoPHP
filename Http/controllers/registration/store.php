<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Core\Authenticator;

$db = App::resolve(Database::class);

$email = $_POST["email"];
$password = $_POST["password"];

$errors = [];

if (!Validator::email($email)) {
  $errors["email"] = "Please, provide a valid email.";
}

if (!Validator::password($password)) {
  $errors["password"] = "The password must be between 4 and 10 characters long and have at least one uppercase character.";
}

if (! empty($errors)) {
  return view("registration/create.view.php", [
    "errors" => $errors
  ]);
}

$user = $db->query("select * from users where email = :email", [
  "email" => $email
])->find();

if ($user) {

  header("location: /");
  exit();
} else {

  $db->query("INSERT INTO users(email, password) VALUES(:email, :password)", [
    "email" => $email,
    "password" => password_hash($password, PASSWORD_BCRYPT)
  ]);

  (new Authenticator)->login(['email' => $email]);

  header("location: /");
  exit();
}
