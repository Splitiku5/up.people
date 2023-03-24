<?php

class TaskDocumentationComponent extends CBitrixComponent
{
    public function executeComponent()
    {
        $this->prepareTemplateParams();
        $this->includeComponentTemplate();
    }

    protected function prepareTemplateParams()
    {
        $this->arResult['Developer'] = 'Rastrosta Gleb';
    }
}



















































































//wow you founded this hidden easter egg. Congratulations =)