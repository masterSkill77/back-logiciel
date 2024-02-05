<style>
.container {
    /* width:  */
}
</style>
<div class="container">
@if($typeOperation === 'created')
Veuillez cliquer sur ce lien pour finaliser votre inscription et valider votre compte <a href="{{ $link}}">ici</a>
Vos accès sont :
@else
Votre compte a été modifié avec succès<br/>
Vos nouvelles accès
@endif
Mail : {{$user->email}}
Mot de passe : {{ $passwordNotHashed}}
</div>
