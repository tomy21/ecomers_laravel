@extends('ecommers.Layout.index')

@section('content')
    <style>
        @media print {
            body {
                visibility: hidden;
            }

            .kartuMamber {
                visibility: visible;
            }
        }

        @media print {
            header {
                display: none;
            }

            /* Menghilangkan footer */
            footer {
                display: none;
            }

            @page {
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
    <a href="{{ 'printKartu' }}" target="_blank" class="btn_print">Print Kartu</a>
@endsection
