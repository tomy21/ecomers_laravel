    <div class="form-daftar" id="modaldaftar">
        <div class="header-daftar">
            <h4>Daftar Mamber</h4>
            <h1 onclick="closeRegis()">X</h1>
        </div>
        <hr>
        <input type="text" name="name" id="name" placeholder="Masukan Nama Anda">
        <input type="text" name="tlp" id="tlp" placeholder="Masukan No Tlp Anda">
        <input type="email" id="email_daftar" placeholder="Masukan Email Anda" autocomplete="off">
        <input type="password" name="pass" id="password" placeholder="Masukan Password Anda">

        <label for="tgl_lahir" >Tanggal Lahir :</label>
        <input type="date" name="date" id="tgl_lahir" placeholder="Masukan Tanggal Lahir Anda">

        <p style="text-align: start;font-size:12px;">Jenis Kelamin :</p>
        <div class="radioInput">
            <input type="radio" id="jeniskelamin" name="jk" value="Laki-laki" />
            <label for="laki-laki"><span></span>Laki-Laki</label>
            <input type="radio" id="jeniskelamin" name="jk" value="Perempuan" />
            <label for="perempuan"><span></span>Perempuan</label>
        </div>

        <select name="status" id="status">
            <option value=""> -- Status Perkawinan -- </option>
            <option value="Belum Menikah"> Belum Menikah </option>
            <option value="Sudah Menikah"> Sudah Menikah </option>
        </select>
        <select name="wilayah" id="wilayah">
            <option value=""> -- Wilayah -- </option>
            <option value="Tangerang"> Tangerang </option>
            <option value="Jakarta"> Jakarta </option>
            <option value="Bogor"> Bogor </option>
            <option value="Bekasi"> Bekasi </option>
            <option value="Depok"> Depok </option>
        </select>
        <div class="checkBox">
            <input type="checkbox" id="ceklist" name="ceklist" value="true" required />
            <label for="ceklist"><span></span>
                <p>Saya menyatakan data yang saya
                    saya ini benar dan dapat dipertanggung jawabkan, serta menyetujui
                    syarat dan ketentuannya.</p>
            </label>
        </div>
        <button type="button" id="btnSelesai" onclick="addData()" class="btnDaftar">Daftar</button>
        <button type="button" class="btnRegis" onclick="backToLogin()">Back</button>
    </div>

    
