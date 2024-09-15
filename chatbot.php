<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot - Multi-Museum Ticketing System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul class="navbar">
            <li id="home-nav"><a href="index.html">Home</a></li>
                <li id="chatbot-nav" style="display:none;"><a href="chatbot.php">Chatbot</a></li>
                <li id="logout-nav" style="display:none;"><a href="logout.php">Logout</a></li>
                <li id="signup-nav"><a href="signup.html">Sign Up</a></li>
                <li id="login-nav"><a href="login.html">Login</a></li>
            </ul>
        </nav>
        <h1>Chatbot Assistance</h1>
    </header>

    <main>
        <section id="chatbot">
            <div id="chat-container">
                <div id="chat-log"></div>
                <input type="text" id="user-input" placeholder="Type your message...">
                <button id="send-btn">Send</button>
            </div>
        </section>

        <section id="museum-selection">
            <h2>Select a Museum</h2>
            <form id="museum-form">
                <label for="museum-name">Museum:</label>
                <select id="museum-name" onchange="updateMuseumInfo()">
                    <option value="museum1">Museum of Art</option>
                    <option value="museum2">Science Museum</option>
                    <option value="museum3">History Museum</option>
                </select>
            </form>
        </section>

        <section id="ticket-selection" style="display:none;">
            <h2>Select Your Tickets</h2>
            <form id="ticket-form">
                <label for="ticket-type">Ticket Type:</label>
                <select id="ticket-type">
                    <option value="general">General Admission</option>
                    <option value="exhibit">Special Exhibit</option>
                </select>

                <label for="ticket-quantity">Quantity:</label>
                <input type="number" id="ticket-quantity" min="1" max="10" value="1">

                <button type="button" id="proceed-to-payment" onclick="proceedToPayment()">Proceed to Payment</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Multi-Museum Ticketing System</p>
    </footer>
    <script>
        function updateMuseumInfo() {
            const museumSelection = document.getElementById('museum-name').value;
            const ticketSection = document.getElementById('ticket-selection');
            
            // Show the ticket selection section when a museum is selected
            ticketSection.style.display = 'block';
        }

        function proceedToPayment() {
            const museum = document.getElementById('museum-name').value;
            let paymentUrl = '';

            // Set the Stripe payment URL based on the selected museum
            switch (museum) {
                case 'museum1':
                    paymentUrl = 'https://buy.stripe.com/test_00gcQx12F0Cte2c288'; // Museum of Art URL
                    break;
                case 'museum2':
                    paymentUrl = 'https://buy.stripe.com/test_00g8d0xF0Cte2d548'; // Science Museum URL
                    break;
                case 'museum3':
                    paymentUrl = 'https://buy.stripe.com/test_00g7c2x12F0Cte2eec8'; // History Museum URL
                    break;
                default:
                    alert('Please select a museum');
                    return;
            }

            window.location.href = 'https://buy.stripe.com/test_00gcQx12F0Cte2c288';
        }
    </script>
    <script src="app.js"></script>
</body>
</html>
