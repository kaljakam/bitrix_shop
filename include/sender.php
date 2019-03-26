<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="bx-subscribe">
	<div class="bx-block-title">РАССЫЛКА</div>
	<?$APPLICATION->IncludeComponent("bitrix:sender.subscribe", "mainpage_subscribe", array(
		"SET_TITLE" => "N"
	));?>
</div>