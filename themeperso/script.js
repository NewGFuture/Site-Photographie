document.addEventListener('DOMContentLoaded', function() {
    // Récupérer la modale
    var modal = document.getElementById('myModal');

    // Récupérer l'élément <span> qui ferme la modale
    var span = document.getElementsByClassName("close")[0];

    // Lorsque l'utilisateur clique sur <span> (x), fermer la modale
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Lorsque l'utilisateur clique n'importe où en dehors de la modale, la fermer
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Récupérer le bouton dans le menu par sa classe
    var contactButton = document.querySelector('.menu-contact');

    // Handle click on the button
    contactButton.addEventListener('click', function(event) {
        event.preventDefault();    
            // Afficher la modale
            modal.style.display = "block";
        // Préremplir automatiquement le champ "RÉF" (remplacez la valeur par celle que vous souhaitez)
        var champRef = document.getElementById('refPhoto');
        champRef.value = "Valeur automatique"; // Remplacez par la valeur souhaitée ou générez-la dynamiquement
    });

    // Récupérer le formulaire
    var contactForm = document.getElementById('contactForm');

    // Gérer la soumission du formulaire
    contactForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Empêcher la soumission par défaut du formulaire

        // Vous pouvez ajouter votre logique de soumission du formulaire ici
        // Par exemple, vous pouvez utiliser l'API Fetch pour envoyer les données du formulaire à un serveur
        // Remplacez l'URL par le véritable point d'extrémité pour gérer la soumission du formulaire
        fetch('votre-point-dextremite', {
            method: 'POST',
            body: new FormData(contactForm),
        })
        .then(response => response.json())
        .then(data => {
            // Gérer la réponse du serveur (succès ou erreur)
            console.log(data);
        })
        .catch(error => {
            console.error('Erreur :', error);
        });
    });
});

