function validateForm() {
    let firstname = document.forms["signup"]["fname"].value;
    let lastname = document.forms["signup"]["lname"].value;
    let email = document.forms["signup"]["uname"].value;
    let extension = document.forms["signup"]["extension"].value;
    let firstpassword = document.forms["signup"]["pswd"].value;
    let secondpassword = document.forms["signup"]["pswdConf"].value;
    let countryCode = document.forms["signup"]["countryCode"].value;
    let number = document.forms["signup"]["number"].value;
    var regEx = /^[A-Za-z]+$/;
    var numEx =  /^[0-9]+$/;
    var a=0,b=0,c=0,d=0,e=0,f=0;
    email += extension;
    var atposition=email.indexOf("@");  
    var dotposition=email.lastIndexOf(".");  

    
    if(!firstname.match(regEx)) {
        if(firstname=="")
        document.getElementById("fnameAlert").innerHTML = "Veuillez remplir ce champs.";
        else
        document.getElementById("fnameAlert").innerHTML = "Votre prénom ne doit contenir que des lettres.";
    }
    if(firstname.match(regEx)){
        document.getElementById("fnameAlert").innerHTML = "";
        a=1;
     }
    
     if(!number.match(numEx)) {
        if(number=="")
        document.getElementById("numberAlert").innerHTML = "Veuillez remplir ce champs.";
        else
        document.getElementById("numberAlert").innerHTML = "Votre numéro ne doit contenir que des chiffres [0-9].";
    }
    if(number.match(numEx)){
        document.getElementById("numberAlert").innerHTML = "";
        b=1;
     }

    if(!lastname.match(regEx)){
        if(lastname=="")
        document.getElementById("lnameAlert").innerHTML = "Veuillez remplir ce champs.";
        else
       document.getElementById("lnameAlert").innerHTML = "Votre nom ne doit contenir que des lettres.";
    }
    if(lastname.match(regEx)){
        document.getElementById("lnameAlert").innerHTML = "";
        c=1;
    }
    if (atposition<1 || dotposition<atposition+2 || dotposition+2>=email.length){ 
        if(email=="")
        document.getElementById("emailAlert").innerHTML = "Veuillez remplir ce champs.";
        else
        document.getElementById("emailAlert").innerHTML = "Votre email doit respecter la forme suivante: 'email@exemple.com'.";
    }
    if (atposition>=1 && dotposition>=atposition+2 && dotposition+2<email.length) {

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() { 
            if (this.readyState == 4 && this.status == 200) {
                var response = this.responseText;
                emailExist = JSON.parse(response);
                if(emailExist=="false"){
                    document.getElementById("emailAlert").innerHTML = "";    
                    d=1;
                }
                else
                    document.getElementById("emailAlert").innerHTML = "E-mail déjà utilisé.";
            }
        };
        xhttp.open("POST", "checkEmail.php", false); 
        xhttp.setRequestHeader("Content-Type", "application/json");
        var emaiil= JSON.stringify(email);
        console.log(emaiil);
        xhttp.send(emaiil);
   
    }
    if(firstpassword.length<6){
        if(firstpassword=="")
        document.getElementById("pswdAlert").innerHTML = "Veuillez remplir ce champs.";
        else
        document.getElementById("pswdAlert").innerHTML = "Votre mot de passe doit contenir au moins 6 caractères.";
        } 
    if(firstpassword.length>=6){   
        document.getElementById("pswdAlert").innerHTML = "";
        e=1;
    }
    if(firstpassword!=secondpassword){ 
        if(secondpassword=="")
        document.getElementById("pswdConfAlert").innerHTML = "Veuillez remplir ce champs.";
        else
        document.getElementById("pswdConfAlert").innerHTML = "Confirmation non valide.";
    }
    if(firstpassword==secondpassword){ 
        document.getElementById("pswdConfAlert").innerHTML = "";
        f=1;
    }
    if(a==1 && b==1 && c==1 && d==1 && e==1 && f==1)
    return true;
    else return false;

}