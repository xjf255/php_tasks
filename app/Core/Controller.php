<?php
declare(strict_types=1);

namespace App\Core;

abstract class Controller
{
    protected function view(string $name, array $data = []): void
    {
        extract($data, EXTR_SKIP);

        // Renderiza la vista y guarda su HTML en $content
        ob_start();
        require BASE_PATH . "/app/Views/{$name}.php";
        $content = ob_get_clean();

        // Lo inserta dentro del layout
        require BASE_PATH . '/app/Views/layout.php';
    }
}