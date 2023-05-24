<form action="{{url('loginProses')}}" method="get">
    @csrf
<div class="form-login" id="modalLogin">
    <div class="header-login">
        <h4>Login</h4>
        <h1 onclick="closeLogin()">X</h1>
    </div>
    <hr>
    
    <input type="email" name="email" value="" id="email" placeholder="Masukan Email Anda">
    <input type="password" name="password" id="pass" placeholder="Masukan Password Anda">
    <button type="submit" class="btnLogin" >Masuk</button>
    <p>Belum punya akun ... !</p>
    <button type="button" class="btnRegis" onclick="daftar()">Daftar</button>
</div>
</form>

