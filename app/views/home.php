<section class="bg-white p-6 rounded-lg shadow-md">
  <h1 class="text-xl font-semibold mb-4">
    Bem vindo! <?= htmlspecialchars($appName) ?>!
  </h1>

  <p><?= htmlspecialchars($message) ?></p>

  <div class="flex flex-col mt-5">
    <a class="text-blue-700 underline font-bold hover:text-blue-800 focus:ring focus:ring-blue-300" href="/login">
      Login
    </a>

    <a class="text-blue-700 underline font-bold hover:text-blue-800 focus:ring focus:ring-blue-300" href="/register">
      Cadastro
    </a>
  </div>
</section>
