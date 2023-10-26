<?php
$taskFile = "tasks.txt";

if (isset($_GET['index'])) {
    $index = $_GET['index'];

    // Dosyadan görevleri alın
    $taskList = file_get_contents($taskFile);
    $tasks = explode(PHP_EOL, $taskList);

    // Belirtilen görevi silin
    if (isset($tasks[$index])) {
        unset($tasks[$index]);
    }

    // Güncellenmiş görev listesini dosyaya kaydedin
    $updatedTaskList = implode(PHP_EOL, $tasks);
    file_put_contents($taskFile, $updatedTaskList);

    // Görev silindiğinde kullanıcıyı ana sayfaya yönlendirin
    header("Location: todo.php");
}
?>
