var form = document.getElementById("form-connection");

if(form.addEventListener){
    form.addEventListener("submit", validConnection);
}else if(form.attachEvent){
    form.attachEvent("onsubmit", validConnection);
}

function validConnection(evt){
    var servername = document.getElementById('servername');
    var username = document.getElementById('username');
    var password = document.getElementById('password');
    var dbname = document.getElementById('dbname');
    var port = document.getElementById('port');
    var query = document.getElementById('query');
    var countError = "";

    /*Valid input Servername*/
    box_servername = document.querySelector('.msg-servername');
    if(servername.value == ""){
        box_servername.innerHTML = "Servername is Required";
        box_servername.style.display = 'block';
        countError += 1;
    }else{
        box_servername.style.display = 'none';
    }

    /*Valid input Username*/
    box_username = document.querySelector('.msg-username');
    if(username.value == ""){
        box_username.innerHTML = "Username is Required";
        box_username.style.display = 'block';
        countError += 1;
    }else{
        box_username.style.display = 'none';
    }

    /*Valid input Password*/
    box_password = document.querySelector('.msg-password');
    if(password.value == ""){
        box_password.innerHTML = "Password is Required";
        box_password.style.display = 'block';
        countError += 1;
    }else{
        box_password.style.display = 'none';
    }

    /*Valid input Database Name*/
    box_dbname = document.querySelector('.msg-dbname');
    if(dbname.value == ""){
        box_dbname.innerHTML = "Database Name is Required";
        box_dbname.style.display = 'block';
        countError += 1;
    }else{
        box_dbname.style.display = 'none';
    }

    /*Valid input Database Port*/
    box_port = document.querySelector('.msg-port');
    if(port.value == ""){
        box_port.innerHTML = "Database Port is Required";
        box_port.style.display = 'block';
        countError += 1;
    }else{
        box_port.style.display = 'none';
    }

    /*Valid input Query SQL*/
    box_query = document.querySelector('.msg-query');
    if(query.value == ""){
        box_query.innerHTML = "Query SQL is Required";
        box_query.style.display = 'block';
        countError += 1;
    }else{
        box_query.style.display = 'none';
    }

    if(countError > 0){

        evt.preventDefault();
    }
}

