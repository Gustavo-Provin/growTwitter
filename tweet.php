<?php

class Tweet
{
    private $id;
    private $content;
    private $userId;
    private $likes;

    public function __construct($content, $userId)
    {
        $this->id = uniqid();
        $this->content = $content;
        $this->userId = $userId;
        $this->likes = [];
    }



    public function addLike($userId)
    {
        $this->likes[] = $userId;
    }

    public function getLikesString($users)
    {
        $numLikes = count($this->likes);
        if ($numLikes === 0) {
            return "";
        } else if ($numLikes === 1) {
            $firstLikerUsername = findUserById($this->likes[0], $users)->getUsername();

            return "@{$firstLikerUsername} curtiu";
        } else {
            $firstLikerUsername = findUserById($this->likes[0], $users)->getUsername();

            return "@{$firstLikerUsername} curtiu e " . $numLikes - 1 . " outros";
        }
    }
    public function getUserId()
    {
        return $this->userId;
    }
    public function getContent()
    {
        return $this->content;
    }
}
