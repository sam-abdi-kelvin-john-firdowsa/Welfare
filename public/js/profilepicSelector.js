function previewFile(){
    var preview = document.querySelector('#avatarImg');
    var file    = document.querySelector('input[type=file]').files[0];
    var reader  = new FileReader();

    reader.onloadend = function(){
        preview.src = reader.result;
    }

    if (file){
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}

function removePreview(){
    var preview = document.querySelector('#avatarImg');
    var file    = document.querySelector('input[type=file]').files[0];
    var reader  = new FileReader();

    reader.onloadend = function(){
        preview.src = "images/user/defaultAvatar.jpg";
    }

    if (file){
        reader.readAsDataURL(file);
    } else {
        preview.src = "images/user/defaultAvatar.jpg";
    }
    
   
}

previewFile();

removePreview();