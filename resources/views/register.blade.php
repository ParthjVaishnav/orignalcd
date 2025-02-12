<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
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
            width: 400px;
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container p-4 shadow-lg">
        <h2 class="mb-3 text-primary">Register</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3 d-flex gap-2">
                <input type="text" name="otp" class="form-control" placeholder="Enter OTP" required disabled>
                <button type="button" class="btn btn-primary" onclick="sendOtp()">Send OTP</button>
                <button type="button" class="btn btn-success" onclick="verifyOtp()">Verify OTP</button>
            </div>
            <small id="otpMessage" class="d-block text-center"></small>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required disabled>
            </div>
            <div class="mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required disabled>
            </div>
            <button type="submit" class="btn btn-primary w-100" disabled>Register</button>
        </form>
        <a href="{{ route('login') }}" class="d-block mt-3">Already have an account? Login</a>
    </div>
    <script>
        let generatedOtp = null;
        function sendOtp() {
            let email = document.querySelector('input[name="email"]').value;
            let otpInput = document.querySelector('input[name="otp"]');
            let otpMessage = document.getElementById('otpMessage');

            otpMessage.innerText = "Sending OTP...";
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
                    generatedOtp = data.otp;
                    otpMessage.innerText = "OTP Sent Successfully!";
                    otpMessage.className = "text-success";
                    otpInput.disabled = false;
                } else {
                    otpMessage.innerText = "Failed to send OTP. Try again.";
                    otpMessage.className = "text-danger";
                }
            })
            .catch(() => {
                otpMessage.innerText = "Something went wrong. Please try again.";
                otpMessage.className = "text-danger";
            });
        }
        function verifyOtp() {
            let enteredOtp = document.querySelector('input[name="otp"]').value;
            let passwordInputs = document.querySelectorAll('input[type="password"]');
            let registerButton = document.querySelector('button[type="submit"]');
            let otpMessage = document.getElementById('otpMessage');

            if (enteredOtp == generatedOtp) {
                otpMessage.innerText = "OTP Verified Successfully!";
                otpMessage.className = "text-success";
                passwordInputs.forEach(input => input.disabled = false);
                registerButton.disabled = false;
            } else {
                otpMessage.innerText = "Invalid OTP. Please try again.";
                otpMessage.className = "text-danger";
            }
        }
    </script>
</body>
</html>
