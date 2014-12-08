<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    public $layout = '//layouts/column1';
    public $data = array();
    public $flash_message = '';
    public $baseURL;
    public $loadJQuery = true;
    public $loadDatatable = false;
    public $Usertype = null;
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    public $menuclass = null;
    public $subMenu = null;
    public $userModel = null;

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();
    public $flashMessages = array();

    public function init() {
        CHtml::$errorContainerTag = 'label';
        CHtml::$errorCss = 'has-error';
        CHtml::$errorMessageCss  = 'error';
//        CHtml::$errorMessageCssClass = 'error';
        
        $this->flashMessages = Yii::app()->user->getFlashes();

        parent::init();
    }
}