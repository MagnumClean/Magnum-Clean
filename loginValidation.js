function validateLogin() {
    let username = document.forms["login"]["uname"].value;
    let extension = document.forms["login"]["extension"].value;
    let password = document.forms["login"]["pswd"].value;
    var a=0,b=0;
    username += extension;
    var atposition=username.indexOf("@");  
    var dotposition=username.lastIndexOf("."); 
    const accountObj = {
        email: username,
        password: password
    }

    
    if(password=="")
        document.getElementById("pswdAlert").innerHTML = "Veuillez remplir ce champs.";
    if(password!=""){   
        document.getElementById("pswdAlert").innerHTML = "";
        b=1;
    }
    if (atposition<1 || dotposition<atposition+2 || dotposition+2>=username.length){ 
        if(username=="")
            document.getElementById("unameAlert").innerHTML = "Veuillez remplir ce champs.";
        else
            document.getElementById("unameAlert").innerHTML = "Votre identifiant doit respecter la forme suivante: 'identifiant@exemple.com'.";
    }
    if (atposition>=1 && dotposition>=atposition+2 && dotposition+2<username.length) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() { 
            if (this.readyState == 4 && this.status == 200) {
                var response = this.responseText;
                var validation = JSON.parse(response);
                if(validation=="true"){
                    document.getElementById("unameAlert").innerHTML = "";
                    document.getElementById("pswdAlert").innerHTML = "";
                    a=1;
                }
                else if (validation =="wrong"){
                    document.getElementById("unameAlert").innerHTML = "";
                    if(password!="")
                    document.getElementById("pswdAlert").innerHTML = "Mot de passe incorrect."
                    else
                    document.getElementById("pswdAlert").innerHTML = "Veuillez remplir ce champs."; ;
                    }
                else if(validation=="false"){
                    document.getElementById("pswdAlert").innerHTML = "";
                    document.getElementById("unameAlert").innerHTML = "Identifiant inconnu.";}
            }
        };
        xhttp.open("POST", "loginValidation.php", false); 
        xhttp.setRequestHeader("Content-Type", "application/json");
        var account= JSON.stringify(accountObj);
       // console.log(account);
        xhttp.send(account);
    }

    
    if(a==1 && b==1)
        return true;
    else 
        return false;
}