<!DOCTYPE html><html lang="en" dir="ltr"><head><title><?php  if (isset($Result['path'])) : ?><?php $ReverseOrder = $Result['path']; krsort($ReverseOrder); foreach ($ReverseOrder as $pathItem) : ?><?php  echo htmlspecialchars($pathItem['title']).' '?>&laquo;<?php  echo ' ';endforeach;?><?php  endif; ?><?php  echo htmlspecialchars('Otex Connect - live support')?></title><meta http-equiv="content-type" content="text/html; charset=utf-8" /><meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0"><link rel="icon" type="image/png" href="/design/defaulttheme/images/favicon.ico" /><link rel="shortcut icon" type="image/x-icon" href="/design/defaulttheme/images/favicon.ico"><meta name="Keywords" content="" /><meta name="Description" content="" /><meta name="robots" content="noindex, nofollow"><meta name="copyright" content="Surkhail Sohail, otexconnect.com"><?php  if ('ltr' == 'ltr' || 'ltr' == '') : ?><link rel="stylesheet" type="text/css" href="/cache/compiledtemplates/28e3e1ae19d53076b77f5237e0aab368.css" /><?php  else : ?><link rel="stylesheet" type="text/css" href="/cache/compiledtemplates/da8ee0c8615e6458401fd1b74be2c093.css" /><?php  endif;?><?php  echo isset($Result['additional_header_css']) ? $Result['additional_header_css'] : ''?><?php   ?><script type="text/javascript">var WWW_DIR_JAVASCRIPT = '/index.php/site_admin/';var WWW_DIR_JAVASCRIPT_FILES = '/design/defaulttheme/sound';var WWW_DIR_LHC_WEBPACK = '/design/defaulttheme/js/lh/dist/';var WWW_DIR_JAVASCRIPT_FILES_NOTIFICATION = '/design/defaulttheme/images/notification';var confLH = {};<?php  $soundData = array (0 => false,'repeat_sound' => 1,'repeat_sound_delay' => 5,'show_alert' => false,'new_chat_sound_enabled' => true,'new_message_sound_admin_enabled' => true,'new_message_sound_user_enabled' => true,'online_timeout' => 300,'check_for_operator_msg' => 10,'back_office_sinterval' => 10,'chat_message_sinterval' => 3.5,'long_polling_enabled' => false,'polling_chat_message_sinterval' => 1.5,'polling_back_office_sinterval' => 5,'connection_timeout' => 30,'browser_notification_message' => false,); ?>confLH.back_office_sinterval = <?php  echo (int)($soundData['back_office_sinterval']*1000) ?>;confLH.chat_message_sinterval = <?php  echo (int)($soundData['chat_message_sinterval']*1000) ?>;confLH.new_chat_sound_enabled = <?php  echo (int)erLhcoreClassModelUserSetting::getSetting('new_chat_sound',(int)($soundData['new_chat_sound_enabled'])) ?>;confLH.new_message_sound_admin_enabled = <?php  echo (int)erLhcoreClassModelUserSetting::getSetting('chat_message',(int)($soundData['new_message_sound_admin_enabled'])) ?>;confLH.new_message_sound_user_enabled = <?php  echo (int)erLhcoreClassModelUserSetting::getSetting('chat_message',(int)($soundData['new_message_sound_user_enabled'])) ?>;confLH.new_message_browser_notification = <?php  echo isset($soundData['browser_notification_message']) ? (int)($soundData['browser_notification_message']) : 0 ?>;confLH.transLation = {'new_chat':'New chat request'};confLH.csrf_token = '<?php  echo erLhcoreClassUser::instance()->getCSFRToken()?>';confLH.repeat_sound = <?php  echo (int)$soundData['repeat_sound']?>;confLH.repeat_sound_delay = <?php  echo (int)$soundData['repeat_sound_delay']?>;confLH.show_alert = <?php  echo (int)$soundData['show_alert']?>;</script><script type="text/javascript" src="/cache/compiledtemplates/6f598fed8e897108f87f03d596989633.js"></script><?php  echo isset($Result['additional_header_js']) ? $Result['additional_header_js'] : ''?><?php   ?></head><body><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><span><a href="/index.php/site_admin/" title="Home"><img src="/design/defaulttheme/images/general/logo.png" alt="Otex Connect" title="Otex Connect"></a></span></div><div class="modal-body"><?php  echo $Result['content'];?></div></div></div><div class="container-fluid"><script type="text/javascript" language="javascript" src="/cache/compiledtemplates/1c1fdd29a338fb66e0f2564ad7588f37.js"></script><?php  echo isset($Result['additional_footer_js']) ? $Result['additional_footer_js'] : ''?></div><?php  if (false == true) { $debug = ezcDebug::getInstance(); echo $debug->generateOutput(); } ?></body></html>