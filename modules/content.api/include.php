<?php

$module_folder = \Bitrix\Main\Application::getDocumentRoot() . '/local/modules/content.api';

\Bitrix\Main\Loader::registerNamespace('Content\Api\Controller', $module_folder . '/controller');