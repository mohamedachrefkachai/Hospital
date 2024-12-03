document.getElementById("form_patient").addEventListener("keyup",function()
{
    CheckForm();
});
document.getElementById("form_staff").addEventListener("keyup",function()
{
    verifstaff();
});
function isValidName(name) {
    const namePattern = /^[A-Za-z]+$/;
    return namePattern.test(name);
  }

  function isValidNum(num) {
    const numPattern = /^[0-9]{8}$/;
    return numPattern.test(num);
}
function isValidEmail(email) {
    const emailPattern =/^\S+@esprit.tn+$/;
    return emailPattern.test(email);
}


function CheckForm()
{
    var cin=document.form_patient.cin.value;
    if(isValidNum(cin))
    {
        document.getElementById("cin_an").innerHTML="<span style='color: green;'>Correct</span>";
    }
    else
    {
        document.getElementById("cin_an").innerHTML="<span style='color: red;'>Veuillez entre cin valide (Number uniquement)</span>";
        return false;
    }
    var name=document.form_patient.name.value;
    if(isValidName(name))
    {
        document.getElementById("nom_an").innerHTML="<span style='color: green;'>Correct</span>";
    }
    else
    {
        document.getElementById("nom_an").innerHTML="<span style='color: red;'>Veuillez entre nom valide (lettres uniquement)</span>";
        return false;
    }
    var prenom=document.form_patient.prenom.value;
    if(isValidName(prenom))
    {
        document.getElementById("prenom_an").innerHTML="<span style='color: green;'>Correct</span>";
    }
    else
    {
        document.getElementById("prenom_an").innerHTML="<span style='color: red;'>Veuillez entre prenom valide (lettres uniquement)</span>";
        return false;
    }
    var daate=document.form_patient.date.value;
    var datemin="1950-01-01";
    var datemax="2023-12-31";
    if(daate > datemin || daate < datemax)
    {
        document.getElementById("date_an").innerHTML="<span style='color: green;'>Correct</span>";
  
    }
    else
    {
        document.getElementById("date_an").innerHTML="<span style='color: red;'>La date du match doit etre compris entre le 1er janvier 2024 et le 31 december 2024</span>";
        return false;
    }
    var tel=document.form_patient.tel.value;
    if(isValidNum(tel))
    {
        document.getElementById("tel_an").innerHTML="<span style='color: green;'>Correct</span>";
    }
    else
    {
        document.getElementById("tel_an").innerHTML="<span style='color: red;'>Veuillez entre un numero de télephone  valide (8 chiffres)</span>";
        return false;
    }
}

function verifstaff()
{
    var cin=document.form_staff.cin.value;
    if(isValidNum(cin))
    {
        document.getElementById("cin_an").innerHTML="<span style='color: green;'>Correct</span>";
    }
    else
    {
        document.getElementById("cin_an").innerHTML="<span style='color: red;'>Veuillez entre cin valide (Number uniquement)</span>";
        return false;
    }
    var name=document.form_staff.nom.value;
    if(isValidName(name))
    {
        document.getElementById("nom_an").innerHTML="<span style='color: green;'>Correct</span>";
    }
    else
    {
        document.getElementById("nom_an").innerHTML="<span style='color: red;'>Veuillez entre nom valide (lettres uniquement)</span>";
        return false;
    }
    var prenom=document.form_staff.prenom.value;
    if(isValidName(prenom))
    {
        document.getElementById("prenom_an").innerHTML="<span style='color: green;'>Correct</span>";
    }
    else
    {
        document.getElementById("prenom_an").innerHTML="<span style='color: red;'>Veuillez entre prenom valide (lettres uniquement)</span>";
        return false;
    }
    var email=document.form_staff.email.value;
    if(isValidEmail(email))
    {
        document.getElementById("email_an").innerHTML="<span style='color: green;'>Correct</span>";
    }
    else
    {
        document.getElementById("email_an").innerHTML="<span style='color: red;'>Mail Doit Etre Valide et Contient @esprit.tn</span>";
        return false;
    }
    var telephone=document.form_staff.telephone.value;
    if(isValidNum(telephone))
    {
        document.getElementById("telephone_an").innerHTML="<span style='color: green;'>Correct</span>";
    }
    else
    {
        document.getElementById("telephone_an").innerHTML="<span style='color: red;'>Veuillez entre Numero de Telephone valide 8 number +216</span>";
        return false;
    }
    var daate=document.form_staff.age.value;
    var datemin="1890-01-01";
    var datemax="2024-12-31";
    console.log(datemax);
    if(daate < datemin || daate > datemax)
    {
        document.getElementById("age_an").innerHTML="<span style='color: red;'>La date du match doit etre compris entre le 1er janvier 2024 et le 31 december 1890</span>";
        return false;
    }
    else
    {
        document.getElementById("age_an").innerHTML="<span style='color: green;'>Correct</span>";
    }
    var password=document.form_staff.password.value;
    if(password.length!=0)
    {
        document.getElementById("password_an").innerHTML="<span style='color: green;'>Correct</span>";
    }
    else
    {
        document.getElementById("password_an").innerHTML="<span style='color: red;'>Le mot de passe doit être non nul</span>";
        return false;
    }
}