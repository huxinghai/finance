<?php include("template/_head.php") ?>              
    <div class="new_context" style="height:750px;" >        
        <div class="well context_news_panle">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url()?>">主页</a> <span class="divider">/</span></li>
                <li>新闻频道<span class="divider">/</span></li>
                <li class="active"><?php echo $category[0]->name; ?></li>
            </ul>
            <div style="width:600px">
                <ul>
                    <?php if(count($news)>0){ ?>
                        <?php foreach ($news as $n){ ?>
                    <li>
                        <a href="<?php echo base_url()?>newslist/show?id=<?php echo $n->id; ?>">
                            <?php echo $n->title; ?>
                        </a>
                        <span style="float:right;"><?php echo date("m-d",strtotime($n->created_at));?></span>
                    </li>
                        <?php }?>
                    <?php }else{ ?>
                            <li>暂无信息！</li>
                    <?php }?>
                </ul>
            </div>
        </div>
        <?php include("template/_left.php") ?>
    </div>

<?php include("template/_foot.php") ?>