<div class="product_context">
    <div class="product_title">
        <div>产品下载</div>
    </div>
    <div class="product_info">
        <p style="margin-top: 8px;">
            <span style="color:#BB0504;font-size:14px;">《新坐标决策分析系统》</span>
             —— 证券决策分析系统引领个人财富全新时代! 截留信息源头，掌握国家政策，洞悉机构动态，抓住第一时机!
        </p>
        <p>
            <a href="<?php echo base_url()?>products" target="_blank">
                <img alt='永久财经分析系统' src="<?php echo base_url()?>img/download.gif" />
            </a>            
        </p>
    </div>
</div>
<div class="product_context" style="height: 256px;">
    <div class="product_title" style="background: url('<?php echo base_url()?>img/title_ico.gif') 8px -252px no-repeat;">
        <div class="online_click" >
            大盘综述
            <span class="new_more" style="margin-left:155px;" >
                <a href="<?php echo base_url()?>categories/show?id=<?php echo $daban_news_id->id ?>" target="_blank">更多</a>
            </span>
        </div>   
    </div>
    <div>
        <?php if(count($daban_news)<=0){ ?>
        <p>暂无添加信息</p>
        <?php }else{ ?>
        <p>
            <ul>
            <?php foreach ($daban_news as $dn){  ?>
                <li style="margin:5px 0px 5px 5px;">
                    <a href="<?php echo base_url()?>newslist/show?id=<?php echo $dn->id;?>" target="_blank" >
                        <span><?php echo mb_substr($dn->title,0,24); ?></span>
                    </a>
                </li>
            <?php } ?>
            </ul>
        </p>
        <?php } ?>
        <div style="margin-top:5px;border-top:1px solid #DDD;">
            <div class="lx_phone">
                <div class="customer_phone">
                    <input type="text" style="width:140px;" name="phone" onblur="if(this.value==''){this.value='请输入手机号码'}" onfocus="if(this.value=='请输入手机号码') {this.value=''}" value="请输入手机号码" />
                    <input type="button" style="margin-bottom: 8px;" class="customer_save" value="提交" />
                </div>
            </div>
        </div>
    </div>
</div>
