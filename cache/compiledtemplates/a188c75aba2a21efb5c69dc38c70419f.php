<h1>Blocked users</h1><?php  if (isset($block_saved) && $block_saved == true) : ?><?php  $msg = 'Updated'; ?><div role="alert" class="alert alert-success alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php  echo $msg?></div><?php  endif; ?><?php  if (isset($errors)) : ?><?php  if (isset($errors)) : ?><div data-alert class="alert alert-danger alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><ul class="validation-ul"><?php  foreach ($errors as $err) : ?><li><?php  echo $err?></li><?php  endforeach;?></ul></div><?php  endif;?><?php  endif; ?><form action="/index.php/site_admin/chat/blockedusers"  method="post"><div class="row"><div class="col-xs-4"><input type="text" class="form-control" name="IPToBlock" value="" placeholder="IP" /></div><div class="col-xs-8"><input type="submit" class="btn btn-default" name="AddBlock" value="Save" /></div></div><input type="hidden" name="csfr_token" value="<?php  echo erLhcoreClassUser::instance()->getCSFRToken()?>" /></form><?php  if (!empty($items)) : ?><table class="table" cellpadding="0" cellspacing="0"><thead><tr><th width="1%">ID</th><th width="20%">IP</th><th width="20%">Date</th><th width="20%">Users who are blocked</th><th width="1%">&nbsp;</th></tr></thead><?php  foreach ($items as $departament) : ?><tr><td><?php  echo $departament->id?></td><td><?php  echo $departament->ip?></td><td><?php  echo htmlspecialchars($departament->datets_front)?></td><td><?php  echo htmlspecialchars($departament->user)?></td><td nowrap><a onclick="return confirm('Are you sure?')" class="csfr-required btn btn-danger btn-xs" href="/index.php/site_admin/chat/blockedusers/(remove_block)/<?php  echo $departament->id?>">Remove block</a></td></tr><?php  endforeach; ?></table><script>lhinst.protectCSFR();</script><?php  else : ?><p>Empty...</p><?php  endif; ?><?php  if (isset($pages)) : ?><?php  if (isset($pages) && $pages->num_pages > 1) : ?><nav><ul class="pagination paginator-lhc"><?php  if ($pages->current_page != 1) : ?><li class="arrow"><a class="previous" href="<?php  echo $pages->serverURL,$pages->prev_page,$pages->querystring?>">&laquo;</a></li><?php  endif;?><?php  if ($pages->num_pages > 10) : $needNoBolder = false; if ($pages->range[0] > 1) : $i = 1; $pageURL = $i > 1 ? '/(page)/'.$i : ''; $needNoBolder = true; if ($i == $pages->current_page) : ?><li class="current no-b"><a title="Go to page <?php  echo $i?> of <?php  echo $pages->num_pages?>" href="#"><?php  echo $i?></a></li><?php  else : ?><li><a class="no-b" title="Go to page <?php  echo $i?> of <?php  echo $pages->num_pages?>" href="<?php  echo $pages->serverURL,$pageURL,$pages->querystring?>"><?php  echo $i?></a></li><?php  endif; ?><li><a href="#">...</a></li><?php endif; for($i=$pages->range[0];$i<=$pages->lastArrayNumber;$i++) : if ($i > 0) : $pageURL = $i > 1 ? '/(page)/'.$i : ''; $noBolderClass = ($i == 1 || $needNoBolder == true) ? ' no-b' : ''; $needNoBolder = false; if ($i == $pages->current_page): ?><li class="active<?php  echo $noBolderClass?>"><a title="Go to page <?php  echo $i?> of <?php  echo $pages->num_pages?>"  href="#"><?php  echo $i?></a></li><?php  else : ?><li><a class="<?php  echo $noBolderClass?>" title="Go to page <?php  echo $i?> of <?php  echo $pages->num_pages?>" href="<?php  echo $pages->serverURL,$pageURL,$pages->querystring?>"><?php  echo $i?></a></li><?php  endif;endif;endfor; if ($pages->lastArrayNumber < $pages->num_pages) : $i = $pages->num_pages; $pageURL = $i > 1 ? '/(page)/'.$i : ''; ?><li><a href="#">...</a></li><?php  if ($i == $pages->current_page) : ?><li class="active"><a title="Go to page <?php  echo $i?> of <?php  echo $pages->num_pages?>" href="#"><?php  echo $i?></a></li><?php   else : ?><li><a class="no-b" title="Go to page <?php  echo $i?> of <?php  echo $pages->num_pages?>" href="<?php  echo $pages->serverURL,$pageURL,$pages->querystring?>"><?php  echo $i?></a></li><?php  endif; endif; else : for ($i=1;$i<=$pages->num_pages;$i++) : $noBolderClass = ($i == 1) ? ' no-b' : ''; $pageURL = $i > 1 ? '/(page)/'.$i : ''; if ($i == $pages->current_page) :?><li class="active<?php  echo $noBolderClass?>"><a href="#"><?php  echo $i?></a></li><?php  else : ?><li><a class="paginate" href="<?php  echo $pages->serverURL,$pageURL,$pages->querystring;?>"><?php  echo $i?></a></li><?php  endif; endfor; endif; if ($pages->current_page != $pages->num_pages): ?><li class="arrow"><a class="next" href="<?php  echo $pages->serverURL,'/(page)/',$pages->next_page,$pages->querystring?>">&raquo;</a></li><?php  endif;?></ul><div class="found-total pull-right">Page <?php  echo $pages->current_page?> of <?php  echo $pages->num_pages?>, Found - <?php  echo $pages->items_total?></div></nav><?php  endif;?><?php  endif;?>