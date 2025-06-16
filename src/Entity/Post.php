<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]

class Post {

    
    #[ORM\Id]
    #[ORM\Column(type:'integer')]
    #[ORM\GeneratedValue]
    private $id;
    
    #[ORM\Column(type:'string',length:255)]
    private $title;
    
    #[ORM\Column(type:'text')]
    private $content;
    
    #[ORM\Column(type:'datetime')]
    private DateTime $createdAt;
    
    #[ORM\Column(type:'datetime')]
    private DateTime $publishedAt;
    
    #[ORM\Column(type:'string', nullable:true)]
    private $image;
    
    #[ORM\ManyToOne(targetEntity:Author::class)]
    #[ORM\JoinColumn(name:'author_id',referencedColumnName:'id',nullable:true)]
    private Author $author;

    public function __construct(){  
    }

    //getters
    public function getId(){
    return $this->id;
    }
    
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
    public function getAuthor() : Author{
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
    public function setAuthor(Author $author) : self{
        $this->author = $author;
        return $this;
    }
    public function setImage(string $image) : self{
        $this->image = $image ;
        return $this;
    }

    // public function __set($name, $value)
    // {
    //     if($name==='created_at'){
    //         $this->setCreatedAt(new DateTime($value));
    //     }
    //     if($name==='published_at'){
    //         $this->setPublishedAt(new DateTime($value));
    //     }
    // }
}