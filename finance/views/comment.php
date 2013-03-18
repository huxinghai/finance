<?php include("template/_head.php") ?>              
    <div class="new_context" style="height:750px;" >     
        <div class="well context_news_panle">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url()?>">主页</a> <span class="divider">/</span></li>                
                <li class="active">在线交流</li>
            </ul>
            <?php foreach($comments as $c){ ?>
            <div class="well" style="padding:8px;">
                <div>
                    <span rel="tooltip"  data-original-title="留言内容" class="icon-question-sign"></span><?php echo $c->context;  ?>
                </div>
                <div style="text-align:right;">
                    <span style="margin-right:10px;">
                        <span class="icon-user" rel="tooltip"  data-original-title="留言姓名"></span><?php echo $c->name;  ?>
                    </span>
                    <span>
                        <span rel="tooltip"  data-original-title="留言日期" class="icon-time"></span>
                        <?php echo $c->created_at;  ?>
                    </span>
                </div>                
                <h4>回复内容</h4>
                <br />
                <ul>
                <?php $count_t = 0; ?>
                <?php foreach($replies as $r){ ?>
                    <li>
                        <?php if($c->id == $r->comment_id){ ?>
                        <?php $count_t = $count_t +1; ?> 
                        <div>
                            <span><span rel="tooltip"  data-original-title="回复内容" class="icon-info-sign"></span><?php echo $r->rep_context ?></span>  
                        </div>
                        <div style="text-align: right;">
                            <span><span rel="tooltip"  data-original-title="回复人" class="icon-user"></span><?php echo $r->name ?></span>
                            <span style="margin-left:10px"><span rel="tooltip"  data-original-title="回复日期" class="icon-time"></span><?php echo $r->created_at ?></span>  
                        </div>
                        <?php } ?>
                    </li>
                <?php }?>
                <?php if($count_t<=0){ ?>
                    <li>暂无回复信息</li>
                <?php } ?>
                </ul>
            </div>
            <hr />
            <?php } ?>
        </div>
        
        <div style="float:left;height:100%">
            <?php include("template/_left_panle.php") ?>
            <div>
                <?php echo form_open("comments/create",array("class" => "create_comments")) ?>
                    <div class="comment_panle" style="font-size:12px">
                        <div>
                            <div class="comment_label">姓名:<span style="color:red;">*</span></div>
                            <div class="comment_input">
                                <input type="text" name="name" class="input comment_input_size" />
                            </div>
                        </div>

                        <div >
                            <div class="comment_label">手机:<span style="color:red;">*</span></div>
                            <div class="comment_input">
                                <input type="text" name="phone" class="input comment_input_size" />
                            </div>
                        </div>

                        <div style="height:138px">
                            <div style="float:left;margin: 0px 10px 0px 20px;">咨询内容:<span style="color:red;">*</span></div>
                            <div class="comment_input">
                                <textarea name="context" style="height:120px;width:170px;margin-left: 5px;"></textarea>
                            </div>
                        </div>

                        <div class="comment_submit">
                            <input type="submit" value="留言" />
                        </div>
                    </div>
                </form>
            </div>
        </div>        
    </div>

<?php include("template/_foot.php") ?>
