<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>To Do App</title>
        <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <p class="h1 ps-2">To Do List</p>
        <div class="container">
            <ul class="list-group row col-12 offset-md-3 col-md-6">
                <?php echo \ToDoApp\ViewHelpers\TasksViewHelper::getListOfCompletedTasks($tasks); ?>
            </ul>
            <div class="mb-3 offset-md-4 col-md-4 mt-3">
                <a href="/" class="btn btn-outline-success">Show outstanding tasks</a>
            </div>
        </div>
    </body>
</html>
