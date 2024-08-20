<style>
    .tombol{
        background: #028618;
        padding: 5px 15px;
        text-decoration: none;
        color: white;
        border-radius: 4px;
    }
    .footer{
        text-align:center;padding:25px;background:lightgray;
    }
</style>
<center>
    <h4>{{ $data_email['judul'] }}</h4>
</center>
<p>Hi, {{ $data_email['email'] }} !</p>
<p>{{ $data_email['pesan'] }}</p>
    <center>
        <a class="tombol" href="{{ url('notifikasi') }}">Lihat</a>
    </center>
<p>Terima Kasih</p>
<p>Dinas KPKP</p>
<br>
<div class="footer">
    <p>Email ini adalah layanan yang disediakan oleh Dinas KPKP</p>
    <p>©{{date("Y")}} Dinas KPKP - {{$_SERVER['SERVER_NAME']}}</p>
</div>