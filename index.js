function goToByScroll(id) {
    // Remove "link" from the ID
    // Scroll
    var element = $(id);
    /*console.log('element: '+element);*/
    var offset = element.offset();
    var topDistnce = offset.top;
    /*console.log('offset top: '+offset.top);*/
    topDistnce = topDistnce-50;
    /*console.log('offset top: '+offset.top);*/
    $('html, body').animate({scrollTop: topDistnce}, 800);    
}



!(function(d){
    //Go to some id by smooth scrolling
    function changeNavBG(type){
        nb = d.getElementsByClassName("shadow");
        logotipo = d.getElementsByClassName("navbar__logo__img");
        switch( type ){
            case 0:{
                $(nb).css({
                    transition : 'background\-image 3s ease-out',
                    "background-image" : "linear-gradient(to top, transparent 5%, #1D1D1B 95%)",
                    "opacity" : "0.7",
                    "height" : "130px"
                });
                /*$(logotipo).attr("src","img/basic/logotipo.png");*/
                break;
            }
            case 1:{
                $(nb).css({
                    transition : 'background\-image 3s ease-out',
                    "background-image" : "linear-gradient(to top, #1D1D1B ,#1D1D1B)",
                    "opacity" : "1",
                    "height" : "125px"
                });
                /*$(logotipo).attr("src","img/basic/logotipo_blanco.png");*/
                break;
            }
        }
    }
    $(d).scroll(function() { 
        if( $(window).scrollTop() > 100  ) {   
          changeNavBG(1);
        }else{
            changeNavBG(0);
        }
     });
}(document));
