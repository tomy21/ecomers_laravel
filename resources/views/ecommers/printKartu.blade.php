<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .kartuMamber {
            position: relative;
            width: 550px;
            height: 300px;
            margin-top: 20px;
            border: 1px solid #5B5B5B;
            border-radius: 20px;
            /* box-shadow: 5px 5px 2px black; */
            background: linear-gradient(to right, #dc3232, #fda92a);
            color: #fff;
        }

        .header-mamber>h6 {
            margin-top: -10px;
            font-size: 16px;
            font-weight: 500;
        }

        .header-mamber {
            padding: 30px;
            font-size: 24px;
            margin-bottom: 5px;
        }

        .footer-mamber {
            position: absolute;
            display: flex;
            padding: 30px;
            gap: 50px;
            bottom: 10px;
        }

        .kartuMamber p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .barcodeImg {
            padding: 0 30px;
            width: 100%;
            font-size: 30px;
        }

        .barcodeLabel {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .qrCodeStyle {
            padding: 20px;

        }

        .btn_print {
            margin-top: 30px;
            width: 39%;
            padding: 30px;
            background-color: #00BD90;
            border: none;
            border-radius: 20px;
            box-shadow: 3px 3px 4px black;
            cursor: pointer;
        }

        @media print {
            body {
                visibility: hidden;
            }

            .kartuMamber {
                visibility: visible;
            }
        }

        @media print {
            @page {
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
                size: 100mm 150mm;
                margin: 0;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100mm;
                height: 150mm;
            }
        }
    </style>
</head>

<body>
    <div class="kartuMamber">
        <div class="barcodeLabel">
            <div class="header-mamber">
                <h2>{{ auth()->user()->name }}</h2>
                <h6>{{ auth()->user()->email }}</h6>
            </div>
            <div class="qrCodeStyle">
                {!! $qr_Code !!}
                {{-- <p>Scan me to return to the original page.</p> --}}
            </div>
        </div>
        <div class="barcodeImg">
            {!! $imgMamber !!}
        </div>

        <div class="footer-mamber">
            <p>Member ID: {{ auth()->user()->id_mamber }}</p>
            <p>Expiration Date:
                {{ $expaired }}
            </p>
        </div>
    </div>

    <script>
        window.print();
    </script>
    {{-- <button class="btn_print">Print Kartu</button> --}}
</body>

</html>
