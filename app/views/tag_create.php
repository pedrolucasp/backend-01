<div class="container mx-auto mt-10">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-700">Adicionar Nova Tag</h1>
  </div>

  <form action="/tags/create" method="POST" class="bg-white shadow-md rounded-lg p-6">
    <div class="mb-4">
      <label for="name" class="block text-gray-700">Nome</label>
      <input type="text" id="name" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
    </div>

    <div class="flex justify-end">
      <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded hover:bg-blue-700">
        Salvar Tag
      </button>
    </div>
  </form>
</div>

