<html lang="en">
<head>
    <title>Invoice</title>
{{--    <link href="https://fonts.googleapis.com/css?family=Hind+Siliguri:300,400&display=swap" rel="stylesheet">--}}
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            font-family: 'Hind Siliguri', 'open sans';
            font-size: 16px;
        }
        .left{
            float: left;
        }
        .right{
            float: right;
        }
        .text-center{
            text-align: center;
        }
        .clear{
            clear: both;
        }
        .header{
            width: 100%;
        }

        .header .header-top{
            width: 100%;
            padding: 40px 0px 30px 20px;
            line-height: 10px;
            text-align: left;
        }
        .header .header-top h2{
            font-weight: 300;
        }

        .header .header-top .contact{
            /*border: 1px solid red;*/
            width: 33%;
            float: left;
        }
        .header .header-top .invoice{
            width: 33%;
            float: left;
            text-align: center;
            padding-top: 10px;
            /*border: 1px solid red;*/
        }
        .header .header-top .barcode{
            width: 33%;
            text-align: right;
            float: left;
            /*border: 1px solid red;*/

        }
        .header .header-top .barcode img{
            margin-right: 20px;
            width: 200px;
            height: 60px;
        }
        .header .invoice-to{
            line-height: 12px;
            padding-top: 30px;
            padding-left: 20px;
        }
        .header .invoice-to h3{
            font-weight: 300px;
        }
        .header .invoice-to span{
            font-weight: bold;
        }
        .invoice-id-date{
            padding-top: 30px;
            padding-right: 20px;
            line-height: 12px;
        }
        .product-details{
            width: 100%;
            padding: 30px 20px;
        }
        .product-details h3{
            margin-bottom: 10px;
        }
        .product-details .product-table{
            width: 100%;
            text-align: center;
            border-collapse: collapse;
        }

        .product-details .product-table th,
        .product-details .product-table td{
            padding: 5px;
            border: 1px solid #f2f2f2;
        }

        .product-details .product-table th:nth-child(1){
            width: 60%;
        }
        .product-details .product-table th:nth-child(2){
            width: 10%;
        }
        .product-details .product-table th:nth-child(3){
            width: 10%;
        }
        .product-details .product-table th:nth-child(2){
            width: 15%;
        }

        .product-details .total-price-table{
            width: 250px;
            position: relative;
            left: 503px;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .product-details .total-price-table th,
        .product-details .total-price-table td{
            padding: 5px;
            text-align: left;
            border: 1px solid #f2f2f2;
        }
        .footer{
            width: 100%;
            position: relative;
            margin-top: 100px;
        }

        .footer .authorized-signeture{
            width: 300px;
            margin-bottom: 20px;
            margin-right: 20px;
            text-align: center;

        }
        .footer .authorized-signeture span{
            display: block;
            width: 300px;
            height: 2px;
            background: #f2f2f2;
        }

        .footer .thank-you{
            text-align: center;
        }
        .footer-bar{
            width: 100%;
            position: absolute;
            bottom: 70px;
            text-align: center;
            border-top: 1px solid #f2f2f2;
        }

        .footer-bar p{
            width: 33%;
            float: left;
        }


    </style>
</head>
<body>
    <header class="header">
        <div class="header-top">

            <div class="contact">
                <h2>Bonajishop</h2>
                <P>+880 1713 615831</P>
                <p>Mohammadpur Dhaka-1207</p>
            </div>
            <div class="invoice">
                <h1>INVOICE</h1>
            </div>
            <div class="barcode">
                <img src="{{ asset('frontend/img/barcode/barcode.png') }}">
            </div>
        </div>
        <div class="invoice-info clear">
            <div class="invoice-to left">
                <h3>Invoice To:</h3>
                <span>{{ $order->name }}</span>
                <p>{{ $order->phone }}</p>
                <p>{{ $order->address }}</p>
            </div>
            <div class="invoice-id-date right">
                <p><b>Invoice ID : #</b> {{ $order->id }}</p>
                <p><b>Payment Method :</b> {{ $order->payment_method }}</p>
                <p><b>Date : </b> {{$order->created_at->format('d-m-Y')}}</p>
            </div>
        </div>

    </header>

    <div class="product-details clear">
        <h3>Product Details</h3>
        <table class="product-table">
            <tr>
                <th>Product Title</th>
                <th>Unit Price</th>
                <th>QTY</th>
                <th>Total Price</th>
            </tr>
                @php $total = 0  @endphp
                @foreach($order->orderDetails as $orderItemDetail)
                    @php $total = $total + $orderItemDetail->product->price * $orderItemDetail->quantity @endphp
                    <tr>
                        <td>{{ $orderItemDetail->product->title }}</td>
                        <td>{{ $orderItemDetail->product->price }}</td>
                        <td>{{ $orderItemDetail->quantity  }}</td>
                        <td>{{ $orderItemDetail->product->price * $orderItemDetail->quantity }}</td>
                    </tr>
                @endforeach
        </table>

        <table class="total-price-table">
{{--            <tr><th colspan="2">Total</th></tr>--}}
            <tr>
                <td width="55%">Total</td>
                <td style="text-align: center;" width="45%">{{ $total }}</td>
            </tr>
            <tr>
                <td>Discount</td>
                <td style="text-align: center;">{{ $total - $order->total_price }}</td>
            </tr>
            <tr>
                <td>Delivery Charge</td>
                <td style="text-align: center;">{{ $order->delivery_charge }}</td>
            </tr>
            <tr>
                <td><b>Amount to pay</b></td>
                <td style="text-align: center;"><b>{{ $order->total_price + $order->delivery_charge }}</b></td>
            </tr>
        </table>
    </div>

    <section class="footer">
        <div class="authorized-signeture right">
            <span></span>
            <p><b>Authorised Sign</b></p>
        </div>
        <div class="thank-you clear">
           Thank You
        </div>
    </section>

    <section class="footer-bar">
        <p>www.bonajishop.com</p>
        <p>+880 1713 615831</p>
        <p>contact@bonajishop.com</p>
    </section>

</body>
</html>
