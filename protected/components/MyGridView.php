<?php

Yii::import('zii.widgets.grid.CGridView');

class MyGridView extends CGridView {
    
    public function init() {
        
        $this->htmlOptions = array('class' => 'table');
        $this->tagName = 'table';
        $this->itemsCssClass = 'table table-striped table-bordered table-hover grid-table';
        $this->template = '<tr class="paginate-row"><td>{summary}</td><td>{pager}</td></tr>' .
                          '<tr><td  class="bn" colspan="2">{items}</td></tr>' .
                          '<tr class="paginate-row"><td>{summary}</td><td>{pager}</td></tr>';
        $this->pagerCssClass = 'dataTables_paginate paging_bootstrap pagination';
        $this->summaryCssClass = 'dataTables_info';
        $this->summaryText = '<div id="DataTables_Table_0_length" class="dataTables_length"><label>' .
                                    CHtml::dropDownList('pageSize', $pageSize, Yii::app()->params['PAGE_SIZE_LIST'], array(
                                        'onchange' => "$.fn.yiiGridView.update('{$this->id}',{ data:{pageSize: $(this).val() }})",
                                    )) .
                                    '&nbsp; records per page</label></div>';
        
        $this->pager = array(
                    'header' => false,
                    'cssFile' => false,
                    'maxButtonCount' => 5,
                    'selectedPageCssClass' => 'active',
                    'hiddenPageCssClass' => 'disabled',
                    'firstPageCssClass' => 'previous',
                    'lastPageCssClass' => 'next',
                    'firstPageLabel' => '<<',
                    'lastPageLabel' => '>>',
                    'prevPageLabel' => '<',
                    'nextPageLabel' => '>',
                );
        
        parent::init();

//        $classes = array('table');
//        if (isset($this->type) && !empty($this->type)) {
//            if (is_string($this->type)) {
//                $this->type = explode(' ', $this->type);
//            }
//
//            foreach ($this->type as $type) {
//                $classes[] = 'table-' . $type;
//            }
//        }
//        if (!empty($classes)) {
//            $classes = implode(' ', $classes);
//            if (isset($this->itemsCssClass)) {
//                $this->itemsCssClass .= ' ' . $classes;
//            } else {
//                $this->itemsCssClass = $classes;
//            }
//        }
    }

}
