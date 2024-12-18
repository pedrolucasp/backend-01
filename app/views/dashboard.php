<div class="container mx-auto mt-10">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-700">Visão Geral</h1>
    <a href="/bills/create" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
      + Adicionar Novo Gasto
    </a>
  </div>

  <div class="balance-card bg-white p-6 mb-8 rounded-lg shadow-lg max-w-xs mx-auto">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Balanço</h2>
    <p class="text-4xl font-bold <?php echo ($balance > 0) ? 'text-green-600' : 'text-red-600' ?> mb-2">$<?= number_format($balance, 2) ?></p>
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
              <td class="py-3 px-6">$<?= number_format($bill->getAmount(), 2, '.', ',') ?></td>
              <td class="py-3 px-6"><?= date('d/m/Y', strtotime($bill->getDueDate())) ?></td>
              <td class="py-3 px-6"><?= htmlspecialchars($bill->getTags() ?? '-') ?></td>
              <td class="py-3 px-6"><?= $bill->isPaidLabel() ?></td>
              <td class="py-3 px-6 flex items-center space-x-2">
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
