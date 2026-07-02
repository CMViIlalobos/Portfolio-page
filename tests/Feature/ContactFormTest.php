<?php

namespace Tests\Feature;

use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function test_contact_form_sends_email(): void
    {
        Mail::fake();

        $this->get(route('contact'));

        $response = $this->post(route('contact.send'), [
            '_token' => session()->token(),
            'name' => 'Test Sender',
            'email' => 'sender@example.com',
            'subject' => 'Project inquiry',
            'message' => 'I would like to talk about a Laravel project.',
        ]);

        $response
            ->assertRedirect(route('contact'))
            ->assertSessionHas('success');

        Mail::assertSent(ContactMessageMail::class, function (ContactMessageMail $mail) {
            return $mail->hasTo(config('mail.contact_to'))
                && $mail->contact['email'] === 'sender@example.com'
                && $mail->contact['subject'] === 'Project inquiry';
        });
    }
}
