(function(){
    elementEntrance('fade-in-up','in-viewport');
    window.addEventListener('scroll', function(){
        elementEntrance('fade-in-up','in-viewport');
        
    })

})()

$(document).on('click','.members .member .name, .members .member .image',function(){
    var dis = $(this).parent();
    var left = dis.position().left;
    var hasDetail = dis.find('.details');
    left = left + 10;
    if(hasDetail.length > 0){
        if(dis.hasClass('active')){
            dis.removeClass('active');
        }else{
            $('.members .member').removeClass('active');
            dis.addClass('active');
            dis.children('.details').css({'left':'-'+left+'px'});

            setTimeout(function(){
                var top  = dis.position().top;
                $('html, body').animate({
                    scrollTop: top - 120,
                },200);
            },500);
            
        }
    }
});

function elementEntrance(el,inViewport){
    var inHeight = window.innerHeight; // get the height of the window that serve as viewport
    var elPos    = inHeight - 100; // element position
    var elem     = document.getElementsByClassName(el);
    var size     = elem.length;
    var count    = 0;
    if(size > 0){
        while(count < size){
            var elem     = document.getElementsByClassName(el)[count];
            var pos = position(elem);
            if(elPos >= pos.top){
                elem.classList.add(inViewport);
            }
            count++;
        }
    }
    
}
function position(element){
    var pos = {};
    if(element){
        var rect = element.getBoundingClientRect();
        pos['top'] = rect.top;
    }
    return pos;
}
