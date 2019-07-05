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

}(document));