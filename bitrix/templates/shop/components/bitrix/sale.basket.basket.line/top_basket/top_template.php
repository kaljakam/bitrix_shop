<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/**
 * @global array $arParams
 * @global CUser $USER
 * @global CMain $APPLICATION
 * @global string $cartId
 */



$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');
?><!--<div class="bx-hdr-profile">-->
<?if (!$compositeStub && $arParams['SHOW_AUTHOR'] == 'Y'):?>
	<div class="bx-basket-block">
		<i class="fa fa-user"></i>
		<?if ($USER->IsAuthorized()):
			$name = trim($USER->GetFullName());
			if (! $name)
				$name = trim($USER->GetLogin());
			if (strlen($name) > 15)
				$name = substr($name, 0, 12).'...';
			?>
			<a href="<?=$arParams['PATH_TO_PROFILE']?>"><?=htmlspecialcharsbx($name)?></a>
			&nbsp;
			<a href="?logout=yes"><?=GetMessage('TSB1_LOGOUT')?></a>
		<?else:
			$arParamsToDelete = array(
				"login",
				"login_form",
				"logout",
				"register",
				"forgot_password",
				"change_password",
				"confirm_registration",
				"confirm_code",
				"confirm_user_id",
				"logout_butt",
				"auth_service_id",
				"clear_cache"
			);

			$currentUrl = urlencode($APPLICATION->GetCurPageParam("", $arParamsToDelete));
			if ($arParams['AJAX'] == 'N')
			{
				?><script type="text/javascript"><?=$cartId?>.currentUrl = '<?=$currentUrl?>';</script><?
			}
			else
			{
				$currentUrl = '#CURRENT_URL#';
			}
			
			$pathToAuthorize = $arParams['PATH_TO_AUTHORIZE'];
			$pathToAuthorize .= (stripos($pathToAuthorize, '?') === false ? '?' : '&');
			$pathToAuthorize .= 'login=yes&backurl='.$currentUrl;
			?>
			<a href="<?=$pathToAuthorize?>">
				<?=GetMessage('TSB1_LOGIN')?>
			</a>
			<?
			if ($arParams['SHOW_REGISTRATION'] === 'Y')
			{
				$pathToRegister = $arParams['PATH_TO_REGISTER'];
				$pathToRegister .= (stripos($pathToRegister, '?') === false ? '?' : '&');
				$pathToRegister .= 'register=yes&backurl='.$currentUrl;
				?>
				<a href="<?=$pathToRegister?>">
					<?=GetMessage('TSB1_REGISTER')?>
				</a>
				<?
			}
			?>
		<?endif?>
	</div>
<?endif?>



    <!--<div class="but ml10">
        <button class=" pt6 px11">
            <img src="/upload/img/header/basket.png" alt="">
            <span>16</span>
            <p class="pt9 m-0 pb5">450p</p>
        </button>-->
	<div class="but"><?
		if (!$arResult["DISABLE_USE_BASKET"])
		{
			?>
            <button class=" pt6 px11">
                <a href="<?= $arParams['PATH_TO_BASKET'] ?>"><?/*= GetMessage('TSB1_CART') */?>
                <img src="/upload/img/header/basket.png" alt="">
					<span><?

						if (!$compositeStub)
						{
							if ($arParams['SHOW_NUM_PRODUCTS'] == 'Y' && ($arResult['NUM_PRODUCTS'] > 0 || $arParams['SHOW_EMPTY_VALUES'] == 'Y'))
							{
								echo $arResult['NUM_PRODUCTS']; /*в продукт комент*/
							}
						}
						?></span>
				</a><?
		}
		if (!$compositeStub)
		{
			if ($arParams['SHOW_NUM_PRODUCTS'] == 'Y' && ($arResult['NUM_PRODUCTS'] > 0 || $arParams['SHOW_EMPTY_VALUES'] == 'Y'))
			{
				if ($arParams['SHOW_TOTAL_PRICE'] == 'Y')
				{
					?>
					<br <? if ($arParams['POSITION_FIXED'] == 'Y'): ?>class="hidden-xs"<? endif; ?>/>
					<p class="pt9 m-0 pb5">
					<!--текст на сумму--><?/*=GetMessage('TSB1_TOTAL_PRICE')*/?> <strong><?=$arResult['TOTAL_PRICE']?></strong>
					</p>
					<?
				}
			}
		}

		if ($arParams['SHOW_PERSONAL_LINK'] == 'Y'):?>
			<!--<div style="padding-top: 4px;">
			<span class="icon_info"></span>
			<a href="<?/*=$arParams['PATH_TO_PERSONAL']*/?>"><?/*=GetMessage('TSB1_PERSONAL')*/?></a>
			</div>-->
		<?endif?>
            </button>
	</div>
</div>