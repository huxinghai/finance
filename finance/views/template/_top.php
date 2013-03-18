<div class="head">
    <span>
        <a class="head_fun" href="<?php echo base_url();?>products" target="_blank">
            <img src="<?php echo base_url()?>img/2.gif"/>产品中心
        </a>
    </span>
    <span>
         <a href="javascript:void(0);" class="head_fun set_home">收藏本站</a>
    </span>
    <span>
         <a href="javascript:void(0);" class="head_fun add_favorite">设为首页</a>
    </span>
</div>
<div class="mainnav_wrap mainnav">
    <div class="logo">
        <a href="<?php echo base_url()?>">
            <img alt="交易软件" style="height:53px;width:180px;" src="<?php echo base_url()?>img/log.gif" border="0"  />
        </a>
    </div>
    <dl>
      <dt>股票 </dt>
      <dd class='stock_categories_panel category_panel'>
        <ul class="stock_categories">       
            <?php foreach($stock_categories as $sc){ ?>
            <li>
                <a href="<?php echo base_url()?>categories/show?id=<?php echo $sc->id;?>" target="_blank"><?php echo $sc->name;?></a>
            </li>
            <?php }?>
            <img alt="机构炒股" style="left: 325px;" class="new2" src="<?php echo base_url()?>img/fina_mj_003.gif" />
        </ul>
      </dd>
      <dd class="line"></dd>
      <dt>特色 </dt>
      <dd class='characteristic_categories_panel category_panel'>
        <ul>
            <?php foreach($characteristic_categories as $cco){ ?>
            <li>
                <a href="<?php echo base_url()?>categories/show?id=<?php echo $cco->id; ?>" target="_blank"><?php echo $cco->name; ?></a>
            </li>
            <?php } ?>
            <img alt="行情软件" style="left: 178px;" class="new2" height="12" src="<?php echo base_url()?>img/fina_mj_003.gif" width="13">
        </ul>
      </dd>
      <dd class="line"></dd>
      <dt>财经 </dt>
      <dd class='finance_categories_panel category_panel'>
        <ul>            
            <?php foreach($finance_categories as $fco){ ?>
            <li>
                <a href="<?php echo base_url()?>categories/show?id=<?php echo $fco->id; ?>" target="_blank"><?php echo $fco->name; ?></a>
            </li>
            <?php } ?>
        </ul>
      </dd>
    </dl>
</div>
<div class="advertising">                 
    <img alt="私募软件" src="<?php echo base_url()?>img/Ad_Index_1_690-70.gif" />
</div>
<div class='toolbar'>
    <div class="top_hot_nav">
        <ul>
          <li><a class="nav8" href="<?php echo base_url();?>categories/show?id=<?php echo $day_one_stock_id->id ?>" >每周一股</a> </li>
          <li><a class="nav5" href="<?php echo base_url();?>categories/show?id=<?php echo $h_m_id->id ?>" >大黑马</a> </li>
          <li><a class="nav6" href="<?php echo base_url();?>categories/show?id=<?php echo $j_d_id->id ?>" >经典战绩</a> </li>
          <li><a class="nav1" href="<?php echo base_url();?>categories/show?id=<?php echo $g_s_id->id ?>" >实盘问答</a></li>
          <li><a class="nav2" href="<?php echo base_url();?>comments" >在线交流</a></li>
          <li><a class="nav7" href="<?php echo base_url();?>products" target="_blank">产品中心</a></li>
        </ul>
    </div>
</div>