console.log("DRAGUI DRAGUI");
$(document).ready( () =>{
    //For each drag__are create event listeners
    let drags = $('.drag__area');
    for (const drag of drags) {
        console.log(drag);
        $(drag).on('dragover', (e) => {
            e.preventDefault();
            $(drag).addClass("file_drag_over");
            return true;
        });
        $(drag).on('dragleave', (e) => {
            e.preventDefault();
            $(drag).removeClass("file_drag_over");
            return true;
        });
        $(drag).on('drop', function(e){
            e.preventDefault();
            console.log("Nunca me imprimo :(");
            
            $(drag).removeClass("file_drag_over");

            var dt = e.dataTransfer || (e.originalEvent && e.originalEvent.dataTransfer);
            var dropList = e.target.files || (dt && dt.files);
            if (dropList) {
                console.log("UHRAY!");
                let iteration = e.target.id;
                console.log("iteration: "+ iteration);
                project_id = $(".project_ids")[iteration].id;
                console.log("Los archivos irán al proyecto: "+project_id);
                formData = new FormData;
                formData.append("project_id", project_id);
                console.log(dropList);
                console.log(dropList.length);
                size = dropList.length;
                formData.append("size", size);
                console.log("The size is "+ size);
                for (let file of dropList) {
                    formData.append('file[]', file);
                }
                let fileContainer = $(".drag__files")[iteration];
                $.ajax({
                    url: "utilities/management/dragUpload.php",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: (data) => {
                        $(fileContainer).html(data);
                    }
                })
            }
            else {
                // Perhaps some kind of message here
            }
  
            return true;
        });
    }
} )