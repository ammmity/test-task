<?php

namespace Kompot\Components;

use Bitrix\Iblock\Component\Tools;
use Bitrix\Main\Context;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Bitrix\Main\Localization\Loc;

class GroupsDetail extends \CBitrixComponent
{

    public function onPrepareComponentParams($arParams): array
    {
        return parent::onPrepareComponentParams($arParams);
    }

    /**
     * @throws LoaderException
     */
    public function __construct($component = null)
    {
        parent::__construct($component);
        Loader::includeModule('iblock');
    }

    /**
     * @return void
     */
    public function executeComponent(): void
    {
        if ($this->startResultCache()) {
            $groupId = $this->arParams['ID'];
            if (!isset($groupId)) {
                $this->process404();
            }

            $group = \Bitrix\Main\GroupTable::getList([
                'select'  => ['ID', 'NAME', 'DESCRIPTION'],
                'filter' => ['ID' => $groupId],
                'cache' => [
                    'ttl' => (int)$this->arParams['CACHE_TIME'],
                ],
            ])->fetch();

            if (!empty($group)) {
                $this->arResult = $group;
                $this->SetResultCacheKeys([]);
                $this->IncludeComponentTemplate();
            } else {
                $this->process404();
            }
        }
    }

    protected function process404($message = 'Страница не найдена'): void
    {
        $this->AbortResultCache();
        Tools::process404(
            'Страница не найдена',
            true,
            true
        );
    }
}