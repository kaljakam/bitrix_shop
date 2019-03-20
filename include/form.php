<?
// подключение служебной части пролога
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");?>

    <div class="modal_background">
        <div class="modal_form">
            <a href="#" class="close_form">Закрыть форму</a>
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.feedback",
                "callback_popup",
                Array(
                    "EMAIL_TO" => "test@test.ru",
                    "EVENT_MESSAGE_ID" => array("7"),
                    "OK_TEXT" => "Спасибо, ваше сообщение принято.",
                    "REQUIRED_FIELDS" => array("NAME", "EMAIL", "MESSAGE"),
                    "USE_CAPTCHA" => "Y",
                    "AJAX_MODE" => "Y",
                    "AJAX_OPTION_SHADOW" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                )
            );?>
        </div>
    </div>

<?
// подключение визуальной части пролога
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php");?>