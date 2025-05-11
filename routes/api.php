<?php

CModule::IncludeModule('content.api');

return function (\Bitrix\Main\Routing\RoutingConfigurator $routes) {
    $routes->get('/content/api/{endpoint}', [\Content\Api\Controller\User::class, 'getAction']);
};