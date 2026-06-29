<?php

namespace App\Support;

class AppUrl
{
    public static function resolve(string $fallback = 'http://localhost'): string
    {
        $appUrl = self::clean(env('APP_URL'));

        if ($appUrl !== null) {
            return $appUrl;
        }

        $vercelUrl = self::clean(env('VERCEL_URL'));

        if ($vercelUrl !== null) {
            return str_starts_with($vercelUrl, 'http')
                ? $vercelUrl
                : 'https://'.$vercelUrl;
        }

        return $fallback;
    }

    public static function assetUrl(): ?string
    {
        $rawAssetUrl = env('ASSET_URL');
        $assetUrl = self::clean($rawAssetUrl);

        if ($assetUrl !== null) {
            return $assetUrl;
        }

        return is_string($rawAssetUrl) && trim($rawAssetUrl) !== ''
            ? self::resolve()
            : null;
    }

    private static function clean(mixed $value): ?string
    {
        if (! is_string($value)) {
            return null;
        }

        $value = rtrim(trim($value), '/');

        if ($value === '' || ! self::looksConfigured($value)) {
            return null;
        }

        return $value;
    }

    private static function looksConfigured(mixed $value): bool
    {
        if (! is_string($value)) {
            return false;
        }

        $value = strtolower($value);

        return ! str_contains($value, 'undefined')
            && ! str_contains($value, '${');
    }
}
