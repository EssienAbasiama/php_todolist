<?php
$todos = json_decode(file_get_contents('./todos.json'), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="add_todo.php" method="post" style="display:inline-block; margin-bottom: 20px">
     <input type="search" name="todo_item">
        <button>Add Todo</button>
    </form>
    <?php
    foreach($todos as $x => $val): ?>

        <div style="display: flex;width: 300px;justify-content: space-between;margin-bottom: 10px">
            <div>
                <form action="change_status.php" method="post">
                    <input type="text" name="todo_item" value="<?php echo $x?>" hidden>
                    <input type="checkbox" name="checkbox" <?php if ($val["completed"]) {echo "checked";}?>>
                </form>
            </div>
            <div>
                <?php echo $x?>
            </div>
            <div>
                <form action="delete.php" method="post">
                    <input type="text" name="todo_item" value="<?php echo $x?>" hidden>
                    <button>Delete</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>

    <script>
        const checkboxes = document.querySelectorAll('input[type=checkbox]');
        checkboxes.forEach(ch => {
            ch.onclick = function () {
                this.parentNode.submit()
            };
        })
    </script>
</body>
</html>