document.getElementById("form").addEventListener("keyup",function()
{
  validateForm();
}
);
function validateForm() {
    var libelle = document.getElementById('libelle').value;
    var prix = document.getElementById('prix').value;
    var photo = document.getElementById('photo').value;
  
    if (libelle === '' || prix === '' || photo === '') {
      alert('Veuillez remplir tous les champs');
      return false;
    }
    
    var firstChar = libelle.charAt(0);
    if (firstChar !== firstChar.toUpperCase()) {
      alert('Le libellé doit commencer par une lettre majuscule');
      return false;
    }


    if (parseFloat(prix) <= 0) {
      alert('Le prix doit être supérieur à 0');
      return false;
    }
  
  
    return true;
}
  