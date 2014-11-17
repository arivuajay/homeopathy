<?php echo CHtml::form(); ?>
    <div id="langdrop">
        <?php echo CHtml::dropDownList('_lang', $currentLang, array(
            'en' => 'English', 'es' => 'Espanol'), array('submit' => '')); ?>
    </div>
<?php echo CHtml::endForm(); ?>