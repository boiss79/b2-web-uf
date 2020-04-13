@component('mail::message')
# Welcome ;)

Bonjour {{ Str::ucfirst($data['first_name']) }},

Toute l'équipe de Ma Fiche de Révision vous souhaite bienvenue ! N'hésitez pas à consulter les fiches proposées sur notre site.

@component('mail::button', ['url' => route('home')])
Aller sur le site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
