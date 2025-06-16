<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]


class Author extends User
{

    
    #[ORM\Column(type: 'string')]
    private string $job;

    #[ORM\Column(type: 'text', nullable:true)]
    private string $description;

    #[ORM\OneToMany(
        targetEntity:Post::class,
        mappedBy:'author'
        )]
    private Collection $posts ;

    public function __construct()
    {
        // $this->posts = new Collection();
    }


    public function getDescription(): string
    {
        return $this->description;
    }

    public function getJob(): string
    {
        return $this->job;
    }

    public function getPosts(): Collection
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

    public function addpost(Post $post): self
    {
        if(!$this->posts->contains($post)){
            $this->posts->add($post);
        }
        return $this;
    }

    public function removePost(Post $post):self
    {
        $this->posts->removeElement($post);
        return $this;
    }
}
