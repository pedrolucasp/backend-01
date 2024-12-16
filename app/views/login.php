<section class="flex flex-col">
  <h1 class="text-xl font-semibold mb-4">
    Faça login
  </h1>

  <form method="POST" action="/login">
    <div class="flex flex-col">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" required />
    </div>

    <div class="flex flex-col">
      <label for="password">Senha</label>
      <input type="password" name="password" id="password" required />
    </div>

    <div class="mt-5">
      <button type="submit"
              class="bg-blue-700 text-white font-bold py-2 px-4 rounded hover:bg-blue-800 focus:outline-none focus:ring focus:ring-blue-300">
        Entrar
      </button>
    </div>
  </form>
</section>
