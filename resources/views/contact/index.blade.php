@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-lg-11">

            <h2>Gestion Contact</h2>

        </div>

        <div class="col-lg-1">
            <a class="btn btn-success" href="{{ url('contact/create') }}">Ajouter</a>
        </div>

    </div>



    @if ($message = Session::get('success'))

        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

    @endif



    <table class="table table-bordered">

        <tr>

            <th>No</th>
            <th>Nom Complet</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Salaire</th>
            <th>Actions</th>

        </tr>

        @foreach ($contacts as $index => $contact)

            <tr>
                <td>{{ $index }}</td>
                <td>{{ $contact->nomComplet }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->telephone }}</td>
                <td>{{ $contact->salaire }}</td>
                <td>

                    <form action="{{ url('contact/'. $contact->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <a class="btn btn-info" href="{{ url('contact/afficher'. $contact->id .'/afficher') }}">Voir</a>
                        <a class="btn btn-primary" href="{{ url('contact/modifier'. $contact->id .'/modifier') }}">Modifier</a>

                        <button type="submit" class="btn btn-danger">Supprimer</button>

                    </form>
                </td>

            </tr>

        @endforeach
    </table>

@endsection
