
(function(){
    var panel = $("div.add_new_panel");
    $(".add_news_btn").click(function(){
        panel.slideToggle();
    })
    
    var cancel_fun = function(event){
        var id = $(event.currentTarget).attr("data");
        var el =  $("tr.edit_news_list_"+id);
        $(".news_panle",$("tr.news_list_"+id)).show();
        el.slideUp();
    }
    
    var bind_new_delete = function(){
        $("table.new-list .news_panle .news_delete").click(function(event){
            if(!confirm("是否确定删除记录！")){
                return;
            }
            var id = $(event.currentTarget).attr("data");
            var el = $("tr.news_list_"+id);
            $.get(root_url+"admin_index/delete_news",{id:id},function(data){
                if(data != ""){
                    el.remove();
                }
            })
        })
    }
    
    bind_new_delete()
    
    var bind_new_edit = function(){
        $("table.new-list .news_panle .news_edit").click(function(event){        
            var id = $(event.currentTarget).attr("data");
            var current_tr = $("tr.edit_news_list_"+id);

            if(current_tr.length>0){
                current_tr.slideToggle();
                return;
            }        
            current_tr = $("tr.news_list_"+id);        

            var category_id = $(".category_name",current_tr).attr("data");
            var title = $(".title",current_tr).html();
            var context = $(".context",current_tr).html();
            $(".news_panle",current_tr).hide();

            var tr = $("<tr class='edit_news_list_"+ id +"' style='display:none;'><td colspan='6'></td></tr>")
            var el = $("div.add_new_el").clone(); 
            el.addClass("edit_new_el").removeClass("add_new_el");

            $("div.context-controls",el).html($("<textarea name='edit_context_"+ id +"' class='context'></textarea>"));
            var cancel = $("<input type='button' value=' 取 消 ' data='"+ id +"' class='btn cancel' />")
            var id_el = $("<input type='hidden' name='id' value='"+ id +"' />");
            $("div.toobar-news",el).append(id_el);
            $("div.toobar-news",el).append(cancel);
            $("form",el).attr("action",root_url+"admin_index/edit_news");

            cancel.bind("click",cancel_fun);       

            tr.find("td").html(el);
            $("select.category_id",el).val(category_id);
            $("input.title",el).val(title);

            $("textarea.context",el).html(context);        
            current_tr.after(tr);
            CKEDITOR.replace( 'edit_context_'+id );
            tr.slideToggle();
        })
    }
    
    bind_new_edit();
    
    $("select.new-category-se").change(function(event){
        var category_id = $(event.currentTarget).val()
        $.get(root_url+"admin_index/get_new_by_category",{category_id: category_id},function(data){
            var data = JSON.parse(data);
            var table = $("table.new-list");
            var tbody = table.find("tbody");
            tbody.find("tr").remove();
            
            for(var i=0;i<data.length; i++){
                var tr = '<tr class="news_list_'+ data[i].id +'">'+            
                    '<td class="category_name" data="'+ data[i].category_id +'">'+
                       data[i].category_name +
                    '</td>'+
                    '<td>'+
                        '<a href="#" class="title">'+ data[i].title +'</a>'+
                    '</td>'+
                    '<td style="display:none;" class="context">'+
                        data[i].context +
                    '</td>' +
                    '<td class="user_name">'+ data[i].user_name +'</td>'+
                    '<td class="ctr">'+ data[i].ctr +'</td>'+
                    '<td class="created_at">'+ data[i].created_at +'</td>'+
                    '<td>'+
                        '<span class="news_panle">'+
                           '<a href="javascript:void(0)" data="'+ data[i].id +'" class="news_edit"><i class="icon-edit"></i></a>'+
                           '<a href="javascript:void(0)" data="'+ data[i].id +'" class="news_delete"><i class="icon-trash"></i></a> '+
                        '</span>'+
                    '</td>'+
                '</tr>';
                tbody.append(tr);
            }
            
            bind_new_edit();
            bind_new_delete();
        })
    })
}());


