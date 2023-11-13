// modal.js

document.addEventListener('DOMContentLoaded', function() {
    // Get the modal
    var modal = document.getElementById('myModal');

    // Show the modal
    modal.style.display = "block";

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    // Get the form
    var contactForm = document.getElementById('contactForm');

    // Handle form submission
    contactForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // You can add your form submission logic here
        // For example, you can use Fetch API to send the form data to a server
        // Replace the URL with the actual endpoint to handle the form submission
        fetch('your-server-endpoint', {
            method: 'POST',
            body: new FormData(contactForm),
        })
        .then(response => response.json())
        .then(data => {
            // Handle the response from the server (success or error)
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});