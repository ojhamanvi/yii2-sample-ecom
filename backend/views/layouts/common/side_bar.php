<?php

$menus = [
  'product'=>[
    'label'=>'Products Management',
    'class'=>'product',
    'icon'=>'fa fa-product-hunt',
    'active'=>true,
    'child'=>[
      [
        'label'=>'Products',
        'class'=>'products', 
        'url'=>'products/index',      
      ],
      [
        'label'=>'Categories',
        'class'=>'category', 
        'url'=>'category',          
      ],
      [
        'label'=>'Brands',
        'class'=>'brand',  
        'url'=>'brand',         
      ],

    ],
  ],
  'order'=>[
    'label'=>'Order Management',
    'class'=>'order',
    'icon'=>'fa fa-shopping-cart',
    'active'=>true,
    'child'=>false,
    'url'=>'order',   
  ],
  'invoice'=>[
    'label'=>'Invoice',
    'class'=>'product',
    'icon'=>'fa fa-files-o',
    'active'=>true,
    'child'=>false,
    'url'=>'order',   
  ],
  'users'=>[
    'label'=>'Users Management',
    'class'=>'product',
    'icon'=>'fa fa-users',
    'active'=>true,
    'child'=>false,
    'url'=>'order',   
  ],
  'password'=>[
    'label'=>'Change Password',
    'class'=>'product',
    'icon'=>'fa fa-lock',
    'active'=>true,
    'child'=>false,
    'url'=>'order',   
  ],  

];
?>

 <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <?php foreach ($menus as $menu) {

            if(is_array($menu['child'])){?>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span><?= $menu['label'] ?></span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php foreach ($menu['child'] as $child ) {?>
                  <li><a href="<?= yii\helpers\Url::to(['/'.$child['url']])  ?>"><i class="fa fa-circle-o"></i><?= $child ['label'] ?></a></li>
                 
                <?php } ?>
              </ul>
            </li>

            <?php }else{?>           
            
            <li class="treeview">
              <a href="<?= yii\helpers\Url::to(['/'.$menu['url']])  ?>">
                <i class="<?= $menu['icon'] ?>"></i> <span><?= $menu['label'] ?></span> 
              </a>              
            </li>
           <?php } } ?>
            
            
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>