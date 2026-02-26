<p>Hello,</p>

<p>You have been invited to join the colocation "{{ $invitation->colocation->name }}".</p>

<p>Click here to accept the invitation:</p>

<a href="{{ route('colocations.join', $invitation->token) }}">
    Join Colocation
</a>