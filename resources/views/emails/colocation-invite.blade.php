<p>Hello,</p>

<p>You have been invited to join the colocation "{{ $invitation->colocation->name }}".</p>

<p>Click here to accept the invitation:</p>

<a href="{{ route('invitations.accept', $invitation->token) }}">
    Join Colocation
</a>