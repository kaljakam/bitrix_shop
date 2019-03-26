<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");
CJSCore::Init(array("fx"));
$curPage = $APPLICATION->GetCurPage(true);
?>
<!DOCTYPE html>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="shortcut icon" type="image/x-icon" href="<?=htmlspecialcharsbx(SITE_DIR)?>favicon.ico" />
	<?
	$APPLICATION->SetTemplateCSS("/bitrix/css/main/bootstrap.min.css");
	$APPLICATION->SetTemplateCSS("/bitrix/css/main/font-awesome.min.css");

	/*********************** SCSS ***************************/
	$APPLICATION->IncludeComponent(
		"olegpro:olegpro.csscompiler",
		"",
		array(
			"PATH" => "/bitrix/templates/shop/scss/", // Путь к папке с файлами, которые нужно компилировать
			"FILES" => array( // Список файлов для компиляции
				0 => "style.scss",
			),
			"PATH_CSS" => "/bitrix/templates/shop/css/", // Путь к папке, куда складывать скомпилированный css
			"CLASS_HANDLER" => "\\Olegpro\\Csscompiler\\SCSSCompiler", // PHP класс-обработчик, наследуемый от класса \Olegpro\Csscompiler\Compiler(должен реализовывать метод toCss)
			"USE_SETADDITIONALCSS" => "Y", // Подключать скомпилированный css файл через CMain::SetAdditionalCSS()?
			"REMOVE_OLD_CSS_FILES" => "Y", // Удалять старые скомпилированные css файлы?
			"TARGET_FILE_MASK" => "scss_compile_%s.css" // Маска файла для записи css файла. (%s обязателен, он заменится на таймштамп файла)
		),
		false,
		array(
			"HIDE_ICONS" => "Y"
		)
	);
	$APPLICATION->ShowHead(); ?>
	<title><? $APPLICATION->ShowTitle() ?></title>
</head>
<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
    <header class="bx-header main-head">
        <div class="top-menu">
            <div class="container w-100">
                <div class="row">
                    <div class="col-xl-9 col-lg-9 col-md-8 col-sm-6 col-4 pl88">
					<?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "top_menu",
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "top",
                            "USE_EXT" => "N",
                            "COMPONENT_TEMPLATE" => "top_menu"
                        ),
                        false
                    );?>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-8 pr88">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:sale.basket.basket.line",
                                "top_user",
                                array(
                                    "PATH_TO_BASKET" => SITE_DIR . "personal/cart/",
                                    "PATH_TO_PERSONAL" => SITE_DIR . "personal/",
                                    "SHOW_PERSONAL_LINK" => "N",
                                    "SHOW_NUM_PRODUCTS" => "N",
                                    "SHOW_TOTAL_PRICE" => "N",
                                    "SHOW_PRODUCTS" => "N",
                                    "POSITION_FIXED" => "N",
                                    "SHOW_AUTHOR" => "Y",
                                    "PATH_TO_REGISTER" => SITE_DIR . "login/",
                                    "PATH_TO_PROFILE" => SITE_DIR . "personal/",
                                    "COMPONENT_TEMPLATE" => "top_user",
                                    "PATH_TO_ORDER" => SITE_DIR . "personal/order/make/",
                                    "SHOW_EMPTY_VALUES" => "Y",
                                    "PATH_TO_AUTHORIZE" => "",
                                    "SHOW_REGISTRATION" => "Y",
                                    "HIDE_ON_BASKET_PAGES" => "Y"
                                ),
                                false
                            ); ?>
                        </div>

                </div>

				</div>
			</div>





        <div class="middle-head">
            <div class="container w-100">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-4 pl65">
					<div class="bx-logo logo">

						<a class="bx-logo-block " href="<?=htmlspecialcharsbx(SITE_DIR)?>">
							<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/company_logo.php"), false);?>
						</a>

						<!--<a class="bx-logo-block hidden-lg hidden-md hidden-sm text-center" href="<?/*=htmlspecialcharsbx(SITE_DIR)*/?>">
							<?/*$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/company_logo_mobile.php"), false);*/?>
						</a>-->

                        <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/company_logo_text.php"), false);?>
					</div>
				</div>
				<!--<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
					<div class="bx-worktime">
						<div class="bx-worktime-prop">-->
                    <div class="col-xl-7 col-lg-7 col-md-5 col-sm-6 col-6">
                        <div class="search-head d-flex">

							<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/description.php"), false);?>
                            
                        </div>
                    </div>
						<!--</div>
					</div>
				</div>-->
				<!--<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">-->
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-3 col-2">
                        <div class="cont-button d-flex">
                            <div class="cont">
                                <!--почта-->
							    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/email.php"), false);?>
                               <!-- телефон-->
                                <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/telephone.php"), false);?>
                                <a href="#" onclick="javascript:void(0)" class="call_form">ЗАКАЗАТЬ ЗВОНОК</a>
                            </div>
                            <div class="but ml10">
                                <!--корзина-->
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:sale.basket.basket.line",
                                    "top_basket",
                                    array(
                                        "PATH_TO_BASKET" => SITE_DIR."personal/cart/",
                                        "PATH_TO_PERSONAL" => SITE_DIR."personal/",
                                        "SHOW_PERSONAL_LINK" => "N",
                                        "SHOW_NUM_PRODUCTS" => "Y",
                                        "SHOW_TOTAL_PRICE" => "Y",
                                        "SHOW_PRODUCTS" => "N",
                                        "POSITION_FIXED" => "N",
                                        "SHOW_AUTHOR" => "N",
                                        "PATH_TO_REGISTER" => SITE_DIR."login/",
                                        "PATH_TO_PROFILE" => SITE_DIR."personal/",
                                        "COMPONENT_TEMPLATE" => "top_basket",
                                        "PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
                                        "SHOW_EMPTY_VALUES" => "Y",
                                        "PATH_TO_AUTHORIZE" => "",
                                        "SHOW_REGISTRATION" => "Y",
                                        "HIDE_ON_BASKET_PAGES" => "Y"
                                    ),
                                    false
                                );?>
						    </div>
				        </div>
				    </div>
			    </div>
            </div>
        </div>
	</header>

	<div class="workarea">
		<div class="bx-content-section">
			<?
			$hideSidebar =
				defined("HIDE_SIDEBAR") && HIDE_SIDEBAR == true
				|| preg_match("~^".SITE_DIR."(catalog|personal\\/cart|personal\\/order\\/make)/~", $curPage)
			? true : false;
			?>