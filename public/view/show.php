
<?php

include('../../assets/templates/header.php');
include('../../vendor/autoload.php');


?>
    <h1>User List</h1>

    <?php if($users){  ?>
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Created at</th>
            </tr>
        </thead>
        <?php foreach ($users as $user): ?>
        <tbody>
        
            <tr class="table-active">
                
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['created_at']; ?></td>
            </tr>
        </tbody>
        <?php endforeach; ?>
        </table>
    <?php }else{ ?>
        <p>No current users</p>
    <?php } ?>
    
        

    
