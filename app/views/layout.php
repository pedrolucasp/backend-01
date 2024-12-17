<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Dinheiro' ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
  <header class="bg-white shadow flex items-center">
    <div class="max-w-4xl mx-auto px-4 py-6">
      <a href="/" class="text-2xl font-bold text-blue-700">
        Dinheiro
      </a>
    </div>

    <? if (isset($_SESSION['user_id'])): ?>
      <nav class="max-w-4xl mx-auto px-4 py-2">
        <a href="/tags" class="text-blue-700 mr-5">Tags</a>
        <a href="/logout" class="text-blue-700">Sair</a>
      </nav>
    <? endif; ?>
  </header>

  <main class="max-w-4xl mx-auto px-4 py-8">
    <?= $content ?>
  </main>

  <footer class="bg-white border-t mt-8">
    <div class="max-w-4xl mx-auto px-4 py-4 text-sm text-gray-500">
      &copy; <?= date('Y') ?> Dinheiro
    </div>
  </footer>
</body>
</html>

