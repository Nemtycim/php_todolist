<!DOCTYPE html>
<html>
<head>
    <title>ToDo List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>ToDo List</h1>
    <form method="post">
        <input type="text" name="task" placeholder="Yeni görev ekle">
        <button type="submit">Ekle</button>
    </form>

    <?php
    // Veritabanı yerine bir dosya kullanıyoruz
    $taskFile = "tasks.txt";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $task = $_POST["task"];
        $taskList = file_get_contents($taskFile);

        // Yeni görevi dosyaya ekleyin
        file_put_contents($taskFile, $task . PHP_EOL, FILE_APPEND);

        echo "<h5>Yeni Görevler Eklendi</h5>";
    }

    echo "<h2>Görevler:</h2>";

    if (file_exists($taskFile)) {
        $taskList = file_get_contents($taskFile);
        $tasks = explode(PHP_EOL, $taskList);

        foreach ($tasks as $index => $task) {
            if (!empty($task)) {
                // Her görevin yanına bir "Sil" bağlantısı ekleyin
                echo "<p>" . $task . " <a href='delete.php?index=" . $index . "'>Sil</a></p>";
            }
        }
    } else {
        echo "Henüz hiç görev eklenmedi.";
    }
    ?>
</body>
</html>
