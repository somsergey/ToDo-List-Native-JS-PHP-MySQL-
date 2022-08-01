<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My todo</title>
</head>

<body>

    <div class="container">

        <h1>My todo list</h1>

        <ul class="tabs">
            <li class="tab">
                <input type="radio" name="todotab">
                Todo List
                </input>
            </li>
            <li class="tab">
                <input type="radio" name="todotab">
                New item
                </input>
            </li>
        </ul>

        <div class="main">

            <div class="todo">
            <?php
                require 'db.php';
                $db = new Db();
                $query = 'SELECT * FROM todo ORDER BY id';
                $result = $db->mysql->query($query);

                if ($result->num_rows) {
                    while ($row = $result->fetch_object()) {
                        $id = $row->id;
                        $title = $row->title;
                        $exposition = $row->exposition;

                        $row_data = <<<EOD
                            <div class="item">
                                <h4>$title</h4>
                                <p>$exposition</p>
                                <input type="hidden" name="id" id="id" value="$id">
                                <div class="options">
                                    <a class="deleteitem" href="delete.php?id=$id">D</a>
                                    <a class="edititem" href="#">E</a>
                                </div>
                            </div>
                        EOD;
                        echo $row_data;
                    }
                }
                else {
                    $db_empty = <<<EOD
                        <p>
                            Oops, there is no items
                            <br/>
                            <a href="#">You can add them here</a>
                        </p>
                    EOD;
                    echo $db_empty;
                }
            ?>

            </div>

            <div class="new-item">

                <h2>Add new item</h2>

                <form action="additem.php" method="post">
                    <p>
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title">
                    </p>
                    <p>
                        <label for="exposition">Exposition</label>
                        <input type="text" name="exposition" id="exposition">
                    </p>
                    <p>
                        <input type="submit" name="additem" id="additem" value="Add new item">
                    </p>
                </form>
            </div>

        </div>
    </div>

</body>
    <script type="text/javascript" src="./js/main.js"></script>
</html>