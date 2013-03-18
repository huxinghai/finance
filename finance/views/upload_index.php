<?php include("template/_admin_head.php") ?>
<div class="well">
    <p style="color:red;"><?php echo $error; ?></p>
    <?php echo form_open_multipart('admin_index/image_upload');?>
        <input type="file" name="userfile" size="20" />
        <input type="submit" value="上传图片" style="margin-right:50px;"/>
        <a href="<?php echo base_url(); ?>admin_index/image_index" >图片新闻..</a>
  </form>
   <br/><br />
  
   <?php echo form_open_multipart('admin_index/download_upload');?>
        <input type="file" name="download_file" size="20" />
        <input type="submit" value="上传产品" style="margin-right:50px;"/>
        <a href="<?php echo base_url(); ?>admin_index/image_index" ></a>
  </form>
</div>
<?php include("template/_admin_foot.php") ?>
<script type="text/javascript">
    Admin.choose_action($("li.upload_file"));
</script>
