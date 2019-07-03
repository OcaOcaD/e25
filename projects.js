function selectCategory(c){
    window.location = 'projects.php?c='+c;
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
        }
    }

    function changeView( info ){
        console.log(info);
        const c =  info.attr('name');
        const p = info.attr('value');
        console.log(c);
        console.log(p);
        switch ( info ){
            case 1:{

                break;
            }
            case 1:{

                break;
            }
            case 1:{

                break;
            }
            case 1:{

                break;
            }
        }
    }
}(document));