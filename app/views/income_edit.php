<div class="container mx-auto mt-10">
  <h1 class="text-2xl font-bold text-gray-700 mb-6">Editar Rendimento</h1>

  <form action="/incomes/edit/<?= $income->getId() ?>" method="POST" class="bg-white p-6 rounded shadow-md">
    <div class="mb-4">
      <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
      <input type="text" id="title" name="title" value="<?= $income->getTitle() ?>" class="mt-1 block w-full border border-gray-300 rounded p-2" required />
    </div>

    <div class="mb-4">
      <label for="amount" class="block text-sm font-medium text-gray-700">Valor</label>
      <input type="number" id="amount" name="amount" value="<?= $income->getAmount() ?>" class="mt-1 block w-full border border-gray-300 rounded p-2" required />
    </div>

    <div class="mb-4">
      <label for="date" class="block text-sm font-medium text-gray-700">Data</label>
      <input type="date" id="date" name="date" value="<?= $income->getDate() ?>" class="mt-1 block w-full border border-gray-300 rounded p-2" required />
    </div>

    <label class="mt-5" for="income_type">Tipo de Rendimento</label>
    <select name="income_type" id="income_type" required>
      <option value="one_off" <?php echo (isset($income) && $income->getIncomeType() === 'one_off') ? 'selected' : ''; ?>>Único</option>
      <option value="repeatable" <?php echo (isset($income) && $income->getIncomeType() === 'repeatable') ? 'selected' : ''; ?>>Recorrente</option>
    </select>

    <div class="mt-5" id="recurrence_period_container" style="display: <?php echo (isset($income) && $income->getIncomeType() === 'repeatable') ? 'block' : 'none'; ?>;">
      <label for="recurrence_period">Período de Recorrência</label>
      <select name="recurrence_period" id="recurrence_period">
        <option value="monthly" <?php echo (isset($income) && $income->getRecurrencePeriod() === 'monthly') ? 'selected' : ''; ?>>Mensal</option>
        <option value="weekly" <?php echo (isset($income) && $income->getRecurrencePeriod() === 'weekly') ? 'selected' : ''; ?>>Semanal</option>
        <option value="yearly" <?php echo (isset($income) && $income->getRecurrencePeriod() === 'yearly') ? 'selected' : ''; ?>>Anual</option>
      </select>
    </div>

    <div class="mt-5">
      <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
        Atualizar Rendimento
      </button>
    </div>
  </form>

  <script>
    document.getElementById('income_type').addEventListener('change', function() {
      const recurrencePeriodContainer = document.getElementById('recurrence_period_container');
      if (this.value === 'repeatable') {
        recurrencePeriodContainer.style.display = 'block';
      } else {
        recurrencePeriodContainer.style.display = 'none';
      }
    });
  </script>
</div>
