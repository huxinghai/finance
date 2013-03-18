<?php include("template/_admin_head.php") ?>
<div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">客户</a></li>
    <li><a href="#tab2" data-toggle="tab">在线交流</a></li>
    <li><a href="#tab3" data-toggle="tab">用户资料</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
        <table class="table table-bordered">
           <thead>
               <tr>
                   <th>联系号码</th>
                   <th>提交日期</th>
                   <th>ip地址</th>
                   <th>操作</th>
               </tr>
           </thead> 
           <tbody>
               <?php foreach($customers as $c) { ?>
               <tr class='customer_list_<?php echo $c->id ?>'>
                   <td><?php echo $c->phone ?></td>
                   <td><?php echo $c->created_at ?></td>
                   <td><?php echo $c->ip_address ?></td>
                   <td><a href="javascript:void(0)" data="<?php echo $c->id ?>" rel="tooltip"  data-original-title="删除" class="customer_delete"><i class="icon-trash"></i></a> </td>
               </tr>
               <?php } ?>
           </tbody>
        </table>
    </div>
    <div class="tab-pane" id="tab2">
      <p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>姓名</th>
                    <th>手机</th>
                    <th>内容</th>
                    <th>日期</th>
                    <th>操作</th>
                </tr>
            </thead>
            
            <tbody>
                <?php foreach($comments as $c){ ?>
                <tr class="comment_list_<?php echo $c->id; ?>">
                    <td><?php echo $c->name;?></td>
                    <td><?php echo $c->phone;?></td>
                    <td><?php echo $c->context;?></td>
                    <td><?php echo $c->created_at;?></td>
                    <td>
                        <a href="<?php echo base_url();?>replies/delete_comments?id=<?php echo $c->id; ?>" class="comment_delete" rel="tooltip"  data-original-title="删除" class="comment_delete"><i class="icon-trash"></i></a>
                        <a href="<?php echo base_url();?>replies/show?id=<?php echo $c->id; ?>" rel="tooltip"  data-original-title="回复"  class="comment_rep"><i class="icon-pencil"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
      </p>
    </div>

    <div class="tab-pane" id="tab3">
      <p>Howdy, I'm in Section 3.</p>
    </div>
  </div>
</div>
<?php include("template/_admin_foot.php") ?>
<script type="text/javascript">
    
    Admin.choose_action($("li.user_manage"));    
    
    $(".customer_delete").click(function(event){        
        Admin.customer_delete($(event.currentTarget));
    })
    
    $("a.comment_delete").click(function(){
        if(confirm("是否确定删除留言！")){            
            return true;
        }
        return false;
    })
    
</script>
