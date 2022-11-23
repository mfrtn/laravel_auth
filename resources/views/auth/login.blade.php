<x-app-layout>

    <main>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h3>
                ورود
            </h3>
            <div>
                <div>
                    <input type="text" dir="ltr" name="mobile" autocomplete="mobile" placeholder="موبایل"
                        required />
                </div>

            </div>
            <div>
                <div>
                    <input type="password" dir="ltr" name="password" placeholder="رمز عبور" required required
                        autocomplete="current-password" />
                </div>
            </div>
            <div>
                <button type="submit">
                    تایید
                </button>
            </div>


            <div>
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span>{{ __('Remember me') }}</span>
                </label>
            </div>

            <div>
                @error('mobile')
                    <p>Mobile: {{ $message }}</p>
                @enderror
            </div>







        </form>
    </main>

</x-app-layout>
