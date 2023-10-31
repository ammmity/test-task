<?php

namespace Kompot\Components;

use Bitrix\Main\Context;

class Groups extends \CBitrixComponent
{
    public array $arDefaultVariableAliases404 = [];

    public array $arDefaultVariableAliases = [];

    public array $arDefaultUrlTemplates404 = [
        'list' => '',
        'detail' => '#ID#/',
    ];

    public array $arComponentVariables = ['ID'];

    public array $arUrlTemplates = [];

    public string $componentPage = '';

    public array $arVariables = [];

    public bool $isSefMode = false;

    public function onPrepareComponentParams($arParams): array
    {
        if (
            isset($arParams['SEF_MODE'])
            && $arParams['SEF_MODE'] === 'Y'
        ) {
            $this->isSefMode = true;
        }

        return parent::onPrepareComponentParams($arParams);
    }

    /**
     * @return void
     */
    public function executeComponent(): void
    {
        $this->setUrlSefParams();

        $this->includeComponentTemplate($this->arResult['CURRENT_TEMPLATE']);
    }

    /**
     * Установка настроек ЧПУ
     * @return void
     */
    protected function setUrlSefParams(): void
    {
        $request = Context::getCurrent()->getRequest();
        $requestPage = $request->getRequestedPage();

        $arComponentVariables = $this->arComponentVariables;
        $arVariables = $this->arVariables;

        if ($this->isSefMode) {
            $arDefaultUrlTemplates404 = $this->arDefaultUrlTemplates404;
            $arDefaultVariableAliases404 = $this->arDefaultVariableAliases404;

            $arUrlTemplates = \CComponentEngine::MakeComponentUrlTemplates(
                $arDefaultUrlTemplates404,
                $this->arParams['SEF_URL_TEMPLATES']
            );

            $arVariableAliases = \CComponentEngine::MakeComponentVariableAliases(
                $arDefaultVariableAliases404,
                $this->arParams['VARIABLE_ALIASES']
            );

            $componentPage = \CComponentEngine::ParseComponentPath(
                $this->arParams['SEF_FOLDER'],
                $arUrlTemplates,
                $arVariables
            );

            if (!$componentPage) {
                $componentPage = 'list';
            }

            \CComponentEngine::InitComponentVariables(
                $componentPage,
                $arComponentVariables,
                $arVariableAliases,
                $arVariables
            );

            $this->arResult['FOLDER'] = $this->arParams['SEF_FOLDER'];
            $this->arResult['URL_TEMPLATES'] = $arUrlTemplates;
        } else {
            $arDefaultVariableAliases = $this->arDefaultVariableAliases;

            $arVariableAliases = \CComponentEngine::MakeComponentVariableAliases(
                $arDefaultVariableAliases,
                $this->arParams['VARIABLE_ALIASES']
            );

            \CComponentEngine::InitComponentVariables(
                false,
                $arComponentVariables,
                $arVariableAliases,
                $arVariables
            );

            if (isset($arVariables['ID']) && intval($arVariables['ID']) > 0) {
                $componentPage = 'detail';
            } else {
                $componentPage = 'list';
            }

            $this->arResult['FOLDER'] = '';
            $this->arResult['URL_TEMPLATES'] = [
                'list' => $requestPage,
                'detail' => $requestPage . '?' . $arVariableAliases['ID'] . '=#ID#',
            ];
        }

        $this->arResult['VARIABLES'] = $arVariables;
        $this->arResult['ALIASES'] = $arVariableAliases;
        $this->arResult['CURRENT_TEMPLATE'] = $componentPage;
    }
}