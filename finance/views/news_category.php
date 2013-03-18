<?php include("template/_admin_head.php") ?>
<div class="well add_category_panel">
    <div>
        <?php echo form_open("admin_index/create_category"); ?>
            <div class="control-group" style="display:inline-block;">

                    <label class="control-label" for="input_type">大分类</label>
                    <div class="controls">
                        <select class="select" name="parent_type">
                            <option value="股票">股票</option>
                            <option value="特色">特色</option>
                            <option value="财经">财经</option>
                            <option value="其它">其它</option>
                        </select>                       
                    </div>
            </div>
        
            <div class="control-group" style="display:inline-block;">

                    <label class="control-label" for="input_type">名称</label>
                    <div class="controls">
                        <input type="text" placeholder="名称" name="name" class="input-large"  />
                        <input type="submit" value=" 保 存 " class="btn" style="margin-bottom: 10px;" />
                    </div>
            </div>        
        </form>
    </div>
</div>
    
<table class="table table-bordered">
    <thead>
        <tr>
            <th>大分类</th>
            <th>分类名称</th>  
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $c){?>
        <tr id="category_list_<?php echo $c->id; ?>">
            <td >
                <span class="parent_type_tmp"><?php echo $c->parent_type; ?></span>
                <span class="parent_type"></span>
            </td>
            <td>
                <span class="category_name_tmp"><?php echo $c->name ?></span>
                <span class="category_name"></span>
            </td>
            <td>
                <span class="category_panle">
                   <a href="javascript:void(0)" data="<?php echo $c->id ?>" class="category_edit"><i class="icon-edit"></i></a>
                   <a href="javascript:void(0)" data="<?php echo $c->id ?>" class="category_delete"><i class="icon-trash"></i></a> 
                </span>
                <span style="display:none;" class="category_edit_panle">
                    <a href="javascript:void(0)" data="<?php echo $c->id ?>" class="category_edit_ok" ><i class=" icon-ok"></i></a>
                    <a href="javascript:void(0)" data="<?php echo $c->id ?>" class="category_edit_cancel"><i class=" icon-remove"></i></a>
                </span>

            </td>
        </tr>
         <?php } ?>        
    </tbody>
</table>

<?php include("template/_admin_foot.php") ?>
<script type="text/javascript" >
    Admin.choose_action($("li.news_category"));
    
    $(".category_delete").click(function(event){
        var id = $(event.currentTarget).attr("data");
        if(id){
            Admin.category_delete(id);
        }
    })
    
    $(".category_edit").click(function(event){
        var el = $("#category_list_"+$(event.currentTarget).attr("data"));
        Admin.category_edit(el);        
    });
    
    $(".category_edit_cancel").click(function(event){
        var el = $("#category_list_"+$(event.currentTarget).attr("data"));
        Admin.category_cancel(el);        
    });
    
    $(".category_edit_ok").click(function(event){
        var el = $("#category_list_"+$(event.currentTarget).attr("data"));
        Admin.category_edit_save(el);        
    });
</script>