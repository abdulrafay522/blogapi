<?php

$users =[
    [
        "name"=>"rafay",
        "email"=>"rafay@gmail.com",
        "password"=>password_hash('click123',PASSWORD_DEFAULT),
        "created_at"=>time(),
            ],
        [
        
                "name"=>"rehan",
                "email"=>"rehan@gmail.com",
                "password"=>password_hash('click123',PASSWORD_DEFAULT),
                "created_at"=>time(),
                    ],    [
        
                        "name"=>"zaheer",
                        "email"=>"zaheer@gmail.com",
                        "password"=>password_hash('click123',PASSWORD_DEFAULT),
                        "created_at"=>time(),
                            ],    [
        
                                "name"=>"mushi",
                                "email"=>"mushi@gmail.com",
                                "password"=>password_hash('click123',PASSWORD_DEFAULT),
                                "created_at"=>time(),
                                    ],
];
$query = 'INSERT INTO `users`(`name`, `email`, `password`, `created_at`) VALUES';
foreach ($users as $user) {
    $query .= "
    ('".$user['name']."','".$user['email']."','".$user['password']."','".$user['created_at']."'),";
}
$query = substr($query, 0, -1);

include 'db.php';
$conn->query($query);
echo 'done';die();