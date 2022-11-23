<x-app-layout>

    <main>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h3>ثبت کاربر جدید</h3>
            <div>
                <div>
                    <input type="text" name="name" autocomplete="name" placeholder="نام" required />
                </div>
            </div>
            <div>
                <div>
                    <input type="text" dir="ltr" name="mobile" autocomplete="mobile" placeholder="موبایل"
                        required />
                </div>
            </div>
            <div>
                <div>
                    <input type="text" dir="ltr" name="login_limit_number"
                        placeholder="محدودیت تعداد ورود همزمان" autocomplete="off" />
                </div>
                <div>
                    <div>
                        <input type="password" dir="ltr" name="password" placeholder="رمز عبور" required
                            autocomplete="new-password" />
                    </div>
                </div>
                <div>
                    <div>
                        <input type="password" dir="ltr" name="password_confirmation" placeholder="تکرار رمز عبور"
                            autocomplete="off" required />
                    </div>
                </div>
                <div>
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div>
                    <button type="submit">تایید</button>
                </div>
        </form>
    </main>

</x-app-layout>
