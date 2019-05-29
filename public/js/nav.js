function opensidemenu(){
    document.getElementById('sidemenu').style.width = '200px';
    document.getElementById('main').style.marginLeft = '120px';
    document.getElementById('main').style.marginRight = '0px';
    document.getElementsByClassName('togglesidebar').style.marginLeft = '230px';
    document.getElementById('togglesidebar').style.visibility = 'hidden';

    
}

function closesidemenu(){
    document.getElementById('sidemenu').style.width = '0px';
    document.getElementById('main').style.marginLeft = '60px';
    document.getElementsByClassName('togglesidebar').style.marginLeft = '30px';
}