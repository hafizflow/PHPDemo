<?php require('views/partials/head.php') ?>
<?php require('views/partials/nav.php') ?>
<?php require('views/partials/banner.php') ?>

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
    </div>
</main>

<?php require('views/partials/footer.php') ?>