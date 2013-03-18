<?php include("template/_admin_head.php") ?> 
<div class="well">
    <?php echo form_open("/admin_index/image_news_save",array("class" => "image_news_create")) ?>
    <div class="control-group" style="display:inline-block;margin-right:20px; ">
        <label class="control-label" for="input_type">标题</label>
        <div class="controls">
            <select class="select news" style="width: 360px;" name="news_id">                
                <?php foreach ($news as $n){  ?>
                <option value="<?php echo $n->id; ?>"><?php echo $n->title;?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="control-group" style="display:inline-block;">
        <label class="control-label" for="input_type">图片</label>
        <div class="controls">
            <select class="select image" name="uploads_id">
                <option value="0">--请选择图片--</option>
                <?php foreach($imgs as $img){?>
                <option value="<?php echo $img->id ?>"><?php echo $img->file_name ?></option>
                <?php }?>
            </select>
            <input type="submit" value="保存" class="btn" style="margin-bottom:10px;" />
        </div>
        
    </div>
     <div class="control-group image-panle" style="display:inline-block;margin-left:70px;">
         <img src="" style="width:80px;height:60px;" />
    </div>
</div>
<div>
    <table class="table table-bordered" style="width:50%;float:left;margin-right:10px;">
       <thead>
            <tr>
                <th>标题</th>
                <th>图片</th>  
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($images_news as $ims){ ?>
            <tr class='new_image_list_<?php echo $ims->id ?>'>
                <td><?php echo $ims->title; ?></td>
                <td><img src="<?php echo base_url(); ?>uploads/<?php echo $ims->file_name;  ?>" style="width:80px;height:60px;" /></td>
                <td><a href="javascript:void(0)" data="<?php echo $ims->id ?>" class="image_new_delete"><i class="icon-trash"></i></a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
   <table class="table table-bordered" style="width:45%;float:left;">
        <thead>
            <tr>
                <th>文件名</th>
                <th>图片</th>  
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($imgs as $img){  ?>
            <tr class="upload_image_list_<?php echo $img->id ?>">
                <td><?php echo $img->file_name; ?></td>
                <td><img src="<?php echo base_url(); ?>uploads/<?php echo $img->file_name;  ?>" style="width:80px;height:60px;" /></td>
                <td>
                    <a href="javascript:void(0)" data="<?php echo $img->id ?>" class="upload_delete"><i class="icon-trash"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include("template/_admin_foot.php") ?>
<script type="text/javascript">
    Admin.choose_action($("li.image_news"));
    
    $("a.upload_delete").click(function(event){
        Admin.img_delete($(event.currentTarget));
    })
    
    $("a.image_new_delete").click(function(event){
        Admin.new_image_delete($(event.currentTarget));
    })
    
    $("select.image").change(function(event){
            var el = $(event.currentTarget);
            var img = $("div.image-panle img");
            var value = el.val();
            var text = $("option:selected",el).eq(0).text();
            if(value=="0"){ 
               img.attr("src","");
            }else{
               img.attr("src",root_url+"uploads/"+text);
            }
    })
    
    $("form.image_news_create").submit(function(event){
        var new_id = $("select.news").val();
        var img = $("select.image").val();
        
        if(new_id == "" || new_id == 0){
            alert("请选择新闻！");
            return false;
        }
        
        if(img == "" || img == 0){
            alert("请选择图片");
            return false;
        }
        return true;
    })
</script>
