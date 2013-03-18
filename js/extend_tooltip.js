(function(){
    var options = {};
    var els = $("[rel=tooltip]");
    
    for(var i=0;i<els.length;i++){
        var el = $(els[i]);
        var title = el.attr("data-original-title");
        var placement = el.attr("data-placement");
        if(title){
            options["title"] = title;
        }
        if(placement){
            options["placement"] = placement;
        }
        
        el.tooltip(options);
    }    
}())