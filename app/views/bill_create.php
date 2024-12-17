<div class="container mx-auto mt-10">
  <h1 class="text-2xl font-bold text-gray-700 mb-6">Adicionar Novo Gasto</h1>

  <form action="/bills/create" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
    <div class="mb-4">
      <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
      <input type="text" id="title" name="title" class="mt-1 block w-full border border-gray-300 rounded p-2" required />
    </div>

    <div class="mb-4">
      <label for="amount" class="block text-sm font-medium text-gray-700">Valor</label>
      <input type="number" id="amount" name="amount" class="mt-1 block w-full border border-gray-300 rounded p-2" required />
    </div>

    <div class="mb-4">
      <label for="due_date" class="block text-sm font-medium text-gray-700">Vencimento</label>
      <input type="date" id="due_date" name="due_date" class="mt-1 block w-full border border-gray-300 rounded p-2" required />
    </div>

    <div class="mb-4">
      <label class="block text-sm font-medium text-gray-700">Tags</label>
      <?php foreach ($tags as $tag) : ?>
        <div class="flex items-center mb-2">
          <input type="checkbox" name="tags[]" value="<?= htmlspecialchars($tag->getId()) ?>" id="tag_<?= $tag->getId() ?>" class="mr-2" />

          <label for="tag_<?= $tag->getName() ?>" class="text-sm text-gray-700">
            <?= htmlspecialchars($tag->getName()) ?>
          </label>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="mb-4">
      <label for="pdf" class="block text-sm font-medium text-gray-700">Anexar boleto</label>
      <input type="file" id="pdf" name="pdf" class="mt-1 block w-full text-gray-700">
    </div>

    <div class="mb-4">
      <label class="flex items-center text-sm font-medium text-gray-700">
      <input type="checkbox" name="paid" class="mr-2" />
        Pago?
      </label>
    </div>

    <div>
      <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
        Salvar Gasto
      </button>
    </div>
  </form>
</div>
