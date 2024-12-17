<div class="container mx-auto mt-10">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-700">Visão Geral</h1>
    <a href="/bills/create" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
      + Adicionar Novo Gasto
    </a>
  </div>

  <?php if (empty($bills)) : ?>
    <div class="text-center py-10 bg-white rounded-lg shadow-md">
      <p class="text-xl text-gray-600">Nenhum gasto encontrado.</p>
      <p class="text-gray-500 mt-2">Comece adicionando algum gasto.</p>
      <a href="/bills/create" class="mt-4 inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
        + Adicionar Novo Gasto
      </a>
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
              <td class="py-3 px-6"><?= htmlspecialchars($bill->getAmount()) ?></td>
              <td class="py-3 px-6"><?= htmlspecialchars($bill->getDueDate()) ?></td>
              <td class="py-3 px-6"><?= htmlspecialchars($bill->getTags()) ?></td>
              <td class="py-3 px-6"><?= $bill->isPaid() ? 'Sim' : 'Não' ?></td>
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
