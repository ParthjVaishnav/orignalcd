<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OtpController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $recipient = trim($request->email);

        if (!filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
            return response()->json(['success' => false, 'message' => 'Invalid email address.']);
        }

        try {
            $otp = rand(100000, 999999);

            Mail::raw("Your OTP is: $otp", function ($message) use ($recipient) {
                $message->to($recipient)
                        ->subject('Your OTP Code');
            });

            return response()->json(['success' => true, 'message' => 'OTP sent successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to send OTP.']);
        }
    }
}
