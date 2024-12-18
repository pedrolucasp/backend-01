<div class="container mx-auto mt-10">
  <div class="bg-white shadow-md rounded-lg p-6 mb-6">
    <form method="GET" action="/bills" class="flex flex-wrap gap-4">
      <div class="flex-1">
        <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Data Inicial</label>
        <input type="date" name="start_date" id="start_date" value="<?= htmlspecialchars($_GET['start_date'] ?? '') ?>"
          class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
      </div>
      <div class="flex-1">
        <label for="end_date" class="block text-gray-700 text-sm font-bold mb-2">Data Final</label>
        <input type="date" name="end_date" id="end_date" value="<?= htmlspecialchars($_GET['end_date'] ?? '') ?>"
          class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
      </div>

      <div class="flex-1">
        <label for="tag_id" class="block text-gray-700 text-sm font-bold mb-2">Tags</label>
        <select name="tag_id" id="tag" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
          <option value="">Todas as tags</option>
          <?php foreach ($tags as $tag) : ?>
            <option value="<?= $tag->getId() ?>" <?= (isset($_GET['tag_id']) && $_GET['tag_id'] == $tag->getId()) ? 'selected' : '' ?>>
              <?= htmlspecialchars($tag->getName()) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="flex items-end">
        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
          Filtrar
        </button>
      </div>
    </form>
  </div>

  <?php if (empty($bills)) : ?>
    <div class="text-center py-10 bg-white rounded-lg shadow-md">
      <p class="text-xl text-gray-600">Nenhum gasto encontrado.</p>
      <p class="text-gray-500 mt-2">Quem sabe tenta ajustar os filtros?</p>
    </div>
  <?php else : ?>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
      <table class="min-w-full table-auto">
        <thead>
          <tr class="bg-gray-200">
            <th class="py-3 px-6 text-left">Título</th>
            <th class="py-3 px-6 text-left">Valor</th>
            <th class="py-3 px-6 text-left">Vencimento</th>
            <th class="py-3 px-6 text-left">Tags</th>
            <th class="py-3 px-6 text-left">Pago?</th>
            <th class="py-3 px-6 text-left">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($bills as $bill) : ?>
            <tr class="border-b">
              <td class="py-3 px-6"><?= htmlspecialchars($bill->getTitle()) ?></td>
              <td class="py-3 px-6">R$ <?= number_format($bill->getAmount(), 2, ',', '.') ?></td>
              <td class="py-3 px-6"><?= date('d/m/Y', strtotime($bill->getDueDate())) ?></td>
              <td class="py-3 px-6"><?= htmlspecialchars($bill->getTags() ?? '-') ?></td>
              <td class="py-3 px-6"><?= $bill->isPaidLabel() ?></td>
              <td class="py-3 px-6 flex space-x-2">
                <a href="/bills/edit/<?= $bill->getId() ?>" class="text-yellow-600 hover:text-yellow-700">Editar</a>
                <a href="/bills/delete/<?= $bill->getId() ?>" class="text-red-600 hover:text-red-700">Apagar</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>
</div>

