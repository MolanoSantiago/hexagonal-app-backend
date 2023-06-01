@component('mail::message')
    <h1>Recuperar Contraseña</h1>
    <p>¡Hola {{ $username }}! Hemos recibido una solicitud para restablecer tu contraseña. Tu contraseña temporal es la siguiente:</p>
    <p style="display: inline-block; padding: 10px 20px; background-color: #54abfb; color: #242627; border-radius: 5px; text-decoration: none; font-weight:bold;">{{ $tempPassword }}</p>
    <p>Si no has solicitado restablecer tu contraseña, puedes ignorar este mensaje.</p>
    <p>Saludos,</p>
    <p>El equipo de ArchHex ✌</p>
@endcomponent
