<?php include("template/_head.php") ?>              
    <div class="new_context" style="height:100%;" >        
        <div class="well context_news_panle">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url()?>">主页</a> <span class="divider">/</span></li>
                <?php if($new){ ?>                    
                    <li class="active"><?php echo $category[0]->name; ?></li>
                 <?php } else { ?>
                    <li class="active">暂无添加信息！</li>
                 <?php } ?>
            </ul>
            <div style="width:600px">
                <?php if($new){ ?>
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