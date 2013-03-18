<?php include("template/_admin_head.php") ?>
<div class="well">
    <div>
        <div>内容: <?php echo $comment[0]->context;?></div>
        <div style="margin-top:15px;margin-left: 400px;">
            <span>
                -- 名称: <?php echo $comment[0]->name ?> 
            </span>
            <span style="margin:0px 5px 0px 5px;">
                手机: <?php echo $comment[0]->phone ?>
            </span>
            <span>
                日期: <?php echo $comment[0]->created_at ?> </div>
            </span>
               
    </div>
    <div>
        <hr />
        <h4>回复内容</h4>
        <br />
        <ul>
            <?php if(count($replies)<=0){ ?>
            <li>暂无回复信息！</li>
                
            <?php }else{ ?>
                <?php foreach($replies as $r){ ?>
                <li>
                    <span style="margin-right:30px;"><?php echo $r->rep_context; ?></span>
                    <span style="margin-right:5px;">-<?php echo $r->name; ?></span>
                    <span>-<?php echo $r->created_at; ?></span>
                    <a href="<?php echo base_url(); ?>replies/delete?id=<?php echo $r->id; ?>" class="reply_delete">删除</a>                    
                </li>                
                <?php } ?>
            <?php } ?>
        </ul>   
    </div>
    <br />
    <div>
        <?php
        $attributes = array("class" => "reply_form_user");
        echo form_open("replies/create",$attributes) ?>
        <input type="hidden" name="comment_id" value="<?php echo $comment[0]->id;  ?>" />
        <textarea style="width:609px;height:138px;" name="rep_context"></textarea>
        <input type="submit" value=" 回 复 " />
        </form>
    </div>
</div>
<?php include("template/_admin_foot.php") ?>
<script type="text/javascript">
    Admin.choose_action($("li.user_manage")); 
    
    $("form.reply_form_user").submit(function(event){
       var context = $("textarea[name=context]").val();
       if(context == ""){
           alert("回复内容不能为空！");
           return false;
       }
       return true;
    })
    
    $("a.reply_delete").click(function(){
        if(confirm("是否确定删除留言!")){
            return true;
        }
       return false;
    })
</script>
