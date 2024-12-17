<div class="container mx-auto mt-10">
  <h1 class="text-2xl font-bold text-gray-700 mb-6">Editar Gasto</h1>

  <form action="/bills/edit/<?= $bill->getId() ?>" method="POST">
    <div class="mb-4">
      <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
      <input type="text" id="title" name="title" value="<?= htmlspecialchars($bill->getTitle()) ?>"
             class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
    </div>

    <div class="mb-4">
      <label for="amount" class="block text-sm font-medium text-gray-700">Valor</label>
      <input type="text" id="amount" name="amount" value="<?= htmlspecialchars($bill->getAmount()) ?>"
             class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
    </div>

    <div class="mb-4">
      <label for="due_date" class="block text-sm font-medium text-gray-700">Vencimento</label>
      <input type="date" id="due_date" name="due_date" value="<?= htmlspecialchars($bill->getDueDate()) ?>"
             class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
    </div>

    <div class="mb-4">
      <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
      <div class="space-y-2">
        <?php foreach ($tags as $tag) : ?>
          <label class="inline-flex items-center">
            <input type="checkbox" name="tags[]" value="<?= $tag->getId() ?>" <?= in_array($tag->getId(), $tagIds) ? 'checked' : '' ?> class="form-checkbox text-blue-500">
            <span class="ml-2"><?= htmlspecialchars($tag->getName()) ?></span>
          </label>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="flex items-center space-x-4">
      <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
        Atualizar Gasto
      </button>

      <a href="/dashboard" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700">Voltar</a>
    </div>
  </form>
</div>

