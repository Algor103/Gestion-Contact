<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // on affiche la liste des contacts
    public function index() {
        $contacts = Contact::all();
        return view('contact.index', compact('contacts'));
    }

    // on retourne le formulaire de creation d'un contact
    public function create() 
    {
        return view('contact.create');
    }
    
    // enregistrement d'un nouveau contact dans la BD
    public function enregistrement(Request $request)
    {
       $request -> validate([
           'nomComplet' => 'required',
           'email'      => 'required',
           'telephone'  => 'required',
           'salaire'    => 'required'
       ]);

       $contact = new contact([
        'nomComplet' => $request -> get('nomComplet'),
        'email' => $request -> get('email'),
        'telephone' => $request -> get('telephone'),
        'salaire' => $request -> get('salaire')
    ]);

       $contact -> save();
       return redirect('/') -> with('success', 'Contact enregistrer avec succes');
    }

    //affiche les details d'un contact specifique
    public function afficher($id)
    {
        $contact = Contact::findOrFail($id);
        return view("contact\afficher", compact('contact'));
    }

    //retour d'un formulaire de modification
    public function modifier($id)
    {
        $contact = Contact::findOrFail($id);
        return view("contact\modifer", compact('contact'));
    }

    // Enregistrement de la modification dans la BD
    public function update(Request $request, $id)
    {
       $request -> validate([
        'nomComplet' => 'required',
        'email'      => 'required',
        'telephone'  => 'required',
        'salaire'    => 'required'
       ]);

       $contact = Contact::findOrFail($id);
       $contact -> nomComplet = $request -> get('nomComplet');
       $contact -> email = $request -> get('email');
       $contact -> telephone = $request -> get('telephone');
       $contact -> salaire = $request -> get('saalaire');

       $contact -> update();
       return redirect('/') -> with('success', 'contact mis a jour');
    }

    // Suppression du contact dans la BD
    public function supprimer($id)
    {
        $contact = Contact::findOrFail($id);
        $contact -> delete();

        return redirect('/') -> with('success', 'contact supprimer');
    }
    
}
