<?php include("template/_head.php")  ?>
<div style="height:300px;">
 <?php 
    $attributes = array('class' => "form-horizontal", 'style' => 'margin-top:70px;');
     echo form_open("admin/login", $attributes);
  ?>
    <div style="text-align: center;color:red;">
        <?php echo $error; ?>
    </div>
    <div class="control-group">
      <label class="control-label" style="width:330px;padding:0px" for="inputEmail">用户名: </label>
      <div class="controls" style="margin-left:350px;">
        <input type="text" name="login" class='input' placeholder="login">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" style="width:330px;padding:0px"  for="inputPassword">密码: </label>
      <div class="controls" style="margin-left:350px;">
        <input type="password" name="password" class='input'  placeholder="Password">
      </div>
    </div>
    <div class="control-group">
      <div class="controls" style="margin-left:350px;">
        <button type="submit" class="btn">登陆</button>
      </div>
    </div>
  </form>
</div>
<?php include("template/_foot.php")  ?>