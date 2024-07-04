<?php

namespace App\Helpers;

class TokenHelper {
    private static $secretKey = 'Pass@2024';

    public static function generateToken($id) {
        $payload = base64_encode($id);
        $signature = hash_hmac('sha256', $payload, self::$secretKey);
        return $payload . '.' . $signature;
    }

    public static function verifyToken($token) {
        $parts = explode('.', $token);
        if (count($parts) !== 2) {
            return false;
        }

        $payload = $parts[0];
        $signature = $parts[1];
        $expectedSignature = hash_hmac('sha256', $payload, self::$secretKey);

        if (hash_equals($expectedSignature, $signature)) {
            return base64_decode($payload);
        }

        return false;
    }
}
