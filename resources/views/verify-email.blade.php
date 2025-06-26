<x-guest-layout>
    <h1 class="mb-4">Vérification de votre email</h1>
    <p>Un lien de vérification a été envoyé à votre adresse email.</p>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success mt-3">
            Un nouveau lien de vérification a été envoyé à votre email.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-primary mt-4">Renvoyer le lien</button>
    </form>
</x-guest-layout>
