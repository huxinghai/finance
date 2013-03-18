<?php include("template/_head.php") ?>   
            <div class="new_context_two">
                <div style="width:298px;border:1px solid #DDD;height:183px">
                    <div class="day_money">
                        <div class="tab_action" style="display:inline-block;padding: 2px 10px 3px 10px;">
                            <a>
                                每日金股                                   
                            </a>
                        </div>
                        <div class="day_new_more new_more">
                            <a target="_blank" href="<?php echo base_url()?>categories/show?id=<?php echo $day_id->id;?>">更多</a>
                        </div>
                    </div>
                    <div>
                        <div style="text-align:center;">
                            <a style="font-size: 14px;color:red;" target="_blank" href="<?php echo base_url()?>newslist/show?id=<?php echo $day_stock_first->id; ?>">
                                <?php echo $day_stock_first->title; ?>
                            </a>
                        </div>
                        <div>
                            <ul type="circle">
                                <?php if(count($day_stock)<=0){ ?>
                                    <li style="text-align:center;"> 暂无添加信息! <li>
                                <?php }else{ ?>
                                    <?php foreach($day_stock as $ds){ ?>
                                    <li style="text-align:left;line-height:19px;">                              
                                        <?php foreach($ds as $d){ ?>                                            
                                        <a target="_blank" href="<?php echo base_url()?>newslist/show?id=<?php echo $d->id; ?>"><?php echo mb_substr($d->title,0,17); ?></a>
                                        <?php }?>
                                    </li> 
                                    <?php }?>
                                <?php } ?>
                            </ul>                                        
                        </div>
                    </div>
                </div>                        
                <div style="margin-top:5px;border:1px solid #DDD;">
                    <div class="day_money">
                        <div class="_tab tab_action" tab_id="trade_news" style="display:inline-block;padding: 2px 10px 3px 10px;">
                            <a>
                                行业新闻                                   
                            </a>
                        </div>

                        <div class="_tab day_important" tab_id="day_news">
                            <a>
                                每日要闻                                   
                            </a>
                        </div>
                    </div>
                     <div style="margin-top:7px;" id="trade_news"  class="tread_news">
                        <ul type="circle">
                            <?php if(count($tread_news) <= 0){ ?>
                                <li class="news_list_t">暂无添加信息！</li>
                            <?php }else{ ?>
                                <?php foreach($tread_news as $tn){ ?>
                                <li class="news_list_t"><a href="<?php echo base_url()?>newslist/show?id=<?php echo $tn->id;?>" target="_blank"><?php echo mb_substr($tn->title,0,23); ?></a></li>
                                <?php }?>
                            <?php } ?>
                        </ul>
                    </div>
                    <div style="margin-top:5px;display: none;" class="day_news" id="day_news">
                        <ul type="circle">
                            <?php if(count($day_news) <= 0){ ?>
                                <li class="news_list_t">暂无添加信息！</li>
                            <?php }else{ ?>
                                <?php foreach($day_news as $dn){ ?>
                                <li class="news_list_t"><a href="<?php echo base_url()?>newslist/show?id=<?php echo $dn->id;?>" target="_blank"><?php echo mb_substr($dn->title,0,23); ?></a></li>
                                <?php }?>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

            </div>
                <div class="new_context">                    
                    <div class="new_context_one">
                        <div class='panel-img'>
                          <div id="img_slide" class="slideBox">
                            <ul class="items">
                              <?php foreach($news_images as $ni){ ?>
                              <li>
                                  <a href="<?php echo base_url()?>newslist/show?id=<?php echo $ni->news_id ;?>" title="<?php echo $ni->title; ?>">
                                      <img  src="<?php echo base_url()?>uploads/<?php echo $ni->file_name; ?>">
                                  </a>
                              </li>
                              <?php }?>
                            </ul>
                          </div>
                        </div>
                        <div class="product_context" style="width: 326px;">
                            <div class="product_title" style="background: url('<?php echo base_url()?>img/title_ico.gif') 8px -225px no-repeat;">
                                <div class="online_click" >
                                    盘中直击
                                    <span class="new_more">
                                        <a href="<?php echo base_url()?>categories/show?id=<?php echo $watch_news_id->id ?>" target="_blank">更多</a>
                                    </span>
                                </div>           
                            </div>
                            <div style="padding-left: 5px;padding-top:5px;">
                                <ul type="circle">
                                    <?php if(count($watch_news)<=0){ ?>
                                        <li>暂无添加信息！</li>
                                    <?php }else{ ?>
                                        <?php foreach($watch_news as $wn){ ?>
                                        <li><a href="<?php echo base_url()?>newslist/show?id=<?php echo $wn->id ?>"><?php echo mb_substr($wn->title,0,31); ?></a></li>
                                        <?php } ?>
                                   <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <?php include("template/_left.php") ?>
                </div>
                
                <div style="margin-bottom:5px;">
                    <a href="http://dr.huagu.com/" target="_blank">
                        <img alt="财经软件" src="<?php echo base_url()?>img/Ad_Index_3_950-50.gif" />
                    </a>
                </div>
                <div>
                    <div>
			<div class="trime_img" style='background: url("<?php echo base_url()?>img/index_07.gif") no-repeat;'>
                            <div class='tm_img_title'>
                                永久信息科技 - <a href="<?php echo base_url()?>home/team" class="context">汇集国内顶尖的技术研发人才</a>
                            </div>
                            <br />
                            <div class="context_title">我的团队</div>
                            <br />
                            <div class="context_describe">团结进取，各尽所能，我们相信1+1>2</div>
			</div>

			<div class="trime_img" style='background: url("<?php echo base_url()?>img/index_03.gif") no-repeat;'>
                            <div class='tm_img_title'>
                                永久信息科技 - <a  href="<?php echo base_url()?>newslist/show?id=<?php echo $my_use_id  ?>" class="context">跟踪最前沿的第四代股票软件</a>
                            </div>
                            <br />
                            <div class="context_title">我们的优势</div>
                            <br />
                            <div class="context_describe">
                                <span style="margin:0px 10px 0px 5px;padding-left:8px">专业 + 专注 + 经验=成功 </span>
                            </div>
			</div>

			<div class="trime_img" style='background: url("<?php echo base_url()?>img/index_05.gif") no-repeat;'>
                            <div class='tm_img_title'>
                                永久信息科技 - <a  href="<?php echo base_url()?>newslist/show?id=<?php echo $my_server_id  ?>" class="context">提供最专业的售后服务</a>
                            </div>
                            <br />
                            <div class="context_title">我们的服务</div>
                            <br />
                            <div class="context_describe">用最专业的服务带给您最丰硕的回报</div>
			</div>
                    </div>
                </div>
<hr />
<?php include("template/_foot.php") ?>
