<?php

namespace App\Models;

class Submission
{
    private static $submissions = [
        [
            "id" => "1",
            "name" => "keeb 1",
            "slug" => "keeb-1",
            "img" => "https://jete.id/wp-content/uploads/2021/09/03.-keyboard-gaming-keyboad-komputer-762x400.jpg",
            "user" => "admin",
            "desc" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores animi sunt maxime. A, aut assumenda, fugit atque deleniti tempore quidem corporis tempora incidunt odit distinctio debitis harum earum quibusdam minus?"
        ],
        [
            "id" => "2",
            "name" => "keeb 2",
            "slug" => "keeb-2",
            "img" => "https://jete.id/wp-content/uploads/2021/09/03.-keyboard-gaming-keyboad-komputer-762x400.jpg",
            "user" => "admin",
            "desc" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores animi sunt maxime. A, aut assumenda, fugit atque deleniti tempore quidem corporis tempora incidunt odit distinctio debitis harum earum quibusdam minus?"
        ],
        [
            "id" => "3",
            "name" => "keeb 3",
            "slug" => "keeb-3",
            "img" => "https://jete.id/wp-content/uploads/2021/09/03.-keyboard-gaming-keyboad-komputer-762x400.jpg",
            "user" => "admin",
            "desc" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores animi sunt maxime. A, aut assumenda, fugit atque deleniti tempore quidem corporis tempora incidunt odit distinctio debitis harum earum quibusdam minus?"
        ]
    ];

    public static function all()
    {
        return collect(self::$submissions);
    }

    public static function find($slug)
    {
        $submissions = static::all();

        return $submissions->firstWhere('slug', $slug);
    }
}
