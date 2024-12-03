// Attendez que le DOM soit chargé
document.addEventListener('DOMContentLoaded', function() {
 // Ajoutez un gestionnaire d'événements au champ de recherche
 var searchInput = document.getElementById('search-name');
 if (searchInput) {
     searchInput.addEventListener('input', function() {
         var searchValue = this.value.toLowerCase();

         // Loop through each table row and hide/show based on the search value
         var rows = document.querySelectorAll('#reclamation-table tbody tr');

         for (var i = 0; i < rows.length; i++) {
          var name = rows[i].querySelector('.text-nowrap.align-middle:nth-child(2)').textContent.toLowerCase();

             if (name.includes(searchValue)) {
                 rows[i].style.display = ''; // Show the row if the name matches the search value
             } else {
                 rows[i].style.display = 'none'; // Hide the row if the name does not match the search value
             }
         }
     });
 }
});
//////////////////////// chercher avec id 

document.addEventListener('DOMContentLoaded', function() {
 
 var searchInput = document.getElementById('search-id');
 if (searchInput) {
     searchInput.addEventListener('input', function() {
         var searchValue = this.value.toLowerCase();

         var rows = document.querySelectorAll('#reclamation-table tbody tr');

         for (var i = 0; i < rows.length; i++) {
          var name = rows[i].querySelector('.text-nowrap.align-middle:first-child').textContent.toLowerCase();

             if (name.includes(searchValue)) {
                 rows[i].style.display = ''; 
             } else {
                 rows[i].style.display = 'none'; 
             }
         }
     });
 }
});

/////////////////:: chercher avec numero
document.addEventListener('DOMContentLoaded', function() {
 
 var searchInput = document.getElementById('search-num');
 if (searchInput) {
     searchInput.addEventListener('input', function() {
         var searchValue = this.value.toLowerCase();

         var rows = document.querySelectorAll('#reclamation-table tbody tr');

         for (var i = 0; i < rows.length; i++) {
          var name = rows[i].querySelector('.text-nowrap.align-middle:nth-child(3)').textContent.toLowerCase();

             if (name.includes(searchValue)) {
                 rows[i].style.display = ''; 
             } else {
                 rows[i].style.display = 'none'; 
             }
         }
     });
 }
});
/////////////////:: chercher avec email
document.addEventListener('DOMContentLoaded', function() {
 
 var searchInput = document.getElementById('search-email');
 if (searchInput) {
     searchInput.addEventListener('input', function() {
         var searchValue = this.value.toLowerCase();

         var rows = document.querySelectorAll('#reclamation-table tbody tr');

         for (var i = 0; i < rows.length; i++) {
          var name = rows[i].querySelector('.text-nowrap.align-middle:nth-child(4)').textContent.toLowerCase();

             if (name.includes(searchValue)) {
                 rows[i].style.display = ''; 
             } else {
                 rows[i].style.display = 'none'; 
             }
         }
     });
 }
});