<div class="container mx-auto mt-10">
  <h1 class="text-2xl font-bold text-gray-700 mb-6">Editar Tag</h1>

  <form action="/tags/edit/<?= $tag->getId() ?>" method="POST">
    <div class="mb-4">
      <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
      <input type="text" id="name" name="name" value="<?= htmlspecialchars($tag->getName()) ?>"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
    </div>

    <div class="flex items-center space-x-4">
      <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
        Atualizar Tag
      </button>

      <a href="/tags" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700">Voltar</a>
    </div>
  </form>
</div>

