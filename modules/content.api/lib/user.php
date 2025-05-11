<?php

namespace Content\Api;

class User
{
    public function getDetailsFromSection(int $iblockId, int $sectionId): array
    {
        if (!\CModule::IncludeModule('iblock')) {
            return ['error' => 'Модуль инфоблоков не подключен'];
        }

        $data = [];

        $filter = [
            'IBLOCK_ID'   => $iblockId,
            'SECTION_ID'  => $sectionId,
            'ACTIVE'      => 'Y',
            'INCLUDE_SUBSECTIONS' => 'Y', // надо с подразделами или нет
        ];
        $select = ['ID', 'CODE', 'DETAIL_TEXT'];

        $res = \CIBlockElement::GetList([], $filter, false, false, $select);

        while ($row = $res->Fetch()) {
            // индексы массива — символьный код записей
            $data[$row['CODE']] = $row['DETAIL_TEXT'];
        }

        return $data;
    }
}