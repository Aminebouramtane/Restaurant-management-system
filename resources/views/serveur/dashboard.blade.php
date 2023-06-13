@extends("templates.serveur")
@section("contenu")
<div class="row d-flex justify-content-center mt-5">
     @isset($categories)
        @foreach($categories as $categorie)
        <div class="col-2">
            <img src="{{asset($categorie->getPhoto())}}" alt="" class="small-img">
            <a href="{{route('dashboard.categorie.show',$categorie->id )}}" class="fs-6 text-secondary">{{ $categorie->titre }}</a>
        </div>
        @endforeach
    @endisset
</div>
   

    @isset($plats)
        <div class="d-flex flex-wrap mt-5 justify-content-center">
            @foreach($plats as $plat)
            <div class="card mb-2 mx-1 w-25">
                <div class="card-body text-center">
                    <img src="{{asset($plat->getPhoto())}}" alt="" class="medium-img mx-auto">
                    <p class="card-title">{{ $plat->intitule }} <br>
                    {{ $plat->prix }} Dhs</p>
                    @if(session()->has("commande"))
                    @php
                        $commande=session()->get("commande");
                   
                       $plat_in_commande=  $commande->plats()->where("id",$plat->id)->count()>=1;
                        
                    @endphp
                        @if(!$plat_in_commande)
                        <form action="{{route('serveur.commande.add_plat')}}"  method="post">
                            @csrf
                            <input type="hidden" name="plat_id" value="{{$plat->id}}">
                            <input type="number" name="nombre" id="" min="1" value="1" width="30px"/>
                            <button type="submit" class="btn btn-success"><i class="bi bi-plus"></i></button>
                        </form>
                        @endif
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    @endisset
@endsection