<div class="container mx-auto mt-10">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-700">Rendimentos</h1>
    <a href="/incomes/create" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
      + Adicionar Novo Rendimento
    </a>
  </div>

  <?php if (empty($incomes)) : ?>
    <div class="text-center py-10 bg-white rounded-lg shadow-md">
      <p class="text-xl text-gray-600">Nenhum rendimento encontrado.</p>
      <p class="text-gray-500 mt-2">Crie um rendimento para melhor organizar as contas.</p>
      <a href="/incomes/create" class="mt-4 inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
        + Adicionar Novo Rendimento
      </a>
    </div>
  <?php else : ?>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
      <table class="min-w-full table-auto">
        <thead>
          <tr class="bg-gray-200">
            <th class="py-3 px-6 text-left">Título</th>
            <th class="py-3 px-6 text-left">Valor</th>
            <th class="py-3 px-6 text-left">Tipo</th>
            <th class="py-3 px-6 text-left">Recorrencia</th>
            <th class="py-3 px-6 text-left">Data</th>
            <th class="py-3 px-6 text-right">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($incomes as $income) : ?>
            <tr class="border-b">
              <td class="py-3 px-6"><?= htmlspecialchars($income->getTitle()) ?></td>
              <td class="py-3 px-6">R$ <?= number_format($income->getAmount(), 2, ',', '.') ?></td>
              <td class="py-3 px-6"><?= htmlspecialchars($income->getIncomeTypeLabel()) ?></td>
              <td class="py-3 px-6"><?= htmlspecialchars($income->getRecurrencePeriodLabel()) ?></td>
              <td class="py-3 px-6"><?= date('d/m/Y', strtotime($income->getDate())) ?></td>
              <td class="py-3 px-6 flex justify-end space-x-2">
                <a href="/incomes/edit/<?= $income->getId() ?>" class="text-yellow-600 hover:text-yellow-700">
                  Editar
                </a>

                <a href="/incomes/delete/<?= $income->getId() ?>" class="text-red-600 hover:text-red-700">
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
