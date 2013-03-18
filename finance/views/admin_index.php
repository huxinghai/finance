<?php include("template/_admin_head.php") ?>
<input type="button" value="发布新闻" class="btn add_news_btn" style="margin-bottom: 5px;" />
<select class="select new-category-se">
    <?php foreach($categories as $c){ ?>
    <option value="<?php echo $c->id  ?>"><?php echo $c->name  ?></option>
    <?php } ?>
</select>
<div class="well add_new_panel" style='display:none;'>
    <div class="add_new_el">
    <?php echo form_open("admin_index/create_news"); ?>
        <div>
            <div class="control-group" style="display:inline-block;margin-right:20px; ">
                <label class="control-label" for="input_type">新闻类型</label>
                <div class="controls">
                    <select class="select category_id" name="category_id">
                        <?php foreach ($categories as $c){ ?>
                        <option value="<?php echo $c->id; ?>"><?php echo $c->name; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="control-group" style="display:inline-block;">
                <label class="control-label" for="input_type">标题</label>
                <div class="controls">
                    <input type="text" placeholder="标题" name="title" class="input-xxlarge title"  />
                </div>
            </div>
        </div>
        <div>
            <div class="control-group">
                <label class="control-label" for="input_type">内容</label>
                <div class="controls context-controls">
                    <textarea name="context" class="context"></textarea>
                </div>
                <script type="text/javascript">
                    window.onload = function()
                    {
                        CKEDITOR.replace( 'context' );
                    };
                </script>
            </div>
        </div>
        <div>
            <div class="control-group toobar-news">
                <input type="submit" value=" 保 存 " class="btn" />                
            </div>
        </div>
    </form>
    </div>
</div>

<table class="table table-bordered new-list">
    <thead>
        <tr>
            <th>新闻类型</th>
            <th>标题</th>
            <th style="display:none;">内容</th>
            <th>操作人</th>
            <th>点击率</th>
            <th>创建日期</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($news as $n){ ?>
            <tr class="news_list_<?php echo $n->id ?>">            
                <td class="category_name" data="<?php echo $n->category_id ?>">
                    <?php echo $n->category_name ?>
                </td>
                <td>
                    <a href="#" class="title"><?php echo $n->title ?></a>
                </td>
                <td style="display:none;" class="context">
                    <?php echo $n->context ?>
                </td>
                <td class="user_name"><?php echo $n->user_name ?></td>
                <td class="ctr"><?php echo $n->ctr ?></td>
                <td class="created_at"><?php echo $n->created_at ?></td>
                <td>
                    <span class="news_panle">
                       <a href="javascript:void(0)" data="<?php echo $n->id ?>" class="news_edit"><i class="icon-edit"></i></a>
                       <a href="javascript:void(0)" data="<?php echo $n->id ?>" class="news_delete"><i class="icon-trash"></i></a> 
                    </span>
                </td>
            </tr>
        <?php }?>
    </tbody>
</table>
<?php include("template/_admin_foot.php") ?>
<script type="text/javascript" src="<?php echo base_url() ?>js/add_news.js"></script>

