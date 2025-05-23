<?php

namespace App\Entity;

class Author extends User{
    private string $description;
    private string $job;
    private array $posts = [];

    public function getDescription() : string{
        return $this->description;
    }

    public function getJob() : string{
        return $this->job;
    }

    public function getPosts() : array{
        return $this->posts;
    }

    public function setDescription($description) : void{
        $this->description = $description;
    }

    public function setJob($job) : void{
        $this->job = $job;
    }

    // public function setPosts(array $posts) : void{
    //     $this->posts = $posts;
    // }

    public function addpost(Post $post):void {
        array_push($this->posts,$post);
    }
}