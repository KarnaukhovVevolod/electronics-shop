<?php
?>

<!-- CATEGORY-MENU-LIST START -->
	                    <div class="left-category-menu hidden-sm hidden-xs">
	                        <div class="left-product-cat">
	                            <div class="category-heading">
	                                <h2>Категории</h2>
	                            </div>
	                            <div class="category-menu-list">
                                        
	                                <ul>
	                                    <!-- Single menu start -->
                                            <?php 
                                                $sub_categ = 'kk;ko';
                                                $categ = 'ijnm,n'; 
                                            ?>
                                            <?php foreach ($category_array as $array): ?>
	                                    <li class="arrow-plus">
	                                        <a href="<?= $array['link_category'] ?>"><?= $array['category'] ?></a>
	                                        <!--  MEGA MENU START -->
	                                        <div class="cat-left-drop-menu">
                                                    <?php foreach($array as $arr): ?>
                                                            <?php if(is_array($arr)): ?>
	                                            <div class="cat-left-drop-menu-left">
                                                        
                                                                <a class="menu-item-heading" href="<?= $arr['link_subcategory'] ?>"><?= $arr['subcategory'] ?></a>
                                                                <?php foreach($arr as $ar): ?>
                                                                    <?php if(is_array($ar)): ?>
                                                                        <ul>
                                                                            <li><a href="<?= $ar['link_type_subcategory'] ?>"><?= $ar['type_of_subcategory'] ?></a></li>
                                                                            <!--<li><a href="#">Clutches</a></li>-->
                                                                            <?php //debug($category) ?>
                                                                        </ul>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                           
                                                    </div>
	                                            <?php endif;?>
                                                        <?php endforeach ?>
	                                        </div>
	                                        <!-- MEGA MENU END -->
                                            <?php endforeach; ?>    
	                                    </li>
	                                    <!-- Single menu end -->
                                            <!-- Single menu start -->
	                                   
	                                    <!-- MENU ACCORDION END -->
	                                </ul>
                                        
	                            </div>
	                        </div>
	                    </div>
<!-- END CATEGORY-MENU-LIST -->
