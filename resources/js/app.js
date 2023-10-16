import './bootstrap';

// Create an event listener that will send a POST request to the
// server when the user clicks the button.
document.querySelector('#submit-button').addEventListener(
    'click',
    () => window.axios.post('/button/clicked')
);


// Subscribe to the public channel called "public-channel"
Echo.channel('public-channel')

    // Listen for the event called "button.clicked"
    .listen('.button.clicked', (e) => {

        // Display the "message" in an alert box
        alert(e.message);
    });
