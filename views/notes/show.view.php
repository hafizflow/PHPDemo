<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a href="/notes" class="text-blue-500 underline">
                Go back...
            </a>
        </p>

        <div>
            <p> <?= htmlspecialchars($note['content']) ?> </p>
        </div>

        <form method="POST" class="mt-6">
            <input type="hidden" value='DELETE' name="_method">
            <input type="hidden" value="<?= $note['id'] ?>" name="id">
            <button class="text-red-500 text-sm">Delete</button>
        </form>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>