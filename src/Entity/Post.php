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

    public function __construct(){  
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
    public function setTitle(string $title) : self{
        $this->title = $title;
        return $this;
    }
    public function setContent(string $content) : self{
        $this->content = $content;
        return $this;
    }
    public function setCreatedAt(\DateTime $createdAt) : self{
        $this->createdAt = $createdAt;
        return $this;
    }
    public function setPublishedAt(\DateTime $publishedAt) : self{
        $this->publishedAt = $publishedAt;
        return $this;
    }
    public function setAuthor(string $author) : self{
        $this->author = $author;
        return $this;
    }
    public function setImage(string $image) : self{
        $this->image = $image ;
        return $this;
    }

    public function __set($name, $value)
    {
        if($name==='created_at'){
            $this->setCreatedAt(new DateTime($value));
        }
        if($name==='published_at'){
            $this->setPublishedAt(new DateTime($value));
        }
    }
}