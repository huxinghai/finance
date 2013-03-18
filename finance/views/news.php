<?php include("template/_head.php") ?>              
    <div class="new_context" style="height:100%;" >        
        <div class="well context_news_panle">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url()?>">主页</a> <span class="divider">/</span></li>
                <?php if($new){ ?>
                    <li><a href="<?php echo base_url()?>categories/show?id=<?php echo $category[0]->id ?>" ><?php echo $category[0]->name; ?></a><span class="divider">/</span></li>
                    <li class="active"><?php echo $new[0]->title; ?></li>
                 <?php } else { ?>
                    <li class="active">暂无添加信息！</li>
                 <?php } ?>
            </ul>
            <div style="width:600px">
                <?php if($new){ ?>                    
                    <h3 style="text-align:center;"><?php echo $new[0]->title; ?></h3>
                    <div style="color: #7e7e7e;text-align:right;">
                        <span><?php echo $new[0]->created_at; ?></span>
                        <span style="margin-left:20px;">浏览次数: <?php echo $new[0]->ctr; ?></span>
                    </div>
                    <hr />
                    <p>
                        <?php echo $new[0]->context; ?>
                    </p>
                <?php }else{ ?>
                    <P>
                        暂无添加信息！
                    </P>
                <?php } ?>
            </div>
        </div>
        <?php include("template/_left.php") ?>
    </div>

<?php include("template/_foot.php") ?>