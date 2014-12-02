<?php
$this->widget('application.components.MyMenu', array(
   'activateItemsOuter'=>false,
    'activateItems' => true,
    'activateParents' => true,
    'items' => array(
        array('label' => '<i class="fa fa-dashboard"></i><span>'.Myclass::t('APP218').'</span>', 'url' => array('/portal/default/index')),
        array('label' => '<i class="fa fa-users"></i><span>'.Myclass::t('APP219').'</span>', 'url' => '#','itemOptions' => array("class" => "sub-menu"),
            'items' => array(
                array('label' => '<i class="fa fa-stethoscope"></i><span>'.Myclass::t('APP220').'</span>', 'url' => array('/portal/doctors/index')),
                array('label' => '<i class="fa fa-user-md"></i><span>'.Myclass::t('APP221').'</span> ', 'url' => '#'),
                array('label' => '<i class="fa fa-wheelchair"></i><span>'.Myclass::t('APP222').'</span> ', 'url' => array('/portal/patients/index')),
            ),
        ),
        array('label' => '<i class="fa fa-plus-square"></i><span>'.Myclass::t('APP223').'</span>', 'url' => '#','itemOptions' => array("class" => "sub-menu"),
            'items' => array(
                array('label' => '<i class="fa fa-sitemap"></i><span>'.Myclass::t('APP224').'</span>', 'url' => array('/portal/medcategories/index')),
                array('label' => '<i class="fa fa-medkit"></i><span>'.Myclass::t('APP68').'</span> ', 'url' => array('/portal/medicines/index'))
            ),
        ),
        array('label' => '<i class="fa fa-shopping-cart"></i><span>'.Myclass::t('APP225').'</span>', 'url' => array('/portal/purchaseorder/index')),        
         array('label' => '<i class="fa fa-users"></i><span>'.Myclass::t('APP226').'</span>', 'url' => '#','itemOptions' => array("class" => "sub-menu"),
            'items' => array(
                array('label' => '<i class="fa fa-stethoscope"></i><span>'.Myclass::t('APP227').'</span>', 'url' => '#'),
                array('label' => '<i class="fa fa-user-md"></i><span>'.Myclass::t('APP228').'</span>', 'url' => '#')
            ),
        ),
        array('label' => '<i class="fa fa-truck"></i><span>'.Myclass::t('APP229').'</span>', 'url' => array('/portal/vendors/index')),
        array('label' => '<i class="fa fa-bar-chart-o"></i><span>'.Myclass::t('APP230').'</span>', 'url' => array('/portal/salesorder/index')),
    ),
    'submenuHtmlOptions' => array('class' => 'sub'),
    'htmlOptions' => array('class' => 'sidebar-menu','id'=>'nav-accordion'),
    'encodeLabel' => false,
));
?>