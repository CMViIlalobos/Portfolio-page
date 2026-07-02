<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force HTTPS in production to avoid mixed content errors on Vercel
        if ($this->app->environment('production')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        $this->syncMailConfigFromRuntimeEnvironment();

        // Fix for "Target class [hash] does not exist" on serverless
        // This sometimes happens if providers aren't fully loaded in the lambda environment
    }

    private function syncMailConfigFromRuntimeEnvironment(): void
    {
        $mailConfig = [
            'MAIL_MAILER' => 'mail.default',
            'MAIL_SCHEME' => 'mail.mailers.smtp.scheme',
            'MAIL_HOST' => 'mail.mailers.smtp.host',
            'MAIL_PORT' => 'mail.mailers.smtp.port',
            'MAIL_USERNAME' => 'mail.mailers.smtp.username',
            'MAIL_PASSWORD' => 'mail.mailers.smtp.password',
            'MAIL_FROM_ADDRESS' => 'mail.from.address',
            'MAIL_FROM_NAME' => 'mail.from.name',
            'CONTACT_MAIL_TO' => 'mail.contact_to',
        ];

        foreach ($mailConfig as $environmentKey => $configKey) {
            $value = $this->runtimeEnvironmentValue($environmentKey);

            if ($value !== null && $value !== '') {
                if ($environmentKey === 'MAIL_SCHEME' && $value === 'tls') {
                    $value = 'smtp';
                }

                config([$configKey => $value]);
            }
        }
    }

    private function runtimeEnvironmentValue(string $key): ?string
    {
        if (array_key_exists($key, $_ENV)) {
            return $_ENV[$key];
        }

        if (array_key_exists($key, $_SERVER)) {
            return $_SERVER[$key];
        }

        $value = getenv($key);

        return $value === false ? null : $value;
    }
}
