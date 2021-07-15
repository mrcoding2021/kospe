<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisa Pembiayaan</title>
</head>
<style>
    html {
        font-family: sans-serif;
        line-height: 1.15;
        -webkit-text-size-adjust: 100%;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        color: solid black;
    }

    article,
    aside,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    main,
    nav,
    section {
        display: block;
    }

    body {
        margin: 0;
        font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #858796;
        text-align: left;
        background-color: #fff;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin-top: 0;
        margin-bottom: 0.5rem;
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    .content {
        align-items: center;
    }

    .garis {
        border: 1px solid black;

    }
</style>

<body style="margin: 20px 10px 20px 10px; width:1000px">

    <div style="font-size:12px;">
        <div>
            <h2 class="text-center">Analisa Pembiayaan
                <br>
                <p class="text-center">Koperasi Syariah Pesantren Entreprenuer</p>
            </h2>
        </div>
        <div>
            <table >
                <tr>
                    <td>Nama Lengkap</td>
                    <td><?= $key[0]['nama'] ?></td>
                </tr>
                <tr>
                    <td>No. HP</td>
                    <td><?= $key[0]['no_akad'] ?></td>
                </tr>
                <tr></tr>
            </table>
            <table>
                <tr>
                    <td>
                        <div style="width: 350px; ">
                            <table class="garis">
                                <tr>
                                    <td colspan="2">No </td>
                                    <td colspan="2">Kategori Analisa</td>
                                    <td></td>
                                    <td></td>
                                    <td>Skor</td>
                                </tr>
                                <?php
                                $no = 1;
                                foreach ($key as $k) :
                                    $this->db->where('id_analisa', $k['kategori']);
                                    $kategori = $this->db->get('tb_analisa')->row();
                                ?>
                                    <tr class="garis">
                                        <td><?= $no++ ?></td>
                                        <td> </td>
                                        <td colspan="2"><?= strtoupper($kategori->nama) ?></td>
                                        <td> </td>
                                        <td style="text-align: center"><?= $k['skor'] ?></td>
                                    </tr>
                                <?php endforeach ?>
                                <tr>
                                    <td colspan="3">Total Skor</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?= $total['total'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

    </div>
</body>

</html>