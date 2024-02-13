<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="names" :value="__('Name')" />
            <x-text-input id="names" name="names" type="text" class="mt-1 block w-full" :value="old('names', $user->names)" required autofocus autocomplete="names" />
            <x-input-error class="mt-2" :messages="$errors->get('names')" />
        </div>

        <div>
            <x-input-label for="second_name" :value="__('Second Name')" />
            <x-text-input id="second_name" name="second_name" type="text" class="mt-1 block w-full" :value="old('second_name', $user->second_name)" required autofocus autocomplete="second_name" />
            <x-input-error class="mt-2" :messages="$errors->get('second_name')" />
        </div>

        <div>
            <x-input-label for="nacimiento" :value="__('Nacimiento')" />
            <x-text-input id="nacimiento" name="nacimiento" type="date" class="mt-1 block w-full" :value="old('nacimiento', $user->nacimiento)" required autofocus autocomplete="nacimiento" />
            <x-input-error class="mt-2" :messages="$errors->get('nacimiento')" />
        </div>

        <div>
            <x-input-label for="rfc" :value="__('RFC')" />
            <x-text-input id="rfc" name="rfc" type="text" class="mt-1 block w-full" :value="old('rfc', $user->rfc)" required autofocus autocomplete="rfc" />
            <x-input-error class="mt-2" :messages="$errors->get('rfc')" />
        </div>

        <div>
            <x-input-label for="curp" :value="__('CURP')" />
            <x-text-input id="curp" name="curp" type="text" class="mt-1 block w-full" :value="old('curp', $user->curp)" required autofocus autocomplete="curp" />
            <x-input-error class="mt-2" :messages="$errors->get('curp')" />
        </div>

        <div>
            <x-input-label for="telefono" :value="__('Telefono')" />
            <x-text-input id="telefono" name="telefono" type="string" class="mt-1 block w-full" :value="old('telefono', $user->telefono)" required autofocus autocomplete="telefono" />
            <x-input-error class="mt-2" :messages="$errors->get('telefono')" />
        </div>

        <div>
            <x-input-label for="calle" :value="__('Calle')" />
            <x-text-input id="calle" name="calle" type="text" class="mt-1 block w-full" :value="old('calle', $user->calle)" required autofocus autocomplete="calle" />
            <x-input-error class="mt-2" :messages="$errors->get('calle')" />
        </div>

        <div>
            <x-input-label for="colonia" :value="__('Colonia')" />
            <x-text-input id="colonia" name="colonia" type="text" class="mt-1 block w-full" :value="old('colonia', $user->colonia)" required autofocus autocomplete="colonia" />
            <x-input-error class="mt-2" :messages="$errors->get('colonia')" />
        </div>

        <div>
            <x-input-label for="cp" :value="__('Código Postal')" />
            <x-text-input id="cp" name="cp" type="number" class="mt-1 block w-full" :value="old('cp', $user->cp)" required autofocus autocomplete="cp" />
            <x-input-error class="mt-2" :messages="$errors->get('cp')" />
        </div>

        <div>
            <x-input-label for="ciudad" :value="__('Ciudad')" />
            <x-text-input id="ciudad" name="ciudad" type="text" class="mt-1 block w-full" :value="old('ciudad', $user->ciudad)" required autofocus autocomplete="ciudad" />
            <x-input-error class="mt-2" :messages="$errors->get('ciudad')" />
        </div>

        <div>
            <x-input-label for="estado" :value="__('Estado')" />
            <x-text-input id="estado" name="estado" type="text" class="mt-1 block w-full" :value="old('estado', $user->estado)" required autofocus autocomplete="estado" />
            <x-input-error class="mt-2" :messages="$errors->get('estado')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
