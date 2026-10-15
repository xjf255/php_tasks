<?php use App\Models\Task; ?>
<h1>Tareas</h1>

<?php if (!$tasks): ?>
    <p class="empty">Aún no hay tareas.</p>
<?php else: ?>
<table>
    <thead>
        <tr><th>Título</th><th>Estado</th><th>Creada</th></tr>
    </thead>
    <tbody>
    <?php foreach ($tasks as $task): ?>
        <tr>
            <td>
                <strong><?= e($task['title']) ?></strong>
                <?php if ($task['description']): ?>
                    <br><small><?= e($task['description']) ?></small>
                <?php endif; ?>
            </td>
            <td><span class="badge <?= e($task['status']) ?>"><?= e(Task::STATUSES[$task['status']] ?? $task['status']) ?></span></td>
            <td><?= e($task['created_at']) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>