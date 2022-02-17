<?php

namespace App\Models;

class Category
{

    private static $categories = [
        [
            "id" => "1",
            "name" => "Switch",
            "slug" => "switch",
            "img" => "https://jete.id/wp-content/uploads/2021/09/03.-keyboard-gaming-keyboad-komputer-762x400.jpg",
            "desc" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores animi sunt maxime. A, aut assumenda, fugit atque deleniti tempore quidem corporis tempora incidunt odit distinctio debitis harum earum quibusdam minus?"
        ],
        [
            "id" => "2",
            "name" => "Keyboard / Kit",
            "slug" => "keyboard-kit",
            "img" => "https://jete.id/wp-content/uploads/2021/09/03.-keyboard-gaming-keyboad-komputer-762x400.jpg",
            "desc" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores animi sunt maxime. A, aut assumenda, fugit atque deleniti tempore quidem corporis tempora incidunt odit distinctio debitis harum earum quibusdam minus?"
        ],
        [
            "id" => "3",
            "name" => "Tips & Tricks",
            "slug" => "tips-&-tricks",
            "img" => "https://jete.id/wp-content/uploads/2021/09/03.-keyboard-gaming-keyboad-komputer-762x400.jpg",
            "desc" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores animi sunt maxime. A, aut assumenda, fugit atque deleniti tempore quidem corporis tempora incidunt odit distinctio debitis harum earum quibusdam minus?"
        ]
    ];

    public static function all()
    {
        return self::$categories;
    }
}
