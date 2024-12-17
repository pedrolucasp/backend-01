<?php

class FileUploadingService {
  const UPLOAD_DIR = __DIR__ . '/../../storage/uploads/';
  private $uploadDir;

  public function __construct() {
    $this->uploadDir = self::UPLOAD_DIR;

    if (!is_dir($this->uploadDir)) {
      mkdir($this->uploadDir, 0755, true);
    }
  }

  public function upload($file, $prefix = 'pdf_') {
    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
      return [
        'success' => false,
        'error' => $this->getUploadErrorMessage($file['error'] ?? UPLOAD_ERR_NO_FILE)
      ];
    }

    $fileName = $this->generateUniqueFileName(
      $prefix,
      pathinfo($file['name'], PATHINFO_EXTENSION)
    );

    $filePath = $this->uploadDir . $fileName;

    if (move_uploaded_file($file['tmp_name'], $filePath)) {
      return ['success' => true, 'filePath' => 'storage/uploads/' . $fileName];
    }

    return ['success' => false, 'error' => 'Failed to move the uploaded file.'];
  }

  private function generateUniqueFileName($prefix, $extension) {
    return uniqid($prefix, true) . '.' . $extension;
  }

  private function getUploadErrorMessage($errorCode) {
    // TODO: Map other errors?
    $errors = [
      UPLOAD_ERR_NO_FILE    => 'No file was uploaded.',
      UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.'
    ];

    return $errors[$errorCode] ?? 'Unknown error during file upload.';
  }
}
