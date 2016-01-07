<div class="row"><div class="col-sm-7 chat-main-left-column" id="chat-main-column-<?php  echo $chat->id;?>"><a title="Show/Hide right column" href="#" class="icon-right-circled collapse-right" onclick="lhinst.processCollapse('<?php  echo $chat->id;?>')"></a><?php   ?><div class="message-block"><div class="msgBlock msgBlock-admin" id="messagesBlock-<?php  echo $chat->id?>"><?php $LastMessageID = 0; $messages = erLhcoreClassChat::getChatMessages($chat->id); ?><?php  if ($chat->status != erLhcoreClassModelChat::STATUS_CHATBOX_CHAT) : $lastOperatorChanged = false; $lastOperatorId = false; foreach ($messages as $msg) : if ($lastOperatorId !== false && $lastOperatorId != $msg['user_id']) { $lastOperatorChanged = true; } else { $lastOperatorChanged = false; } $lastOperatorId = $msg['user_id']; if ($msg['user_id'] == -1) : ?><div class="message-row system-response" id="msg-<?php  echo $msg['id']?>"><div class="msg-date"><?php  echo erLhcoreClassChat::formatDate($msg['time']);?></div><i><span class="usr-tit sys-tit">System assistant</span><?php  echo erLhcoreClassBBCode::make_clickable(htmlspecialchars($msg['msg']))?></i></div><?php  else : ?><div class="message-row<?php  echo $msg['user_id'] == 0 ? ' response' : ' message-admin'.($lastOperatorChanged == true ? ' operator-changes' : '') ?>" data-op-id="<?php  echo $msg['user_id']?>" id="msg-<?php  echo $msg['id']?>"><div class="msg-date"><?php  echo erLhcoreClassChat::formatDate($msg['time']);?></div><span class="usr-tit<?php  echo $msg['user_id'] == 0 ? ' vis-tit' : ' op-tit'?>"><?php  echo $msg['user_id'] == 0 ? htmlspecialchars($chat->nick) : htmlspecialchars($msg['name_support']) ?></span><?php  echo erLhcoreClassBBCode::make_clickable(htmlspecialchars($msg['msg']))?></div><?php  endif;?><?php  endforeach; ?><?php  else : ?><?php  foreach ($messages as $msg ) : ?><div class="message-row<?php  echo $msg['user_id'] == 0 ? ' response' : ' message-admin'?>" id="msg-<?php  echo $msg['id']?>"><div class="msg-date"><?php  echo erLhcoreClassChat::formatDate($msg['time']);?></div><span class="usr-tit<?php  echo $msg['user_id'] == 0 ? ' vis-tit' : ' op-tit'?>"><?php  echo $msg['user_id'] == 0 ? htmlspecialchars($msg['name_support']) : htmlspecialchars($chat->nick) ?></span><?php  echo erLhcoreClassBBCode::make_clickable(htmlspecialchars($msg['msg']))?></div><?php  endforeach; ?><?php  endif;?><?php  if (isset($msg)) { $LastMessageID = $msg['id'];} ?><?php  if ($chat->user_status == 1) : ?><div class="message-row system-response"><i><span class="usr-tit sys-tit">System assistant</span>User has left the chat!</i></div><?php  elseif ($chat->user_status == 0) : ?><div class="message-row system-response"><i><span class="usr-tit sys-tit">System assistant</span>User has joined the chat!</i></div><?php  endif;?></div></div><div class="user-is-typing" id="user-is-typing-<?php  echo $chat->id?>">User is typing now...</div><textarea class="form-control form-group" rows="4" <?php  if ($chat->status == erLhcoreClassModelChat::STATUS_CLOSED_CHAT) : ?>readonly="readonly"<?php  endif;?> name="ChatMessage" id="CSChatMessage-<?php  echo $chat->id?>"></textarea><script type="text/javascript">jQuery('#CSChatMessage-<?php  echo $chat->id?>').bind('keydown', 'return', function (evt){lhinst.addmsgadmin('<?php  echo $chat->id?>');return false;});jQuery('#CSChatMessage-<?php  echo $chat->id?>').bind('keyup', 'up', function (evt){lhinst.editPrevious('<?php  echo $chat->id?>');});lhinst.initTypingMonitoringAdmin('<?php  echo $chat->id?>');</script><div class="form-group"><div class="form-group" id="action-block-row-<?php  echo $chat->id?>"><div class="send-row<?php  if ($chat->status == erLhcoreClassModelChat::STATUS_CLOSED_CHAT) : ?> hide<?php  endif;?>"><div class="btn-group btn-group-justified"><a href="#" class="btn btn-default" onclick="return lhinst.addmsgadmin('<?php  echo $chat->id?>')">Send</a><?php  $speech_action_enabled = true;?><?php  if ($speech_action_enabled == true && erLhcoreClassUser::instance()->hasAccessTo('lhspeech','use')) : ?><a class="btn btn-default icon-mic" href="#" id="mic-chat-<?php  echo $chat->id?>" onclick="return lhc.methodCall('lhc.speak','listen',{'chat_id':'<?php  echo $chat->id?>'})"></a><?php  endif;?><?php  $translation_action_enabled = true;?><?php  if ($translation_action_enabled == true && erLhcoreClassUser::instance()->hasAccessTo('lhtranslation','use')) : ?><?php  $dataChatTranslation = !isset($dataChatTranslation) ? array (0 => false,'translation_handler' => 'bing','enable_translations' => false,'bing_client_id' => '','bing_client_secret' => '','google_api_key' => '',) : $dataChatTranslation; ?><?php  if ($dataChatTranslation['enable_translations'] && $dataChatTranslation['enable_translations'] == true) : ?><a class="btn btn-default translate-button-<?php  echo $chat->id?><?php  if ($chat->chat_locale != '' && $chat->chat_locale_to != '') :?> btn-success<?php  endif;?> icon-language" title="Auto translate" id="start-trans-btn-<?php  echo $chat->id?>" onclick="return lhc.methodCall('lhc.translation','startTranslation',{'btn':$(this),'chat_id':'<?php  echo $chat->id?>'})"></a><?php  endif;?><?php  endif;?><?php  $chat_part_canned_messages_action_enabled = true;?><?php  if ($chat_part_canned_messages_action_enabled == true) : ?><a title="Send delayed canned message instantly" href="#" class="btn btn-default icon-mail" onclick="return lhinst.sendCannedMessage('<?php  echo $chat->id?>',$(this))"></a><?php  endif;?></div></div><?php  if ($chat->status == erLhcoreClassModelChat::STATUS_CLOSED_CHAT) : ?><input type="button" value="Reopen chat" class="btn btn-default" data-id="<?php  echo $chat->id?>" onclick="lhinst.reopenchat($(this))" /><?php  endif;?></div><?php  $chat_part_canned_messages_action_enabled = true;?><?php  if ($chat_part_canned_messages_action_enabled == true) : ?><div class="row"><div class="col-xs-8"><select class="form-control" name="CannedMessage-<?php  echo $chat->id?>" id="id_CannedMessage-<?php  echo $chat->id?>"><option value="">Select a canned message</option><?php   $nameSupport = (string)erLhcoreClassUser::instance()->getUserData(true)->name_support; $replaceArray = array( '{nick}' => $chat->nick, '{email}' => $chat->email, '{phone}' => $chat->phone, '{operator}' => $nameSupport ); $additionalData = $chat->additional_data_array; foreach ($additionalData as $row) { if (isset($row->identifier) && $row->identifier != ''){ $replaceArray['{'.$row->identifier.'}'] = $row->value; } } erLhcoreClassChatEventDispatcher::getInstance()->dispatch('chat.workflow.canned_message_replace',array('chat' => $chat, 'replace_array' => & $replaceArray)); foreach (erLhcoreClassModelCannedMsg::getCannedMessages($chat->dep_id,erLhcoreClassUser::instance()->getUserID()) as $item) : $item->setReplaceData($replaceArray); ?><option data-msg="<?php  echo htmlspecialchars($item->msg_to_user)?>" data-delay="<?php  echo $item->delay?>" value="<?php  echo $item->id?>"><?php  echo htmlspecialchars($item->message_title)?></option><?php  endforeach;?></select></div><div class="col-xs-4 sub-action-chat"><a title="Fill textarea with canned message" href="#" onclick="$('#CSChatMessage-<?php  echo $chat->id?>').val(($('#id_CannedMessage-<?php  echo $chat->id?>').val() > 0) ? $('#id_CannedMessage-<?php  echo $chat->id?>').find(':selected').attr('data-msg') : '');return false;" class="btn btn-default icon-pencil"></a></div></div><?php  endif;?></div></div><div class="col-sm-5 chat-main-right-column" id="chat-right-column-<?php  echo $chat->id;?>"><div role="tabpanel" class="tab-pane active" id="options"><ul class="nav nav-pills" role="tablist" id="chat-tab-items-<?php  echo $chat->id?>"><?php $chatTabsOrder = array( 'operator_remarks_tab', 'chat_translation_tab', 'information_tab_tab', 'map_tab_tab', 'operator_screenshot_tab', 'footprint_tab_tab', 'information_tab_user_files_tab', 'online_user_info_tab', 'extension_chat_tab_multiinclude', ); $chatTabsOrderDefault = 'operator_remarks_tab'; ?><?php foreach ($chatTabsOrder as $tabItem) : ?><?php  if ($tabItem == 'operator_remarks_tab') : ?><?php  $operator_remarks_tab_enabled = true;?><?php  if ($operator_remarks_tab_enabled == true) : ?><li role="presentation"<?php  if ($chatTabsOrderDefault == 'operator_remarks_tab') print ' class="active"';?>><a href="#main-user-info-remarks-<?php  echo $chat->id?>" aria-controls="main-user-info-remarks-<?php  echo $chat->id?>" role="tab" data-toggle="tab" title="Tips"><i class="icon-pencil"></i></a></li><?php  endif;?><?php  elseif ($tabItem == 'chat_translation_tab') : ?><?php  $chat_translation_tab_enabled = true;?><?php  if ($chat_translation_tab_enabled == true && erLhcoreClassUser::instance()->hasAccessTo('lhtranslation','use')) : ?><?php  $dataChatTranslation = !isset($dataChatTranslation) ? array (0 => false,'translation_handler' => 'bing','enable_translations' => false,'bing_client_id' => '','bing_client_secret' => '','google_api_key' => '',) : $dataChatTranslation; ?><?php  if ($dataChatTranslation['enable_translations'] && $dataChatTranslation['enable_translations'] == true) : ?><li role="presentation"<?php  if ($chatTabsOrderDefault == 'chat_translation_tab') print ' class="active"';?>><a href="#main-user-info-translation-<?php  echo $chat->id?>" aria-controls="main-user-info-translation-<?php  echo $chat->id?>" title="Automatic translation" role="tab" data-toggle="tab"><i class="icon-language"></i></a></li><?php  endif;?><?php  endif;?><?php  elseif ($tabItem == 'information_tab_tab') : ?><li role="presentation"<?php  if ($chatTabsOrderDefault == 'information_tab_tab') print ' class="active"';?>><a href="#main-user-info-tab-<?php  echo $chat->id?>" aria-controls="main-user-info-tab-<?php  echo $chat->id?>" role="tab" data-toggle="tab" title="Visitor Details"><i class="icon-info"></i></a></li><?php  elseif ($tabItem == 'information_tab_user_files_tab') : ?><?php  $fileData = (array)erLhcoreClassModelChatConfig::fetch('file_configuration')->data?><?php  if ( isset($fileData['active_admin_upload']) && $fileData['active_admin_upload'] == true && erLhcoreClassUser::instance()->hasAccessTo('lhfile','use_operator') ) : ?><?php  $information_tab_user_files_tab_enabled = true;?><?php  if ($information_tab_user_files_tab_enabled == true) : ?><li role="presentation"<?php  if ($chatTabsOrderDefault == 'information_tab_user_files_tab') print ' class="active"';?>><a href="#main-user-info-files-<?php  echo $chat->id?>" aria-controls="main-user-info-files-<?php  echo $chat->id?>" title="Files" role="tab" data-toggle="tab"><i class="icon-attach"></i></a></li><?php  endif;?><?php  endif; ?><?php  elseif ($tabItem == 'operator_screenshot_tab') : ?><?php  $operator_screenshot_tab_enabled = true;?><?php  if ($operator_screenshot_tab_enabled == true && erLhcoreClassUser::instance()->hasAccessTo('lhchat','take_screenshot')) : ?><li role="presentation"<?php  if ($chatTabsOrderDefault == 'operator_screenshot_tab') print ' class="active"';?>><a href="#main-user-info-screenshot-<?php  echo $chat->id?>" aria-controls="main-user-info-screenshot-<?php  echo $chat->id?>" title="Screenshot" role="tab" data-toggle="tab"><i class="icon-picture"></i></a></li><?php  endif;?><?php  elseif ($tabItem == 'footprint_tab_tab') : ?><?php  $chat_chat_tabs_footprint_tab_tab_enabled = true; ?><?php  if ($chat_chat_tabs_footprint_tab_tab_enabled == true && '0' == 1) : ?><li role="presentation"<?php  if ($chatTabsOrderDefault == 'footprint_tab_tab') print ' class="active"';?>><a href="#footprint-tab-chat-<?php  echo $chat->id?>" aria-controls="footprint-tab-chat-<?php  echo $chat->id?>" role="tab" data-toggle="tab" title="Footprint"><i class="icon-chart-line"></i></a></li><?php  endif;?><?php  elseif ($tabItem == 'map_tab_tab') : ?><?php  $information_tab_map_tab_tab_enabled = true;?><?php  if ($information_tab_map_tab_tab_enabled == true) : ?><li role="presentation"<?php  if ($chatTabsOrderDefault == 'map_tab_tab') print ' class="active"';?>><a href="#map-tab-chat-<?php  echo $chat->id?>" title="Lead Routing" aria-controls="map-tab-chat-<?php  echo $chat->id?>" role="tab" data-toggle="tab"><i class="icon-globe"></i></a></li><?php  endif;?><?php  elseif ($tabItem == 'online_user_info_tab') : ?><?php  if (($online_user = $chat->online_user) !== false) : ?><?php  $information_tab_online_user_info_tab_enabled = true;?><?php  if ($information_tab_online_user_info_tab_enabled == true) : ?><li role="presentation"<?php  if ($chatTabsOrderDefault == 'online_user_info_tab') print ' class="active"';?>><a href="#online-user-info-tab-<?php  echo $chat->id?>" aria-controls="online-user-info-tab-<?php  echo $chat->id?>" role="tab" data-toggle="tab" title="User browsing information"><i class="icon-network"></i></a></li><?php  endif;?><?php  $information_tab_online_user_info_tab_chats_enabled = true?><?php  if ($information_tab_online_user_info_tab_chats_enabled == true) : ?><li role="presentation"><a href="#online-user-info-chats-tab-<?php  echo $chat->id?>" aria-controls="online-user-info-chats-tab-<?php  echo $chat->id?>" role="tab" data-toggle="tab" title="Chats"><i class="icon-chat"></i></a></li><?php  endif;?><?php  endif;?><?php  elseif ($tabItem == 'extension_chat_tab_multiinclude') : ?><?php   ?><?php  endif;?><?php  endforeach; ?></ul><div class="tab-content"><div role="tabpanel" class="tab-pane<?php  if ($chatTabsOrderDefault == 'information_tab_tab') print ' active';?>" id="main-user-info-tab-<?php  echo $chat->id?>"><div class="pull-right operator-info pt5"><span class="pull-left label label-default fs12<?php  if (erLhcoreClassUser::instance()->hasAccessTo('lhchat','canchangechatstatus')) : ?> action-image<?php  endif?>" id="chat-status-text-<?php  echo $chat->id?>" <?php  if (erLhcoreClassUser::instance()->hasAccessTo('lhchat','canchangechatstatus')) : ?>title="Click to change chat status" onclick="return lhc.revealModal({'url':WWW_DIR_JAVASCRIPT +'chat/changestatus/<?php  echo $chat->id?>'})"<?php  endif;?>><?php  if ($chat->status == erLhcoreClassModelChat::STATUS_PENDING_CHAT) : ?>Pending chat<?php  elseif ($chat->status == erLhcoreClassModelChat::STATUS_ACTIVE_CHAT) : ?>Active chat<?php  elseif ($chat->status == erLhcoreClassModelChat::STATUS_CLOSED_CHAT) : ?>Closed chat<?php  elseif ($chat->status == erLhcoreClassModelChat::STATUS_CHATBOX_CHAT) : ?>Chatbox chat<?php  elseif ($chat->status == erLhcoreClassModelChat::STATUS_OPERATORS_CHAT) : ?>Operators chat<?php  endif;?></span></div><br><div><a onclick="return lhc.revealModal({'iframe':true,'height':350,'url':WWW_DIR_JAVASCRIPT +'chat/modifychat/<?php  echo $chat->id?>'})" title="Edit main chat information" href="#"><i class="icon-pencil"></i></a><?php  if (!isset($hideActionBlock)) : ?><a class="icon-popup" data-title="<?php  echo htmlspecialchars($chat->nick,ENT_QUOTES);?>" onclick="lhinst.startChatCloseTabNewWindow('<?php  echo $chat->id;?>',$('#tabs'),$(this).attr('data-title'))" title="Open in a new window"><a class="icon-cancel" onclick="lhinst.removeDialogTab('<?php  echo $chat->id?>',$('#tabs'),true)" title="Close dialog"></a><?php  if ($chat->user_id == erLhcoreClassUser::instance()->getUserID() || erLhcoreClassUser::instance()->hasAccessTo('lhchat','allowcloseremote')) : ?><a class="icon-cancel-circled" onclick="lhinst.closeActiveChatDialog('<?php  echo $chat->id?>',$('#tabs'),true)" title="Close chat"></a><?php  endif;?><?php  if (erLhcoreClassUser::instance()->hasAccessTo('lhchat','deleteglobalchat') || (erLhcoreClassUser::instance()->hasAccessTo('lhchat','deletechat') && $chat->user_id == erLhcoreClassUser::instance()->getUserID())) : ?><a class="icon-cancel-squared" onclick="lhinst.deleteChat('<?php  echo $chat->id?>',$('#tabs'),true)" title="Delete chat"></a><?php  endif ?><?php  $chat_chat_tabs_actions_transfer_enabled = true;?><?php  if ($chat_chat_tabs_actions_transfer_enabled == true && erLhcoreClassUser::instance()->hasAccessTo('lhchat', 'allowtransfer')) : ?><a class="icon-users" onclick="lhc.revealModal({'url':WWW_DIR_JAVASCRIPT +'chat/transferchat/<?php  echo $chat->id?>'})" title="Transfer chat"><?php  endif; ?><?php  if (erLhcoreClassUser::instance()->hasAccessTo('lhchat','allowblockusers')) : ?><?php  $chat_chat_tabs_actions_blockuser_enabled = true;?><?php  if ($chat_chat_tabs_actions_blockuser_enabled == true) : ?><a class="icon-block" data-title="Are you sure?" onclick="lhinst.blockUser('<?php  echo $chat->id?>',$(this).attr('data-title'))" title="Block user"></a><?php  endif;?><?php  endif;?><a class="icon-mail <?php  if ($chat->mail_send == 1) : ?>icon-mail-send<?php  endif; ?>" onclick="lhc.revealModal({'iframe':true,'height':500,'url':WWW_DIR_JAVASCRIPT +'chat/sendmail/<?php  echo $chat->id?>'})" title="<?php  if ($chat->mail_send == 1) : ?>Mail was send<?php  else : ?>Send mail<?php  endif;?>"></a><a class="icon-reply" title="Redirect user to contact form." onclick="lhinst.redirectContact('<?php  echo $chat->id;?>','Are you sure?')" ></a><a target="_blank" href="/index.php/site_admin/chat/printchatadmin/<?php  echo $chat->id?>" class="icon-print" title="Print"></a><?php  $chat_chat_tabs_actions_attatch_file_enabled = true;?><?php  if ($chat_chat_tabs_actions_attatch_file_enabled == true) : ?><a class="icon-attach" onclick="return lhc.revealModal({'iframe':true,'height':500,'url':WWW_DIR_JAVASCRIPT +'file/attatchfile/<?php  echo $chat->id?>'})" title="Attach uploaded file"></a><?php  endif;?><?php  if (erLhcoreClassUser::instance()->hasAccessTo('lhchat','allowredirect')) : ?><a class="icon-network" onclick="lhinst.redirectToURL('<?php  echo $chat->id?>','Please enter a URL')" title="Redirect user to another url"></a><?php  endif;?><?php  $chat_chat_tabs_actions_speech_enabled = true;?><?php  if ($chat_chat_tabs_actions_speech_enabled == true && erLhcoreClassUser::instance()->hasAccessTo('lhspeech','change_chat_recognition')) : ?><a class="icon-mic" title="Choose other than default recognition language" onclick="lhc.revealModal({'url':'/index.php/site_admin/speech/setchatspeechlanguage/<?php  echo $chat->id?>'})"></a><?php  endif;?><?php  $chat_chat_tabs_actions_cobrowse_enabled = true;?><?php  if ($chat_chat_tabs_actions_cobrowse_enabled == true && erLhcoreClassUser::instance()->hasAccessTo('lhcobrowse', 'browse')) : ?><a title="Screen sharing" class="icon-eye" href="#" onclick="return lhinst.startCoBrowse('<?php  echo $chat->id?>')"></a><?php  endif;?><?php   ?><?php  else : ?><a class="icon-print" target="_blank" href="/index.php/site_admin/chatarchive/printchatadmin/<?php  echo $archive->id?>/<?php  echo $chat->id?>"></a><a class="icon-mail" onclick="return lhc.revealModal({'iframe':true,'height':500,'url':WWW_DIR_JAVASCRIPT +'chatarchive/sendmail/<?php  echo $archive->id?>/<?php  echo $chat->id?>'})"></a><?php  endif; ?></div><br><table class="table table-condensed"><?php  if ( !empty($chat->country_code) ) : ?><tr><td>Country</td><td><img src="/design/defaulttheme/images/flags/<?php  echo $chat->country_code?>.png" alt="<?php  echo htmlspecialchars($chat->country_name)?>" title="<?php  echo htmlspecialchars($chat->country_name)?>" /></td></tr><?php  endif;?><?php  if ( !empty($chat->user_tz_identifier) ) : ?><tr><td>Time zone</td><td><?php  echo htmlspecialchars($chat->user_tz_identifier)?>, <?php  echo htmlspecialchars($chat->user_tz_identifier_time)?></td></tr><?php  endif;?><?php  if ( !empty($chat->city) ) : ?><tr><td>City</td><td><?php  echo htmlspecialchars($chat->city);?></td></tr><?php  endif;?><tr><td>IP</td><td><?php  echo $chat->ip?></td></tr><?php  if (!empty($chat->referrer)) : ?><tr><td>Page</td><td><div class="page-url"><span><?php  echo $chat->referrer != '' ? '<a target="_blank" title="' . htmlspecialchars($chat->referrer) . '" href="' .htmlspecialchars($chat->referrer). '">'.htmlspecialchars($chat->referrer).'</a>' : ''?></span></div></td></tr><?php  endif;?><?php  if (!empty($chat->session_referrer)) : ?><tr><td>Came from</td><td><div class="page-url"><span><?php  echo $chat->session_referrer != '' ? '<a target="_blank" title="' . htmlspecialchars($chat->session_referrer) . '" href="' . htmlspecialchars($chat->session_referrer) . '">'.htmlspecialchars($chat->session_referrer).'</a>' : ''?></span></div></td></tr><?php  endif;?><tr><td>ID</td><td><?php  echo $chat->id;?></td></tr><?php  if (!empty($chat->email)) : ?><tr><td>E-mail</td><td><a href="mailto:<?php  echo $chat->email?>"><?php  echo $chat->email?></a></td></tr><?php  endif;?><?php  if (!empty($chat->phone)) : ?><tr><td>Phone</td><td><?php  echo htmlspecialchars($chat->phone)?></td></tr><?php  endif;?><?php   ?><?php  if (!empty($chat->additional_data)) : ?><tr><td>Additional data</td><td><?php  if (is_array($chat->additional_data_array)) : ?><ul class="circle mb0"><?php  foreach ($chat->additional_data_array as $addItem) : ?><li><?php  echo htmlspecialchars($addItem->key)?> - <?php  echo htmlspecialchars($addItem->value)?></li><?php  endforeach;?></ul><?php  else : ?><?php  echo htmlspecialchars($chat->additional_data)?><?php  endif;?></td></tr><?php  endif;?><tr><td>Created</td><td><?php  echo date(erLhcoreClassModule::$dateDateHourFormat,$chat->time)?></td></tr><?php  if ($chat->user_closed_ts > 0 && $chat->user_status == 1) : ?><tr><td>User left</td><td><?php  echo $chat->user_closed_ts_front?></td></tr><?php  endif;?><?php  if ($chat->wait_time > 0) : ?><tr><td>Waited</td><td><?php  echo $chat->wait_time_front?></td></tr><?php  endif;?><?php  if ($chat->chat_duration > 0) : ?><tr><td>Chat duration</td><td><?php  echo $chat->chat_duration_front?></td></tr><?php  endif;?><tr><td>Chat duration</td><td><?php  echo $chat->chat_duration_front?></td></tr><?php  if ($chat->status == erLhcoreClassModelChat::STATUS_OPERATORS_CHAT) : ?><tr><td>Chat between operators, chat initializer</td><td><?php  echo htmlspecialchars($chat->nick)?></td></tr><?php  endif;?><tr><td>Chat owner</td><td><?php  $user = $chat->getChatOwner(); if ($user !== false) : ?><?php  echo htmlspecialchars($user->name.' '.$user->surname)?><?php  endif; ?></td></tr></table></div><div role="tabpanel" class="tab-pane<?php  if ($chatTabsOrderDefault == 'operator_remarks_tab') print ' active';?>" id="main-user-info-remarks-<?php  echo $chat->id?>"><?php  $operator_remarks_enabled = true;?><?php  if ($operator_remarks_enabled == true) : ?><div id="remarks-status-<?php  echo $chat->id?>" class="icon-pencil pb10 success-color"> Tips </div><?php  endif; ?></div><?php  if ( isset($fileData['active_admin_upload']) && $fileData['active_admin_upload'] == true && erLhcoreClassUser::instance()->hasAccessTo('lhfile','use_operator') ) : ?><div role="tabpanel" class="tab-pane<?php  if ($chatTabsOrderDefault == 'information_tab_user_files_tab') print ' active';?>" id="main-user-info-files-<?php  echo $chat->id?>"><div><input type="button" value="Refresh" class="btn btn-default" onclick="lhinst.updateChatFiles('<?php  echo $chat->id?>')" /><ul id="chat-files-list-<?php  echo $chat->id?>"><?php  foreach (erLhcoreClassChat::getList(array('filter' => array('chat_id' => $chat->id)),'erLhcoreClassModelChatFile','lh_chat_file') as $file) : ?><li id="file-id-<?php  echo $file->id?>"><a title="Delete file" onclick="return lhinst.deleteChatfile('<?php  echo $file->id?>')" class="btn btn-xs btn-danger icon-trash"></a><a href="/index.php/site_admin/file/downloadfile/<?php  echo $file->id?>/<?php  echo $file->security_hash?>" class="link" target="_blank"><?php  if ($file->user_id == 0) : ?>Sent by Customer<?php  else : ?>Sent by Operator<?php  endif;?> - <?php  echo htmlspecialchars($file->upload_name).' ['.$file->extension.']'?></a></li><?php  endforeach;?></ul></div><div class="form-group"><input id="fileupload-<?php  echo $chat->id?>" class="fs12" type="file" name="files[]" multiple></div><div class="drop-zone form-group" id="drop-zone-<?php  echo $chat->id?>"><div class="drop-title">Drop your files here.</div></div><script>lhinst.addFileUpload({ft_msg:'Not an accepted file type',fs_msg:'Filesize is too big',chat_id:'<?php  echo $chat->id?>',fs:<?php  echo $fileData['fs_max']*1024?>,ft_op:/(\.|\/)(<?php  echo $fileData['ft_op']?>)$/i});</script></div><?php  endif; ?><?php  $chat_translation_enabled = true;?><?php  if ($chat_translation_enabled == true && erLhcoreClassUser::instance()->hasAccessTo('lhtranslation','use')) : ?><?php   if ($dataChatTranslation['enable_translations'] && $dataChatTranslation['enable_translations'] == true) : ?><div role="tabpanel" class="tab-pane<?php  if ($chatTabsOrderDefault == 'chat_translation_tab') print ' active';?>" id="main-user-info-translation-<?php  echo $chat->id?>"><div class="row"><div class="col-xs-6"><div class="form-group"><label>Visitor language</label><?php  echo erLhcoreClassRenderHelper::renderCombobox( array ( 'input_name' => 'chat_locale_'.$chat->id, 'optional_field' => 'Automatically detected', 'selected_id' => $chat->chat_locale, 'css_class' => 'form-control', 'list_function' => 'erLhcoreClassTranslate::getSupportedLanguages' )); ?></div></div><div class="col-xs-6"><div class="form-group"><label>My language</label><?php  echo erLhcoreClassRenderHelper::renderCombobox( array ( 'input_name' => 'chat_locale_to_'.$chat->id, 'optional_field' => 'Automatically detected', 'selected_id' => $chat->chat_locale_to, 'css_class' => 'form-control', 'list_function' => 'erLhcoreClassTranslate::getSupportedLanguages' )); ?></div></div></div><div class="btn-group form-group" role="group" aria-label="..."><input type="button" value="Auto translate" class="translate-button-<?php  echo $chat->id?> btn btn-default<?php  if ($chat->chat_locale != '' && $chat->chat_locale_to != '') :?> btn-success<?php  endif;?>" data-loading-text="Translating..." onclick="return lhc.methodCall('lhc.translation','startTranslation',{'btn':$(this),'chat_id':'<?php  echo $chat->id?>'})" /></div></div><?php  endif;?><?php  endif;?><?php  $operator_screenshot_enabled = true ?><?php  if ($operator_screenshot_enabled == true && erLhcoreClassUser::instance()->hasAccessTo('lhchat','take_screenshot')) : ?><div role="tabpanel" class="tab-pane<?php  if ($chatTabsOrderDefault == 'operator_screenshot_tab') print ' active';?>" id="main-user-info-screenshot-<?php  echo $chat->id?>"><div class="btn-group" role="group" aria-label="..."><input type="button" value="Take user screenshot" class="btn btn-default" onclick="lhinst.addRemoteCommand('<?php  echo $chat->id?>','lhc_screenshot')" /><input type="button" value="Refresh" class="btn btn-default" onclick="lhinst.updateScreenshot('<?php  echo $chat->id?>')" /></div><div id="user-screenshot-container"><?php  if ($chat->screenshot !== false) : ?><h5>Taken <?php  echo $chat->screenshot->date_front?></h5><a href="/index.php/site_admin/file/downloadfile/<?php  echo $chat->screenshot->id?>/<?php  echo $chat->screenshot->security_hash?>/(inline)/true" target="_blank" class="screnshot-container"><img id="screenshotImage" src="/index.php/site_admin/file/downloadfile/<?php  echo $chat->screenshot->id?>/<?php  echo $chat->screenshot->security_hash?>" alt="" /></a><script>$(document).ready(function(){$('.screnshot-container').zoom();});</script><?php  else : ?><br/>Empty...<?php  endif;?></div></div><?php  endif;?><?php  $chat_chat_tabs_footprint_tab_enabled = true; ?><?php  if ($chat_chat_tabs_footprint_tab_enabled == true && '0' == 1) : ?><div role="tabpanel" class="tab-pane<?php  if ($chatTabsOrderDefault == 'footprint_tab_tab') print ' active';?>" id="footprint-tab-chat-<?php  echo $chat->id?>"><div class="mx170"><a class="btn btn-default btn-xs" rel="<?php  echo $chat->id?>" onclick="lhinst.refreshFootPrint($(this))">Refresh</a><ul class="foot-print-content circle" id="footprint-<?php  echo $chat->id?>"><?php $filter = $chat->online_user_id == 0 ? array('chat_id' => $chat->id) : array('online_user_id' => $chat->online_user_id); foreach (erLhcoreClassModelChatOnlineUserFootprint::getList(array('filter' => $filter)) as $footprintItems) : ?><li><a target="_blank" href="<?php  echo htmlspecialchars($footprintItems->page);?>"><?php  echo $footprintItems->time_ago?> | <?php  echo htmlspecialchars($footprintItems->page);?></a></li><?php  endforeach;?></ul></div></div><?php  endif;?><?php  $information_tab_map_tab_enabled = true;?><?php  if ($information_tab_map_tab_enabled == true) : ?><div role="tabpanel" class="tab-pane<?php  if ($chatTabsOrderDefault == 'map_tab_tab') print ' active';?>" id="map-tab-chat-<?php  echo $chat->id?>"><p>Lead Routing.</p><div class="form-group"><label>Name</label><input type="text" id="txt" class="form-control" name="Name"  value="" /></div><div class="form-group"><label>E-mail</label><input type="text" id="txt1" class="form-control" name="Email"  value="" /></div><div class="form-group"><label>Phone</label><input type="text" id="txt2" class="form-control" name="Phone"  value="" /></div><div class="form-group"><label>Comments</label><input type="text" id="txt3" class="form-control" name="Comments"  value="" /></div><div class="form-group"><label>Team</label><input type="text" id="txt4" class="form-control" name="Team"  value="" /></div><div class="btn-group" role="group" aria-label="..."><input type="submit" class="btn btn-default" name="Save_departament" onclick="myFunction()" value="Submit"/></div><div><br /><p id="demo"></p><p id="demo1"></p><p id="demo2"></p><p id="demo3"></p></div><script>function myFunction() {var x = document.getElementById("txt").value;document.getElementById("demo").innerHTML = x;var y = document.getElementById("txt1").value;document.getElementById("demo1").innerHTML = y;var z = document.getElementById("txt2").value;document.getElementById("demo2").innerHTML = z;var a = document.getElementById("txt3").value;document.getElementById("demo3").innerHTML = a;}</script></div><?php  endif;?><?php  if (($online_user = $chat->online_user) !== false) : ?><?php  $information_tab_online_user_info_enabled = true;?><?php  if ($information_tab_online_user_info_enabled == true) : ?><div role="tabpanel" class="tab-pane<?php  if ($chatTabsOrderDefault == 'online_user_info_tab') print ' active';?>" id="online-user-info-tab-<?php  echo $chat->id?>"><a class="btn btn-default btn-xs" rel="<?php  echo $chat->id?>" onclick="lhinst.refreshOnlineUserInfo($(this))">Refresh</a><div id="online-user-info-<?php  echo $chat->id?>"><div class="pull-right"><p class="fs12"><?php  if ( !empty($online_user->user_country_code) ) : ?><img src="/design/defaulttheme/images/flags/<?php  echo $online_user->user_country_code?>.png" alt="<?php  echo htmlspecialchars($online_user->user_country_name)?>" title="<?php  echo htmlspecialchars($online_user->user_country_name)?>" /><?php  endif; ?> (<?php  echo $online_user->ip?>)<?php  if ( !empty($online_user->city) ) :?><br/>City: <?php  echo htmlspecialchars($online_user->city) ?><?php  endif;?><?php  if ( !empty($online_user->lat) ) :?><br/>Lat. <?php  echo htmlspecialchars($online_user->lat) ?><?php  endif;?><?php  if ( !empty($online_user->lon) ) :?><br/>Lon. <?php  echo htmlspecialchars($online_user->lon) ?><?php  endif;?><?php  if ( !empty($online_user->visitor_tz) ) :?><br/>Time zone: <?php  echo htmlspecialchars($online_user->visitor_tz),' ',$online_user->visitor_tz_time ?><?php  endif;?><?php  if (!empty($online_user->identifier)) : ?><br/>Identifier - <?php  echo htmlspecialchars($online_user->identifier)?><?php  endif;?></p><?php  if ($online_user->online_attr != '') : ?><h5>Additional information</h5><pre><?php  echo htmlspecialchars(json_encode(json_decode($online_user->online_attr),JSON_PRETTY_PRINT));?></pre><?php  endif;?></div><h5>Last activity <?php  echo htmlspecialchars($online_user->lastactivity_ago)?> ago<?php  $timeoutOnPage = (int)'0'; if ($timeoutOnPage > 0) : ?>,<br/><b>On page - <?php  if ($online_user->last_check_time_ago < ($timeoutOnPage+3)) : ?><i class="icon-user-status icon-user icon-user-online" title="Yes"></i><?php  else : ?><i class="icon-user-status icon-user" title="No"></i><?php  endif;?></b><?php  endif;?></h5><img src="<?php  if ($online_user->operator_message == '') : ?>/design/defaulttheme/images/icons/user_inactive.png<?php  elseif ($online_user->message_seen == 1 && $online_user->operator_message != '') : ?>/design/defaulttheme/images/icons/user_green_32.png<?php  else : ?>/design/defaulttheme/images/icons/user.png<?php  endif;?>" title="<?php  if ($online_user->message_seen == 0) : ?><?php  if ($online_user->operator_message == '') : ?>User does not have any message from operator<?php  else : ?>User have not seen message from operator, or message window still open.<?php  endif; ?><?php  else : ?>User has seen message from operator.<?php  endif; ?>" /><img src="/design/defaulttheme/images/icons/browsers.png" title="<?php  echo htmlspecialchars($online_user->user_agent)?>" /><?php  if ($online_user->chat_id > 0) : ?><img <?php  if ($online_user->can_view_chat == true) : ?>class="action-image" onclick="lhc.previewChat('<?php  echo $online_user->chat_id?>');"<?php  endif;?> src="/design/defaulttheme/images/icons/user_comment.png" title="User is chatting" /><?php  else : ?><img src="/design/defaulttheme/images/icons/user_comment_inactive.png" title="User is not having any chat right now" /><?php  endif; ?><?php  if ( ($operator_user = $online_user->operator_user) !== false ) : ?><img src="/design/defaulttheme/images/icons/user_suit_32.png" title="<?php  echo htmlspecialchars($operator_user); ?> has send message to user" /><?php  else : ?><img src="/design/defaulttheme/images/icons/user_suit_32_inactive.png" title="No one has send any message to user yet" /><?php  endif; ?><ul class="list-unstyled"><li>First visit - <?php  echo $online_user->first_visit_front?></li><li>Last visit - <?php  echo $online_user->last_visit_front?></li><li>Total visits - <?php  echo $online_user->total_visits?></li><li><?php  echo $online_user->invitation_count?> time(s) invitation logic was applied</li><li>Pageviews - <?php  echo $online_user->pages_count?></li><li>Total pageviews - <?php  echo $online_user->tt_pages_count?></li><li>Time on site - <?php  echo $online_user->time_on_site_front?></li><li>Total time on site - <?php  echo $online_user->tt_time_on_site_front?></li><li>Current page - <a target="_blank" href="<?php  echo htmlspecialchars($online_user->current_page)?>"><?php  echo htmlspecialchars($online_user->current_page)?></a></li><li>Came from - <a target="_blank" href="<?php  echo htmlspecialchars($online_user->referrer)?>"><?php  echo htmlspecialchars($online_user->referrer)?></a></li></ul></div></div><?php  endif;?><?php  $information_tab_online_user_info_chats_enabled = true?><?php  if ($information_tab_online_user_info_chats_enabled == true) : ?><div role="tabpanel" class="tab-pane" id="online-user-info-chats-tab-<?php  echo $chat->id?>"><ul class="foot-print-content list-unstyled" style="max-height: 170px;"><?php  foreach (erLhcoreClassChat::getList(array('limit' => 100, 'filter' => array('online_user_id' => $online_user->id))) as $chatPrev) : ?><?php  if (!isset($chat) || $chat->id != $chatPrev->id) : ?><li><?php  if ( !empty($chatPrev->country_code) ) : ?><img src="/design/defaulttheme/images/flags/<?php  echo $chatPrev->country_code?>.png" alt="<?php  echo htmlspecialchars($chatPrev->country_name)?>" title="<?php  echo htmlspecialchars($chatPrev->country_name)?>" />&nbsp;<?php  endif; ?><a title="Open in a new window" class="icon-popup" onclick="lhinst.startChatNewWindow('<?php  echo $chatPrev->id;?>',$(this).attr('data-title'))" data-title="<?php  echo htmlspecialchars($chatPrev->nick,ENT_QUOTES);?>"></a><?php  echo $chatPrev->id;?>. <?php  echo htmlspecialchars($chatPrev->nick);?> (<?php  echo date(erLhcoreClassModule::$dateDateHourFormat,$chatPrev->time);?>) (<?php  echo htmlspecialchars($chatPrev->department);?>)</li><?php  endif; ?><?php  endforeach;?></ul></div><?php  endif; ?><?php  endif; ?><?php   ?></div></div><?php   ?></div></div><script type="text/javascript">lhinst.addSynchroChat('<?php  echo $chat->id;?>','<?php  echo $LastMessageID?>');$('#messagesBlock-<?php  echo $chat->id?>').animate({ scrollTop: $('#messagesBlock-<?php  echo $chat->id?>').prop('scrollHeight') }, 1000);// Start synchronisation
lhinst.startSyncAdmin();</script>