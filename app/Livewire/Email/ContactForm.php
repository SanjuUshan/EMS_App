<?php

namespace App\Livewire\Email;

use App\Mail\ContactUsMail;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class ContactForm extends Component
{

    public $name;
    public $email;
    public $message;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function send()
    {
        $validatedDate = $this->validate();
        // dd($validatedDate);
        try {
            //code..
            Mail::to('sanuja@gdcreations.com')->send(New ContactUsMail($validatedDate));

            // session()->flash('success', 'Email sent successfully!');
            $this->sweetToast('success','Message Sent successfully!','success');
        } catch (\Throwable $th) {
            //throw $th;
            Session()->flash('error','Message Sent not successfully! ');
        }





        $this->reset();
    }



    public function render()
    {



        // return view('livewire.email.contact-form');

        /** @var \Illuminate\View\View $view */
        $view = view('livewire.email.contact-form');
        $view->layout('layouts.admin');

        return $view;
    }
}
