$(document).ready(function() {
    $('#tabla').DataTable( {
        "language": {
            "lengthMenu":"Afficher _MENU_ enregistrements par page.",
            "search" : "Rechercher",
             "zeroRecords": "Table vide. Aucune donnée enregistrée.",
            "info": "Afficher la page _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros aún.",
            "infoFiltered": "(filtré sur un total de _MAX_ enregistrements)",
            "LoadingRecords": "Chargement ...",
            "Processing": "Traitement...",
             "SearchPlaceholder": "Commencez à taper...",
             "paginer": {
     "previous": "Précédent",
     "next": "Suivant", 
      }
        },
     
  
   "sort": false
  
    } );
} );