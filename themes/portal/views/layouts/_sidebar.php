<?php
$this->widget('application.components.MyMenu', array(
   'activateItemsOuter'=>false,
    'activateItems' => true,
    'activateParents' => true,
    'items' => array(
        array('label' => '<i class="fa fa-dashboard"></i><span>Dashboard</span>', 'url' => array('/portal/default/index')),
        array('label' => '<i class="fa fa-users"></i><span>User Management</span>', 'url' => '#','itemOptions' => array("class" => "sub-menu"),
            'items' => array(
                array('label' => '<i class="fa fa-stethoscope"></i><span>Doctors</span>', 'url' => '#'),
                array('label' => '<i class="fa fa-user-md"></i><span>Pharmacist</span> ', 'url' => '#'),
                array('label' => '<i class="fa fa-wheelchair"></i><span>Patient</span> ', 'url' => '#'),
            ),
        ),
    ),
    'htmlOptions' => array('class' => 'sidebar-menu','id'=>'nav-accordion'),
    'encodeLabel' => false,
));
?>