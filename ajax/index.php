<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript" src="js/jquery.js"></script>
</head>

<body>
    <h1>Data Buku</h1>
    <table style="width: 50%">
        <thead>
            <th>No</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
            <th></th>
        </thead>
        <tbody id="barisData" style="width: 50%">

        </tbody>
    </table>
    <h2>Tambah Data</h2>
    <table>
        <tr>
            <td></td>
            <td><input type="text" hidden name="id"></td>
        </tr>
        <tr>
            <td>Judul Buku</td>
            <td><input type="text" name="judul"></td>
        </tr>
        <tr>
            <td>Pengarang</td>
            <td><input type="text" name="pengarang"></td>
        </tr>
        <tr>
            <td>Tahun Terbit</td>
            <td><input type="text" name="tahun_terbit"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button id="tambah" onclick="tambahData()">Tambah Data</button>
                <button id="ubah" onclick="ubahData()">Ubah Data</button>
            </td>
        </tr>

    </table>
    <p id="pesan" style="color: brown"></p>
    <script type="text/javascript">
        onload();
        //function tmbahdata
        function tambahData() {
            var judul = $("[name='judul']").val();
            var pengarang = $("[name='pengarang']").val();
            var tahun_terbit = $("[name='tahun_terbit']").val();

            $.ajax({
                type: "POST",
                data: "judul=" + judul + "&pengarang=" + pengarang + "&tahun_terbit=" + tahun_terbit,
                url: "tambahData.php",
                success: function(result) {
                    //   console.log(result);
                    var objResult = JSON.parse(result);
                    $('#pesan').html(objResult.pesan);
                    onload();
                }
            })
        }

        function ubahData() {
            var id = $("[name='id']").val();
            var judul = $("[name='judul']").val();
            var pengarang = $("[name='pengarang']").val();
            var tahun_terbit = $("[name='tahun_terbit']").val();

            $.ajax({
                type: "POST",
                data: "id=" + id + "&judul=" + judul + "&pengarang=" + pengarang + "&tahun_terbit=" + tahun_terbit,
                url: "ubahData.php",
                success: function(result) {
                    //   console.log(result);
                    var objResult = JSON.parse(result);
                    $('#pesan').html(objResult.pesan);
                    onload();
                }
            })
        }

        function pilihData(idx) {
            // console.log(id);
            var id = idx;

            $.ajax({
                type: "POST",
                url: "ambilId.php",
                data: "id=" + id,
                success: function(result) {
                    // console.log(result);
                    var objResult = JSON.parse(result);
                    $("[name='judul']").val(objResult.judul);
                    $("[name='pengarang']").val(objResult.pengarang);
                    $("[name='tahun_terbit']").val(objResult.tahun_terbit);
                    $('#tambah').hide();
                    $('#ubah').show();
                }
            })
        }
        //untuk load data tiap transaksi dijalankan
        function onload() {
            var dataHandler = $("#barisData");
            dataHandler.html("");
            //function get data
            $.ajax({
                type: "GET",
                data: "",
                url: "ambilData.php",
                success: function(result) {
                    // console.log(result);
                    var objResult = JSON.parse(result);
                    var nomor = 1;
                    $.each(objResult, function(key, val) {
                        var barisBaru = $("<tr>");
                        barisBaru.html(
                            "<td>" + nomor + "</td> <td>" + val.judul + "</td> <td>" + val.pengarang + "</td> <td>" + val.tahun_terbit + "</td><td><button onclick='pilihData(" + val.id + ")'>select</button><button onclick='hapusData(" + val.id + ")'>hapus</button></td>"
                        );
                        // var dataHandler = $("#barisData");
                        dataHandler.append(barisBaru);
                        nomor++;
                        $('#ubah').hide();
                        $('#tambah').show();

                    })
                }
            })
        }

        function hapusData(id) {
            // console.log(id);
            var tanya = confirm('Apakah anda yakin ingin menghapus data ini??');
            if (tanya) {

                $.ajax({
                    type: "POST",
                    url: "hapusData.php",
                    data: "id=" + id,
                    success: function(result) {
                        // console.log(result);
                        onload();
                    }
                })
            }
        }
    </script>

</body>

</html>