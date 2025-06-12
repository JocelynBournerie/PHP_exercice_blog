<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]


class Author extends User
{

    
    #[ORM\Column(type: 'string')]
    private string $job;

    #[ORM\Column(type: 'text')]
    private string $description;

    
    private array $posts = [];


    public function getDescription(): string
    {
        return $this->description;
    }

    public function getJob(): string
    {
        return $this->job;
    }

    public function getPosts(): array
    {
        return $this->posts;
    }

    public function setDescription($description): self
    {
        $this->description = $description;
        return $this;
    }

    public function setJob($job): self
    {
        $this->job = $job;
        return $this;
    }

    // public function setPosts(array $posts) : void{
    //     $this->posts = $posts;
    // }

    public function addpost(Post $post): self
    {
        // array_push($this->posts,$post);
        $this->posts[] = $post;
        return $this;
    }
}
