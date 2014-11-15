<?php

class PortalModule extends CWebModule {

    public function init() {
        Yii::app()->theme = 'portal';
        $this->layoutPath = Yii::getPathOfAlias('webroot.themes.' . Yii::app()->theme->name . '.views.layouts');
        $this->layout = 'column2';

        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setComponents(array(
            'errorHandler' => array(
                'errorAction' => 'portal/default/error'),
            'user' => array(
                'class' => 'CWebUser',
                'loginUrl' => Yii::app()->createUrl('portal/default/login'),
            )
        ));


        $this->setImport(array(
            'portal.models.*',
            'portal.components.*',
        ));

        Yii::app()->user->setStateKeyPrefix('_portal');
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            $controller->layout = 'column2';
            return true;
        } else
            return false;
    }

}
