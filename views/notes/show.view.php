<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/header.php") ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <a href="/notes" class="text-blue-500 hover:underline">Go back...</a>
    <p class="mt-6"><?= htmlspecialchars($note["body"]) ?></p>

    <form method="POST" class="mt-6">
      <input type="hidden" name="_method" value="DELETE">
      <input type="hidden" name="id" value="<?= $note["id"] ?>">
      <a class="text-sm text-blue-500 mr-10 mt-10 hover:underline" href="/note/edit?id=<?= $note["id"] ?>">Edit</a>
      <button class="text-sm text-red-500 mt-10 hover:underline">Delete</button>
    </form>
  </div>
</main>

<?php require base_path("views/partials/footer.php") ?>