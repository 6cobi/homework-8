<?php

namespace app\models;

class Post {
    public function getAllPostsByTitle($params) {
        $allPosts = [
            [
                'id' => '1',
                'title' => 'first',
                'content' => 'first content',
            ],
            [
                'id' => '2',
                'title' => 'Second',
                'content' => 'Second Content',
            ],
        ];

        if (!empty($params['title'])) {
            return array_filter($allPosts, function ($post) use ($params) {
                return $post['title'] === $params['title'] ? $post : null;
            });
        }

        return $allPosts;
    }

    public function savePost() {
        // In the future, this will save a post to the database
    }
}
