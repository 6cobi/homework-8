<?php

namespace app\controllers;

use app\models\Post;

class PostController
{
    public function getPosts() {
        $params = [
            'title' => $_GET['title'] ?: null,
        ];
        $postModel = new Post();
        $posts = $postModel->getAllPostsByTitle($params);
        header("Content-Type: application/json");
        echo json_encode($posts);
        exit();
    }

    public function savePost() {
        $title = $_POST['title'] ?: null;
        $content = $_POST['content'] ?: null;
        $author = $_POST['author'] ?: null;
        $errors = [];

        if ($title) {
            $title = htmlspecialchars($title);
            if (strlen($title) < 3) {
                $errors['title'] = 'Title is too short';
            }
        } else {
            $errors['title'] = 'Title is required';
        }

        if ($content) {
            $content = htmlspecialchars($content);
            if (strlen($content) < 10) {
                $errors['content'] = 'Content is too short';
            }
        } else {
            $errors['content'] = 'Content is required';
        }

        if ($author) {
            $author = htmlspecialchars($author);
            if (strlen($author) < 2) {
                $errors['author'] = 'Author name is too short';
            }
        } else {
            $errors['author'] = 'Author is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        $returnData = [
            'title' => $title,
            'content' => $content,
            'author' => $author,
        ];
        echo json_encode($returnData);
        exit();
    }
}
