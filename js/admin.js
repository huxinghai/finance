/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


window.Admin = {
    choose_action: function(el){
        $("ul.left_toolbar>li").removeClass("active");
        el.addClass("active");
    },
    
    category_delete: function(id){
        if(id){
            if(confirm("是否确定删除分类!")){
                $.get(root_url+"admin_index/delete_category",{id:id},function(data){
                        if(data !=""){
                            $("#category_list_"+id).remove();
                        }
                })
            }
        }
    },
    
    category_edit: function(el){
        if(el.length>0){
            el.find(".category_panle").hide();
            el.find(".category_edit_panle").show();
            
            el.find(".category_name_tmp").hide();
            var parent_el = "<select class='select' name='parent_type'>" +
                            "<option value='股票'>股票</option>"+
                            "<option value='特色'>特色</option>"+
                            "<option value='财经'>财经</option>"+
                            "<option value='其它'>其它</option>"+
                        "</select>";
            parent_el = $(parent_el);       
            var span = el.find(".category_name");
            var parent_td = el.find(".parent_type");
            el.find(".parent_type_tmp").hide();
            
            var n_el = $("<input type='text' name='name' class='name' value='"+ el.find(".category_name_tmp").text() +"' />");
            span.html(n_el);
            parent_el.val(el.find(".parent_type_tmp").html());
            parent_td.html(parent_el);
            
        }
    },
    
    category_cancel: function(el){
        el.find(".category_panle").show();
        el.find(".category_edit_panle").hide();
        el.find(".category_name_tmp").show();
        el.find(".category_name").html('');
        el.find(".parent_type_tmp").show();
        el.find(".parent_type").html('');
    },
    
    category_edit_save: function(el){
        var name =  $("input[name='name']",el).val();
        var parent_type = $("select[name='parent_type']",el).val();
        var id = $(".category_edit_ok",el).attr("data");
        if(name){
            $.get(root_url+"admin_index/update_category",{id:id, name: name,parent_type: parent_type},$.proxy(function(data){
                if(data!=""){
                    $(".category_name_tmp",el).html(name);
                    $(".parent_type",el).html(parent_type);
                    this.category_cancel(el);
                }
            },this))
        }else{
            alert("名称不能为空!");
        }
    },
    
    customer_delete: function(el){
        if(!confirm("是否删除客户资料!")){
            return;
        }
        var id = el.attr("data");
        var tr = $("tr.customer_list_"+id);
        
        $.get(root_url+"customer/delete",{id: id},function(data){
            if(data == "1"){
                tr.remove();
            }
        })
    },
    
    img_delete: function(el){
        if(!confirm("是否删除图片?")){
            return;
        }
        
        var id = el.attr("data");
        var tr = $("tr.upload_image_list_"+id);
        $.get(root_url+"admin_index/delete_upload_img",{id: id},function(data){            
            if(data == "1"){
                tr.remove();
            }
        })
    },
    
    new_image_delete: function(el){
        if(!confirm("是否删除图片新闻?")){
            return;
        }
        
        var id = el.attr("data");
        var tr = $("tr.new_image_list_"+id);
        $.get(root_url+"admin_index/delete_news_imag",{id: id},function(data){            
            if(data == "1"){
                tr.remove();
            }
        })
    }
}