<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>
    <div class="head-menu">
        <a href="#" class="toggle-menu"><span></span></a> <!--меню мобильное-->
        <nav class="main-menu "><!-- меню пк, ноутбук -->
            <ul class="left-menu">

                <?
                foreach ($arResult as $arItem):
                    if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                        continue;
                    ?>
                    <? if ($arItem["SELECTED"]):?>
                    <li class="menu-main active ml0"><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
                <? else:?>
                    <li class="menu-company"><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
                <? endif ?>

                <? endforeach ?>

            </ul>
        </nav>
    </div>
<? endif ?>