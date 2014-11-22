<?php
$this->widget('application.components.MyMenu', array(
   'activateItemsOuter'=>false,
    'activateItems' => true,
    'activateParents' => true,
    'items' => array(
        array('label' => '<i class="fa fa-dashboard"></i><span>Dashboard</span>', 'url' => array('/portal/default/index')),
        array('label' => '<i class="fa fa-users"></i><span>User Management</span>', 'url' => '#','itemOptions' => array("class" => "sub-menu"),
            'items' => array(
                array('label' => '<i class="fa fa-stethoscope"></i><span>Doctors</span>', 'url' => array('/portal/doctors/index')),
                array('label' => '<i class="fa fa-user-md"></i><span>Pharmacist</span> ', 'url' => '#'),
                array('label' => '<i class="fa fa-wheelchair"></i><span>Patient</span> ', 'url' => '#'),
            ),
        ),
        array('label' => '<i class="fa fa-plus-square"></i><span>Medicne Management</span>', 'url' => '#','itemOptions' => array("class" => "sub-menu"),
            'items' => array(
                array('label' => '<i class="fa fa-sitemap"></i><span>Categories</span>', 'url' => array('/portal/medcategories/index')),
                array('label' => '<i class="fa fa-medkit"></i><span>Medicines</span> ', 'url' => array('/portal/medicines/index'))
            ),
        ),
        array('label' => '<i class="fa fa-dashboard"></i><span>Stocks Entry</span>', 'url' => array('/portal/purchaseorder/index')),        
         array('label' => '<i class="fa fa-users"></i><span>Reports</span>', 'url' => '#','itemOptions' => array("class" => "sub-menu"),
            'items' => array(
                array('label' => '<i class="fa fa-stethoscope"></i><span>Sales</span>', 'url' => '#'),
                array('label' => '<i class="fa fa-user-md"></i><span>Purchase</span> ', 'url' => '#')
            ),
        ),
        array('label' => '<i class="fa fa-truck"></i><span>Vendors</span>', 'url' => array('/portal/vendors/index')),
    ),
    'submenuHtmlOptions' => array('class' => 'sub'),
    'htmlOptions' => array('class' => 'sidebar-menu','id'=>'nav-accordion'),
    'encodeLabel' => false,
));
?>