<div class="container mx-auto mt-10">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-700">Tags</h1>
    <a href="/tags/create" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
      + Adicionar Nova Tag
    </a>
  </div>

  <?php if (empty($tags)) : ?>
    <div class="text-center py-10 bg-white rounded-lg shadow-md">
      <p class="text-xl text-gray-600">Nenhuma tag encontrada.</p>
      <p class="text-gray-500 mt-2">Crie uma tag para melhor organizar as contas.</p>
      <a href="/tags/create" class="mt-4 inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
        + Adicionar Nova Tag
      </a>
    </div>
  <?php else : ?>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
      <table class="min-w-full table-auto">
        <thead>
          <tr class="bg-gray-200">
            <th class="py-3 px-6 text-left">Nome</th>
            <th class="py-3 px-6 text-right">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($tags as $tag) : ?>
            <tr class="border-b">
              <td class="py-3 px-6"><?= htmlspecialchars($tag->getName()) ?></td>
              <td class="py-3 px-6 flex justify-end space-x-2">
                <a href="/tags/edit/<?= $tag->getId() ?>" class="text-yellow-600 hover:text-yellow-700">
                  Editar
                </a>

                <a href="/tags/delete/<?= $tag->getId() ?>" class="text-red-600 hover:text-red-700">
                  Apagar
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>
