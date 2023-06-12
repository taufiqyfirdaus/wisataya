@extends('template.frontend.default')
@section('content')
    <main role="main" class="main">
        <section class="main jumbotron mb-0 bg-#124747"style="height: 710px; background-image:none;">
            <div class="container">
                <div class="row" style="margin-top: -62px;">
                    <div class="col-md-12 mt-5 mb-4">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb" style="padding: 20px; background-color: #185d5d;">
                                <li class="breadcrumb-item"><a href="{{route('homepage')}}" 
                                    class="text-decoration-none" style="color: #dcdcdc;">{{config('app.name')}}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('detailContent', [$content->city->province->slug, $content->city->slug,
                                    $content])}}"
                                    class="text-decoration-none" style="color: #dcdcdc;">{{$content->title}}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('showPenginapan', [$content->city->province->slug, $content->city->slug,
                                    $content])}}" style="color: #dcdcdc;">Penginapan</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('detailPenginapan', [$content->city->province->slug, $content->city->slug,
                                    $content, $penginapan])}}" style="color: #dcdcdc;">{{$penginapan->name}}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page" style="color: #bdbdbd;">
                                    Transaction
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <h1 class="judul">Transaction</h1>
            
            <form action="{{ route('store', [$province, $city, $content, $penginapan])}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="inputAddress">Penginapan</label>
                    <input type="text" disabled class="form-control" id="selectpenginapan" name="id_penginapan" value="{{$penginapan->name}}">
                    <select class="form-control" id="selectPenginapan" name="id_penginapan" style="display: none;">
                        <?php foreach ($data['penginapan'] as $key => $value) {
                    ?>
                        <option value="<?= $penginapan->id ?>" harga="<?= $penginapan->harga ?>" ><?= $penginapan->name ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Tanggal Check in</label>
                    <input type="date" class="form-control" id="checkin" name="checkin">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Tanggal Check out</label>
                    <input type="date" class="form-control" id="checkout" name="checkout">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Harga Per Malam</label>
                    <input type="text" disabled class="form-control" id="hargapermalam" value="5000000">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Harga Total</label>
                    <input type="hidden" name="harga" id="harga">
                    <h3 class="text-white" id="totalHarga">50000000</h3>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" required>
                        <label class="form-check-label" for="gridCheck" @required(true)>
                            i have read and agree to the <a>terms and conditions</a> and privacy policy
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Order</button>
            </form>
        </div>
        </section>
    </main>
    <script>
        function commafy(num) {
            var str = num.toString().split('.');
            if (str[0].length >= 5) {
                str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1.');
            }
            if (str[1] && str[1].length >= 5) {
                str[1] = str[1].replace(/(\d{3})/g, '$1 ');
            }
            return str.join('.');
        }

        function setHarga(defdate = null, defdate2 = null) {
            document.getElementById("hargapermalam").value = document.querySelector("#selectPenginapan").options[document
                .querySelector("#selectPenginapan").selectedIndex].getAttribute("harga");
            var date1 = new Date(document.getElementById("checkin").value);
            var date2 = new Date(document.getElementById("checkout").value);
            if (defdate != null, defdate2 != null) {
                date1 = defdate
                date2 = defdate2
            }
            var difference = date2 - date1;
            var days = difference / (24 * 3600 * 1000);
            $('#totalHarga').html("Rp, " + commafy(days * document.getElementById("hargapermalam").value));
            $('#harga').val(days * document.getElementById("hargapermalam").value);
        }
        $('#selectPenginapan').on('change', function() {
            setHarga();
        });
        $('#checkin').on('change', function() {
            setHarga();
        });
        $('#checkout').on('change', function() {
            setHarga();
        });
        $(document).ready(function() {
            const date = new Date()
            const date2 = new Date()
            document.getElementById('checkin').valueAsDate = date;
            date2.setDate(date.getDate() + 1);
            document.getElementById('checkout').valueAsDate = date2;
            setHarga(date, date2);
        });
    </script>
@endsection

@push('styles')

    <head>
        <link href='https://fonts.googleapis.com/css?family=Kaushan Script' rel='stylesheet'>
        <style>
            .main {
                background-color: #124747;
            }

            img {
                max-height: 200px;
            }

            tr {
                font-size: 18px;
            }

            label {
                color: #DFDBCD;
            }

            .text-image {
                font-size: 16px;
                margin-left: 5px;
                margin-top: 175px;
                color: #fff;
                background-color: black;
            }

            .tabel {
                margin-top: 100px;
                margin-bottom: 100px;
                margin-right: 50px;
                margin-left: 50px;
            }

            section {
                background-color: #124747;
            }

            .judul {
                font-family: 'Kaushan Script';
                color: #DFDBCD;
                font-size: 35;
                text-align: center;
            }

            .jumbotron {
                margin-top: 61px;
                padding-top: 50px;
                padding-bottom: 50px;
            }
        </style>
    </head>
@endpush
