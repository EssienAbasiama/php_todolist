<?php

if (file_exists('./todos.json')) {
    $todos = json_decode(file_get_contents("./todos.json"), true);
    if (isset($_POST["todo_item"])) {
        $todo_item = $_POST["todo_item"];
        $todos[$todo_item] = ['completed' => false];
        file_put_contents('./todos.json', json_encode($todos, JSON_PRETTY_PRINT));
    }
} else {
    fopen("./todos.json", "w");
    $todos = json_decode(file_get_contents("./todos.json"), true);
    if (isset($_POST["todo_item"])) {
        $todo_item = $_POST["todo_item"];
        $todos[$todo_item] = ['completed' => false];
        file_put_contents('./todos.json', json_encode($todos, JSON_PRETTY_PRINT));
    }
}
header('Location: index.php');
