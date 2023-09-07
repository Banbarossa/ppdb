<section style="margin-top: 60px;">
    <header>
        
        <h2 class="text-secondari">
            {{ __('Update Password') }}
        </h2>

        <p class="text-secondary">
            {{ __("Ensure your account is using a long, random password to stay secure.") }}
        </p>


        
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-3 space-y-6">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="current_password">Current Password</label>
            <input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="mb-3">
            <label for="current_password">New Password</label>
            <input id="password" name="password" type="password" class="form-control" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="mb-3">
            <label for="current_password">Password Confirmation</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
        </div>
    </form>
</section>
