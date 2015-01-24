<?php


/* 
    DataBase Connection code
*/
define('host','localhost');     // Host Server
define('db_name','todolist');   // DataBase Name
define('db_user','root');       // DataBase User Name 
define('db_password','smile');  // DataBase Password

$conn = new PDO('mysql:host='.host.';dbname='.db_name,db_user,db_password);

/* 
    If Page is new.php 
*/
if (@$_GET['page'] == 'new'){
        $task_name = $_POST['task_name']; // GET Input Task Name  Value
        if(empty($task_name)) {
            $data['error'] = "Task Name Field is Required";
        } elseif (strlen($task_name) < 3) {
            $data['error']="Task Name must be unless 3 char";
        } else {
        $sql = "Insert INTO `tasks` (`task_name`) VALUES (?)"; // ? is a placeholder
        $stmt = $conn->prepare($sql);
        $stmt->BindValue(1,$task_name,PDO::PARAM_STR); // Set Placeholder Value
        $stmt->execute(); // Save Data
        $data['success']="Added Successfully";
        }
     echo json_encode($data);
} 
elseif (@$_GET['page'] == 'delete'){
        $id = $_GET['id'];
        $sql = "Delete FROM `tasks` where id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->BindValue(1,$id,PDO::PARAM_INT);
        $stmt->execute();
        echo '{ success : "Removed"} ';
    }
 

elseif (@$_GET['page'] == 'edit'){
        $id = $_POST['id'];
        $task_name = $_POST['task_name']; // GET Input Task Name  Value
        if(empty($task_name)) {
            $data['error'] = "Task Name Field is Required";
        } elseif (strlen($task_name) < 3) {
            $data['error']="Task Name must be unless 3 char";
        }
        else {
        $sql = "UPDATE `tasks` SET task_name = ? Where id = ?"; // ? is a placeholder
        $stmt = $conn->prepare($sql);
        $stmt->BindValue(1,$task_name,PDO::PARAM_STR); // Set Placeholder Value
        $stmt->BindValue(2,$id,PDO::PARAM_INT);
        $stmt->execute(); // Save Data
        $data['success']="Updated Successfully";
    }
    echo json_encode($data);   
} 

elseif(@$_GET['get']){
    $id = $_GET['get'];
    $sql = "Select * From tasks where id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1,$id,PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_OBJ);
    echo ($data->task_name);
}

elseif(isset($_GET['mark']) && isset($_GET['mark']) == "done"){
    $id = $_GET['id'];
    echo $id;
    $sql = "UPDATE tasks SET state = 1 WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->BindValue(1,$id,PDO::PARAM_INT);
    $stmt->execute();
}
elseif(isset($_GET['action']) && isset($_GET['action']) == "get"){

$sql = "Select * From `tasks` ORDER BY id desc";
$stmt = $conn->prepare($sql);
$stmt->execute();

    echo '<ul>';
    while($row = $stmt->fetch(PDO::FETCH_OBJ)): ?>
    <li class="<?php echo  $row->state == 1 ? 'done' : ''; ?>">
    <?= $row->task_name ?>
    <span>
    <?php if($row->state == 0) : ?>
    <a href="code.php?mark=done&id=<?= $row->id ?>" action="mark" class="fa fa-check" title="done"></a>
    <?php  endif; ?>
    <a href="edit.php?id=<?= $row->id ?>" form="edit" class="fa fa-pencil-square-o" title="edit"></a>
    <a href="code.php?page=delete&id=<?= $row->id ?>"  action="delete" class="fa fa-trash" title="delete"></a>
    </span>
    </li>
    <?php endwhile; 
echo '</ul>';


}
else {
    
$sql = "Select * From `tasks` ORDER BY id desc";
$stmt = $conn->prepare($sql);
$stmt->execute();

}
