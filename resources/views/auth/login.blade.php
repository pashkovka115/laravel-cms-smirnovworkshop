
<center>
    <div>
        <ul>
            @foreach($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
    <form action="{{ route('auth.check') }}" method="post">
        @csrf
        <label>Email
            <input type="email" name="email" value="{{ old('email') }}">
        </label><br><br>
        <label>Пароль
            <input type="password" name="password">
        </label><br><br>
        <label>Запомнить меня
            <input type="checkbox" name="remember">
        </label><br><br>
        <button type="submit">Войти</button>
    </form>
</center>
