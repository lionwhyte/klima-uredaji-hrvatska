<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\ContactFormSubmitted;
use App\Mail\ContactFormUserResponse;

class ContactFormController extends Controller
{
    public function submitForm(Request $request)
    {
        // Validate the form data (customize the rules as needed)
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:20',
            'city' => 'required|string|max:50',
            'subject' => 'nullable|string|max:50',
            'message' => 'required|string|max:255',
        ], [
            'name.required' => 'Ime je obavezno polje.',
            'name.max' => 'Ime ne smije biti duže od :max znakova.',
            'city.required' => 'Grad je obavezno polje.',
            'city.max' => 'Grad ne smije biti duži od :max znakova.',
            'phone.required' => 'Telefon je obavezno polje.',
            'phone.max' => 'Telefon ne smije biti duži od :max znakova.',
            'email.required' => 'Email je obavezno polje.',
            'email.max' => 'Email ne smije biti duži od :max znakova.',
            'email.email' => 'Email je neispravan.',
            'subject.max' => 'Predmet ne smije biti duži od :max znakova.',
            'message.required' => 'Poruka je obavezno polje.',
            'message.max' => 'Poruka ne smije biti duža od :max znakova.',
           
            // Other custom messages...
        ]);

        

        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }
        
        // Access the validated data using the validated() method
        $validatedData = $validator->validated();

        $previousUrl = url()->previous();
        $previousPath = parse_url($previousUrl, PHP_URL_PATH);
        $validatedData['path'] = $previousPath;

        // Send email to the seller
        Mail::to(config('mail.from.address'))->send(new ContactFormSubmitted($validatedData));

        // Send an automatic response to the user
        Mail::to($request->input('email'))->send(new ContactFormUserResponse($validatedData));

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Hvala vam na poruci. Poslana je.');
    }
}
