<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use App\Mail\MailNotify;
use Mail;
use Livewire\Component;

class ContactComponent extends Component
{
    public function sendContactForm(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::to('rokayajabri02@gmail.com')->send(new MailNotify($data));

        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès!');
    }
    public function render()
    {
        return view('livewire.contact-component');
    }
}
