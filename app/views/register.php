<section class="flex flex-col">
  <h1 class="text-xl font-semibold mb-4">
    Cadastre-se
  </h1>

  <form method="POST" action="/register">
    <div class="flex flex-col">
      <label for="username">Nome de usuário</label>
      <input type="text" name="username" id="username" required />
    </div>

    <div class="flex flex-col">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" required />
    </div>

    <div class="flex flex-col">
      <label for="password">Senha</label>
      <input type="password" name="password" id="password" required />
    </div>

    <div class="flex flex-col">
      <label for="password">Confirmação de Senha</label>
      <input type="password" name="password_confirmation" id="password_confirmation" required />
    </div>

    <div class="mt-5">
      <button type="submit"
              class="bg-blue-700 text-white font-bold py-2 px-4 rounded hover:bg-blue-800 focus:outline-none focus:ring focus:ring-blue-300">
        Cadastrar
      </button>
    </div>
  </form>
</section>
