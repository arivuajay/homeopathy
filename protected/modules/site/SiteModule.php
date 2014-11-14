<?php

class SiteModule extends CWebModule {

    public function init() {
        $this->layoutPath = Yii::getPathOfAlias('site.views.layouts');
        $this->layout = 'column2';
        Yii::app()->theme = "site";
        $this->setComponents(array(
            'errorHandler' => array(
                'errorAction' => 'site/default/error'),
            'user' => array(
                'class' => 'CWebUser',
                'loginUrl' => Yii::app()->createUrl('/site/default/login'),
            )
        ));
        Yii::app()->user->setStateKeyPrefix('_site');
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action))
                return true;
        else
            return false;
    }

}