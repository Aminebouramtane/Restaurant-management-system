@extends("templates.serveur")
@section("contenu")
    <table class="table table-striped mt-4">
        <tr>
            <th>#</th>
            <th>Plats</th>
            <th>Total</th>
            <th>Etat</th>
            <th>Actions</th>
        </tr>
        @foreach($commandes as $commande)
            <tr>
                <td>{{ $commande->id }}</td>
                <td>
                    <ul type='dash'>
                        @foreach($commande->plats as $plat)
                        <li>{{ $plat->intitule}} ({{$plat->pivot->nombre}})</li>
                        @endforeach
                    </ul>
                </td>


                <td>
                    {{-- {{ $commande->total() }} Dhs --}}
                </td>
                <td>
                    {{-- {{$commande->etat}} --}}
                </td>
                <td>
                    {{-- @if($commande->etat=="terminé")
                        <a href="{{route('serveur.commande.changeretat', [$commande->id, 'servi'])}}" >Servi</a>
                        <a href="{{route('serveur.commande.changeretat', [$commande->id, 'emporté'])}}">Emporté</a>
                    @elseif($commande->etat=="en_cours")
                        <a href="{{route('serveur.commande.terminer', $commande->id)}}" class="btn btn-link">Terminé</a>
                    @endif --}}
                </td>
            </tr>
        @endforeach
    </table>
    {{-- {{$commandes->links()}} --}}
@endsection
