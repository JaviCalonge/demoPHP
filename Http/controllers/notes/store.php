<?php

use Core\Validator;
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$errors = [];

if (! Validator::string($_POST["body"], 3, 30)) {
  $errors["body"] = "Note has to be more than 4 and less than 30  characters.";
}

if (! empty($errors)) {
  return view("notes/create.view.php", [
    "heading" => "Create Note",
    "errors" => $errors
  ]);
}

$db->query("INSERT INTO notes(body, user_id) VALUES(:body, :user_id)", [
  "body" => $_POST["body"],
  "user_id" => 1
]);

header("location: /notes");

die();
