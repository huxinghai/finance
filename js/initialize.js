$(function($){   
    
    
    $("a.set_home").click(function(event){
        try{
            var obj = event.currentTarget;
            obj.style.behavior='url(#default#homepage)';
            obj.setHomePage(root_url);
        }catch(e){
            if(window.netscape){
                try{
                    netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
                }catch(e){
                    alert("抱歉，此操作被浏览器拒绝！\n\n请在浏览器地址栏输入“about:config”并回车然后将[signed.applets.codebase_principal_support]设置为'true'");
                }
            }else{
                alert("抱歉，您所使用的浏览器无法完成此操作。\n\n您需要手动将【"+root_url+"】设置为首页。");
            }
        }
    })
 
    //收藏本站
    $("a.add_favorite").click(function() {
        try {
            var title = "股票信息网站";
            var url = location.href;
            window.external.addFavorite(url, title);
        }
        catch (e) {
            try {
                window.sidebar.addPanel(title, url, "");
            }
            catch (e) {
                alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");
            }
        }
    })

    
    
    var img_slide = $('#img_slide');
    if(img_slide.length > 0){
        $('#img_slide').slideBox({
            duration : 0.3,//滚动持续时间，单位：秒
            easing : 'linear',//swing,linear//滚动特效
            delay : 5,//滚动延迟时间，单位：秒
            hideClickBar : false,//不自动隐藏点选按键
            clickBarRadius : 10
        });
    }
    
    var customer_el = $("div.customer_phone");
    if(customer_el.length>0){
        $(".customer_save",customer_el).click(function(){          
            var phone = $("input[name='phone']",customer_el).val();
            if(phone=="" || phone == "请输入手机号码"){
                alert("请输入你的联系号码！");
                return;
            }
            if(!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(phone))){
                alert("请输入正确的手机号码！");
                return;
            }
            
            $.post(root_url+"customer/create",{phone:phone},function(data){                
                if(data == "1"){
                    alert("提交成功！");
                    $("input[name='phone']",customer_el).val("");
                }
            })
        })
    }
    
    var form_comment = $("form.create_comments");
    
    form_comment.submit(function(){
        var name = form_comment.find("input[name=name]").val();
        var phone = form_comment.find("input[name=phone]").val();
        var context = form_comment.find("textarea[name=context]").val();
        
        if(name == ""){
            alert("名称不能为空！");
            return false;
        }
        
        if(phone ==""){
            alert("电话不能为空！");
            return false;
        }
        
        if(context == ""){
            alert("内容不能为空！")
            return false
        }
        return true;
    })
    
    var $day_money = $("div._tab",$day_money);
    
    $day_money.mouseover(function(event){
       
       for(var i=0;i<$day_money.length;i++){
           $($day_money[i]).removeClass("tab_action");
           var tab_id = $($day_money[i]).attr("tab_id");
           if(tab_id){
               $("#"+tab_id).hide();
           }
       }
        var el = $(event.currentTarget);
        el.addClass("tab_action");       
        var tab_el  = $("#"+el.attr("tab_id"));
        tab_el.show();
    })
})