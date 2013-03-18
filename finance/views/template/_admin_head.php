<html xmlns="http://www.w3.org/1999/xhtml"  >
    <head>   
        <META content="IE=9.0000" http-equiv="X-UA-Compatible">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>管理后台</title>
        <script type="text/javascript" src="<?php echo base_url()?>ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>js/admin.js"></script>
        <link rel="icon" href="<?php echo base_url()?>img/log_1.ico" mce_href="/favicon.ico" type="image/x-icon" >
        <link rel="shortcut icon" href="<?php echo base_url()?>img/log_1.ico" mce_href="/favicon.ico" type="image/x-icon">
        <?php include("_css.php") ?>
    </head>
    <script type="text/javascript">
        window.root_url = "<?php echo site_url(); ?>"
    </script>
    <?php include("_script.php") ?>
<body>
    <div class="container-fluid">
      <div class="row-fluid " style="padding-top: 50px;">
        <div class="span2 well sidebar-nav">
          <!--Sidebar content-->
          <ul class="nav nav-list left_toolbar">
            <li class="nav-header">管理功能</li>
            <li class="news_category"><a href="<?php echo base_url() ?>admin_index/news_category">新闻分类</a></li>
            <li class="active add_news"><a href="<?php echo base_url() ?>admin_index">发布新闻</a></li>
            <li class="upload_file"><a href="<?php echo base_url() ?>admin_index/upload_index">上传功能</a></li>
            <li class="image_news"><a href="<?php echo base_url(); ?>admin_index/image_index" >图片新闻</a></li>
            <li class="nav-header">用户管理</li>
            <li class="user_manage">
                <a href="<?php echo base_url() ?>users">
                    <?php 
                        $user=$this->session->userdata('user');
                        echo $user->login;
                    ?>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>admin/logout">退出</a>
            </li>
          </ul>
        </div>
        <div class="span10">