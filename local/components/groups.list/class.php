<?php

namespace Kompot\Components;

use Bitrix\Iblock\Component\Tools;
use Bitrix\Main\Context;
use Bitrix\Main\Localization\Loc;

class GroupsList extends \CBitrixComponent
{

    public function onPrepareComponentParams($arParams): array
    {
        return parent::onPrepareComponentParams($arParams);
    }

    /**
     * @return void
     */
    public function executeComponent(): void
    {
        if ($this->startResultCache()) {
            $request = Context::getCurrent()->getRequest();
            $requestedPageDirectory = $request->getRequestedPageDirectory();
            $groups = \Bitrix\Main\GroupTable::getList([
                'select' => ['ID', 'NAME'],
                'filter' => ['=ACTIVE' => 'Y']
            ])->fetchAll();

            if (empty($groups)) {
                $this->AbortResultCache();
                Tools::process404(
                    'Страница не найдена',
                    true,
                    true
                );
            }

            foreach ($groups as $k => $group) {
                $groups[$k]['LINK'] = $requestedPageDirectory . $group['ID'] . '/';
            }
            $this->arResult['ITEMS'] = $groups;

            $this->SetResultCacheKeys(['ITEMS']);
            $this->IncludeComponentTemplate();
        }
    }
}