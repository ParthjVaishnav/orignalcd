<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #6D5BBA, #8D58BF);
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
            animation: fadeIn 1s ease-in-out;
        }
        h2 {
            margin-bottom: 15px;
            color: #6D5BBA;
        }
        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: 0.3s;
        }
        input:focus {
            border-color: #6D5BBA;
            box-shadow: 0px 0px 5px rgba(109, 91, 186, 0.5);
            outline: none;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #6D5BBA;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #5740a7;
        }
        .message {
            font-size: 14px;
            margin-top: 5px;
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
        .link {
            margin-top: 15px;
            display: block;
            color: #6D5BBA;
            text-decoration: none;
        }
        .link:hover {
            text-decoration: underline;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="button" onclick="sendOtp()">Send OTP</button>
            <small id="otpMessage" class="message"></small>

            <input type="text" name="otp" placeholder="Enter OTP" required disabled>
            <input type="password" name="password" placeholder="Password" required disabled>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required disabled>
            <button type="submit" disabled>Register</button>
        </form>

        <a href="{{ route('login') }}" class="link">Already have an account? Login</a>
    </div>

    <script>
        function sendOtp() {
            let email = document.querySelector('input[name="email"]').value;
            let otpInput = document.querySelector('input[name="otp"]');
            let passwordInputs = document.querySelectorAll('input[type="password"]');
            let registerButton = document.querySelector('button[type="submit"]');
            let otpMessage = document.getElementById('otpMessage');

            otpMessage.innerText = "Sending OTP...";
            otpMessage.className = "message";

            fetch('/send-otp', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ email: email })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    otpMessage.innerText = "OTP Sent Successfully!";
                    otpMessage.className = "message success";
                    otpInput.disabled = false;
                    passwordInputs.forEach(input => input.disabled = false);
                    registerButton.disabled = false;
                } else {
                    otpMessage.innerText = "Failed to send OTP. Try again.";
                    otpMessage.className = "message error";
                }
            })
            .catch(error => {
                otpMessage.innerText = "Something went wrong. Please try again.";
                otpMessage.className = "message error";
            });
        }
    </script>

</body>
</html>
