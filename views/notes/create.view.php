<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/nav.php") ?>
<?php require base_path("views/partials/header.php") ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <form method="POST" action="/notes">
      <div class="col-span-full">
        <label for="body" class="block text-sm/6 font-medium text-gray-900">Write your note:</label>
        <div class="mt-2">
          <textarea required name="body" id="body" rows="4" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"><?= htmlspecialchars(trim($_POST["body"] ?? ""), ENT_QUOTES, 'UTF-8') ?></textarea>
        </div>
        <?php if (isset($errors["body"])) : ?>
          <p class="text-red-500 text-s mt-2"><?= $errors["body"] ?></p>
        <?php endif; ?>
      </div>

      <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
      </div>
    </form>
  </div>
</main>

<?php require base_path("views/partials/footer.php") ?>