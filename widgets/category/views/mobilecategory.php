<?php

//debug($category_array);

//die();

?>
<?php foreach($category_array as $one_arr): ?>
<li><a href="<?= $one_arr['link_category'] ?>"><?= $one_arr['category'] ?></a></li>
<?php endforeach; ?>