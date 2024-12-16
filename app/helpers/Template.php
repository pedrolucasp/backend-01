<?php

class Template {
  public static function render($view, $data = []) {
    // TODO: Add support for multiple controller/pages?
    $viewPath = __DIR__ . '/../views/' . $view . '.php';
    $layoutPath = __DIR__ . '/../views/layout.php';

    if (!file_exists($viewPath)) {
      throw new Exception("View not found: " . $view);
    }

    extract($data);

    ob_start();
    include $viewPath;
    $content = ob_get_clean();

    // Render within layout
    ob_start();
    include $layoutPath;
    return ob_get_clean();

    return $content;
  }
}

