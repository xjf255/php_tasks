<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class Task
{
    public const STATUSES = [
        'pendiente'   => 'Pendiente',
        'en_progreso' => 'En progreso',
        'hecha'       => 'Hecha',
    ];

    public static function all(): array
    {
        return Database::connection()
            ->query('SELECT * FROM tasks ORDER BY id DESC')
            ->fetchAll();
    }

    public static function find(int $id): ?array
    {
        $stmt = Database::connection()->prepare('SELECT * FROM tasks WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch() ?: null;
    }

    public static function create(array $data): int
    {
        $pdo  = Database::connection();
        $stmt = $pdo->prepare(
            'INSERT INTO tasks (title, description, status) VALUES (:title, :description, :status)'
        );
        $stmt->execute($data);
        return (int) $pdo->lastInsertId();
    }
}