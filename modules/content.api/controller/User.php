<?php

namespace Content\Api\Controller;

use Bitrix\Main\Engine\Controller;
use Bitrix\Main\Engine\ActionFilter;

class User extends Controller
{
    private \Content\Api\User $user;

    // список эндпоинтов
    private static array $endpointMap = [
        'test' => ['IBLOCK_ID' => 4, 'SECTION_ID' => 16],
    ];

    public function getDefaultPreFilters(): array
    {
        return [
            new ActionFilter\HttpMethod(
                [ActionFilter\HttpMethod::METHOD_GET, ActionFilter\HttpMethod::METHOD_POST]
            ),
        ];
    }

    protected function prepareParams(): bool
    {
        $this->user = new \Content\Api\User();
        return parent::prepareParams();
    }

    /**
     * @param string
     * @return array|void
     */
    public function getAction($endpoint): array
    {
        if (!isset(self::$endpointMap[$endpoint])) {
            global $APPLICATION;
            $APPLICATION->RestartBuffer();
            http_response_code(404);
            header('Content-Type: application/json; charset=UTF-8');
            echo json_encode(['error' => 'Unknown endpoint'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            die();
        }

        $iblockId = self::$endpointMap[$endpoint]['IBLOCK_ID'];
        $sectionId = self::$endpointMap[$endpoint]['SECTION_ID'];

        $result = $this->user->getDetailsFromSection($iblockId, $sectionId);

        global $APPLICATION;
        $APPLICATION->RestartBuffer();
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        die();
    }
}
