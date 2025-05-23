<?php

namespace App\Entity;

use DateTime;

class Post {
    private $title;
    private $content;
    private $createdAt;
    private $publishedAt;
    private $author;
    private $image;

    public function __construct(
        string $title, 
        string $content, 
        DateTime $createdAt =null, 
        DateTime $publishedAt =null,
        string $author = null,
        string $image = null,
    )
    {
        $this->title = $title;
        $this->content = $content;
        $this->createdAt = $createdAt;
        $this->publishedAt = $publishedAt;
        $this->author = $author;
        $this->image = $image;

        
    }

    //getters
    public function getTitle() : string{
        return $this->title;
    }
    public function getContent() : string{
        return $this->content;
    }
    public function getCreatedAt() : \DateTime{
        return $this->createdAt;
    }
    public function getPublishedAt() : \DateTime{
        return $this->publishedAt;
    }
    public function getAuthor() : string{
        return $this->author;
    }
    public function getImage() : string{
        return $this->image;
    }

    //setters
    public function setTitle(string $title) : void{
        $this->title = $title;
    }
    public function setContent(string $content) : void{
        $this->content = $content;
    }
    public function setCreatedAt(\DateTime $createdAt) : void{
        $this->createdAt = $createdAt;
    }
    public function setPublishedAt(\DateTime $publishedAt) : void{
        $this->publishedAt = $publishedAt;
    }
    public function setAuthor(string $author) : void{
        $this->author = $author;
    }
    public function setImage(string $image) : void{
        $this->image = $image ;
    }
}