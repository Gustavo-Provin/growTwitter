<?php

require_once 'user.php';
require_once 'tweet.php';


$users = [];
$tweets = [];


$user1 = new User("Douglas", "Douglas@douglas.com", "Dougla1", "password");
$user2 = new User("Bruno", "Bruno@bruno.com", "BrunoUber", "password");
$user3 = new User("Alex", "alex@alex.com", "Alex", "password");
$users[] = $user1;
$users[] = $user2;
$users[] = $user3;

$tweet1 = new Tweet("Hello, world!", $user1->getId());
$tweet2 = new Tweet("Eu amo PHP.", $user2->getId());
$tweet3 = new Tweet("E o inter?", $user3->getId());
$tweet4 = new Tweet("Javascript é melhor", $user1->getId());
$tweets[] = $tweet1;
$tweets[] = $tweet2;
$tweets[] = $tweet3;
$tweets[] = $tweet4;


$tweet1->addLike($user2->getId());
$tweet1->addLike($user3->getId());
$tweet2->addLike($user1->getId());
$tweet4->addLike($user3->getId());
$tweet4->addLike($user2->getId());
$tweet4->addLike($user1->getId());




function findUserById($id, $users)
{
    foreach ($users as $user) {
        if ($user->getId() === $id) {
            return $user;
        }
    }
    return null;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweets</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <?php foreach ($tweets as $tweet) : ?>
            <div class="tweet">
                <?php
                $user = findUserById($tweet->getUserId(), $users);
                $username = $user->getUsername();
                $content = $tweet->getContent();
                $likesString = $tweet->getLikesString($users);
                ?>
                <span class="username">@<?php echo $username; ?></span>
                <p class="content"><?php echo $content; ?></p>
                <?php if (!empty($likesString)) : ?>
                    <p class="likes"><?php echo $likesString; ?></p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>