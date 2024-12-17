<?php

require_once __DIR__ . '/../daos/TagDAO.php';
require_once __DIR__ . '/../models/Tag.php';

class TagsController {
  private $tagDAO;

  public function __construct() {
    $this->tagDAO = new TagDAO();
  }

  public function index() {
    $tags = $this->tagDAO->getAllTags();

    return Template::render('tags', ['tags' => $tags]);
  }

  public function create() {
    return Template::render('tag_create');
  }

  public function store() {
    $data = $_POST;
    $tag = new Tag(
      null,
      $data['name']
    );

    $this->tagDAO->save($tag);

    header('Location: /tags');
    exit;
  }

  public function edit($id) {
    $tag = $this->tagDAO->getTagById($id);

    return Template::render('tag_edit', ['tag' => $tag]);
  }

  public function update($id) {
    $data = $_POST;

    $this->tagDAO->updateTag($id, $data['name']);

    header('Location: /tags');
    exit;
  }

  public function destroy($id) {
    $this->tagDAO->delete($id);

    header('Location: /tags');
    exit;
  }
}
