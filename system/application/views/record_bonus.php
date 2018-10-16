<!DOCTYPE html>
<html>
<head>
	<? $this->load->view('include/meta') ?>
	<link type="text/css" rel="stylesheet" href="resource/css/inner-page.css"/>
	<link type="text/css" rel="stylesheet" href="resource/css/record.css"/>
	<link type="text/css" rel="stylesheet" href="resource/css/table_sheet.css"/>
    <script src="resource/plugin/jqpaginator/dist/jqpaginator.min.js"></script>
</head>
<body>

<? $this->load->view('include/header') ?>
<div class="inner-page-wrap">
	<div class="inner-header">
		<span><?=$this->lang->line('trans')?></span>
	</div>
	<div class="record-nav">
		<ul>
			<li><a href="order/record_bag"><?=$this->lang->line('trans_wallet')?></a></li>
			<li><a href="order/record_wdrl"><?=$this->lang->line('trans_withdrawal')?></a></li>
			<li><a href="order/record_order"><?=$this->lang->line('trans_pay')?></a></li>
			<li><a href="<?=current_url()?>" class="active"><?=$this->lang->line('trans_bonus')?></a></li>
		</ul>
	</div>
	<div class="inner-page-xl">
		<ul class="table-type table-flex">
			<li class="table-head">
				<div class="table-keep"><?=$this->lang->line('trans_date')?></div>
				<div><?=$this->lang->line('trans_level')?></div>
				<div><?=$this->lang->line('trans_block_money')?></div>
				<div><?=$this->lang->line('trans_block_ipoint')?></div>
				<div><?=$this->lang->line('trans_link_cash')?></div>
                <div><?=$this->lang->line('trans_link_ipoint')?></div>
				<div class="table-keep"><?=$this->lang->line('trans_desc')?></div>
			</li>
            <?foreach($data as $k => $v){?>
                <li>
                    <div class="table-keep"><?=substr($v['create_date'], 0, 10)?></div>
                    <div>LV.<?=$v['level']?></div>
                    <div><?=$v['block_money']?></div>
                    <div><?=$v['block_ipoint']?></div>
                    <div><?=$v['link_money']?></div>
                    <div><?=$v['link_ipoint']?></div>
                    <div class="table-keep"><a href="order/record_bonus_det/<?=$v['id']?>" class="table-detail"><?=$this->lang->line('trans_desc_link')?></a></div>
                </li>
            <?}?>
		</ul>
        <br /><br />
        <div class="text-center container-fluid pgn-wrap">
			<nav aria-label="">
				<ul id="js-pager" class="pagination pagination-sm"></ul>
			</nav>
		</div>
	</div>

</div>
<div class="main-bk container-fluid text-center">
	<? $this->load->view('include/footer') ?>
</div>

</body>
</html>

<script>
$(document).ready(function(){
    <?if($pages > 1){?>
    $('#js-pager').jqPaginator({
        totalPages : <?=$pages?>,
        visiblePages: 10,
        currentPage: <?=$page?>,
        
        activeClass : 'disabled',
        page : '<li class="page-item">' + 
                '<a class="page-link" href="javascript:void(0)">{{page}}</a>'  + 
               '</li>',
        
        onPageChange: function (num, type) {
            if(num != <?=$page?>) document.location.href = 'order/record_bonus/' + num;
        }
    });
    <?}?>
});
</script>