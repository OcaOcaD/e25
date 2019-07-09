function selectCategory(c){
    window.location = 'projects.php?c='+c;
}
function selectProject(c,p){
    window.location = 'projects.php?c='+c+'&p='+p;
}
!(function(d){
    jinfo = $(".info");
    const c = jinfo.attr('name');
    const p = jinfo.attr('value');
    const mainView = document.getElementsByClassName('projectMainContainer');
    console.log("c:"+c + " p: "+p);

    if ( (c == null && p == null) || (c == '' && p == '') ){
        console.log("ACTUALLY NOTHING NOTHING");
        $(mainView).load('components/portfolio/portfolio.php');
    }else{
        console.log("ACTUALLY SOMETHING NOTHING");
        if ( (c != null && p == null) || (c != '' && p == '') ){
            $(mainView).load('components/portfolio/categoryShower.php',{
                category: c
            });
        }else if( (c != null && p != null) || (c != '' && p != '') ){
            console.log("ACTUALLY SOMETHING SOMETHING");
            $(mainView).load('components/portfolio/showProject.php',{
                category: c,
                project: p
            });
        }
    }


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
        if( $(window).scrollTop() > 10  ) {   
          changeNavBG(1);
        }else{
            changeNavBG(0);
        }
     });

}(document));
