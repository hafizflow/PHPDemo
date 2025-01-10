<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:col-span-2 md:mt-0">
                <form method="POST" action="/note">
                    <input type="hidden" value='PATCH' name="_method">
                    <input type="hidden" value="<?= $note['id'] ?>" name="id">

                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div>
                                <label for="body" class="block text-sm font-medium text-gray-700">Body</label>

                                <div class="mt-1">
                                    <textarea id="content" name="content" rows="3"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        placeholder="Here's an idea for a note..."><?= $note['content'] ?></textarea>
                                </div>

                                <?php if (isset($errors['content'])): ?>
                                <p class="mt-2 text-sm text-red-500"> <?= $errors['content'] ?></p>
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="text-right px-4 bg-gray-50 py-3 sm:px-6 justify-end gap-x-4 flex">
                            <button type="button" class="text-red-500 mr-auto"
                                onclick="document.querySelector('#delete-form').submit()">Delete</button>

                            <a href="/notes"
                                class="inline-flex justify-center rounded-md border border-transparent bg-gray-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Cancel
                            </a>

                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Update
                            </button>

                        </div>
                    </div>

            </div>
            </form>

            <form id="delete-form" class="hidden" method="POST" action="/note">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
            </form>
        </div>
    </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>