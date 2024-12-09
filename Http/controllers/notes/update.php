<?php

use Core\Database;
use Core\App;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query("select * from notes where id = :id", [
  "id" => $_POST["id"]
])->findOrFail();

authorize($note["user_id"] === $currentUserId);

$errors = [];

if (! Validator::string($_POST["body"], 3, 30)) {
  $errors["body"] = "Note has to be more than 4 and less than 30  characters.";
}

if (count($errors)) {

  return view("notes/edit.view.php", [
    "heading" => "Edit Note",
    "errors" => $errors,
    "note" => $note
  ]);
}

$db->query("Update notes set body = :body where id = :id", [
  "id" => $_POST["id"],
  "body" => $_POST["body"]
]);

header("location: /notes");

die();
