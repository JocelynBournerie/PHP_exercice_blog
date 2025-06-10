<?php

namespace App\Controller;

use App\Repository\PostRepository;

class PostContoller{
    
    public function list() {
        //Récupérer les données
            //Récupérer le post repository
            $postRepository = new PostRepository();
            $postRepository->list();
        //Envoyer les données à la vue
        //Récupérer et envoyer la vue
    }
}