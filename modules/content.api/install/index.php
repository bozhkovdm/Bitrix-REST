<?php

class content_api extends CModule
{
    var $MODULE_ID = 'content.api';
    var $MODULE_NAME = 'Отдача данных по API';
    var $MODULE_DESCRIPTION = "Модуль забирает данные из инфоблоков и отдает по API для дальнейшей обработки на фронтенде";
    var $MODULE_VERSION = "1.0";
    var $MODULE_VERSION_DATE = "2025-04-17 12:00:00";
    var $PARTNER_NAME = 'Dmitry Bozhkov';

    public function DoInstall()
    {
        \Bitrix\Main\ModuleManager::registerModule($this->MODULE_ID);
    }

    public function DoUninstall()
    {
        \Bitrix\Main\ModuleManager::unRegisterModule($this->MODULE_ID);
    }
}
