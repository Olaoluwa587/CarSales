let loginstatus = false;

function changeview(){
        let pwdinput = document.getElementById("pwdchange");

        if(loginstatus === false){
            pwdinput.setAttribute("type", "text");
            loginstatus = true;
        }else if(loginstatus === true){
            pwdinput.setAttribute("type", "password");
            loginstatus = false;
        }
}
// && empty($address) && empty($position) && empty($telephone)