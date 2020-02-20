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
    <table style="width: 80%">
        <thead>
            <th>No</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
        </thead>
        <tbody id="barisData">

        </tbody>
    </table>

    <script type="text/javascript">
        $.ajax({
            type: "GET",
            data: "",
            url: "ambilData.php",
            success: function(result) {
                // console.log(result);
                var objResult = JSON.parse(result);
                $.each(objResult, function(key, val) {
                    var barisBaru = $("<tr>");
                    barisBaru.html(
                        "<td>" + val.id + "</td> <td>" + val.judul + "</td> <td>" + val.pengarang + "</td> <td>" + val.tahun_terbit + "</td>"
                    );
                    var dataHandler = $("#barisData");
                    dataHandler.append(barisBaru);
                })
            }
        })
    </script>

</body>

</html>