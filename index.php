<pre>
<?php

require_once './vendor/autoload.php';
use App\Entity\Post;
use App\Entity\Visitor;

$visitor = new Visitor('joe');



var_dump($visitor->getFirstname());

?>
</pre>