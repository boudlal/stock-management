<body>
<header>
    <title>Test</title>
    {!! Html::style('../admin/assets/css/bootstrap.min.css') !!}
    <style type="text/css" media="print">
        @page
        {
            size:  auto;   /* auto is the initial value */
            margin: 0mm;  /* this affects the margin in the printer settings */
        }

        html
        {
            background-color: #FFFFFF;
            margin: 0px;  /* this affects the margin on the html before sending to printer */
        }

        body
        {
            border: solid 1px  ;
            margin: 10mm 15mm 10mm 15mm; /* margin you want for the content */
        }
    </style>
</header>

<body onload="window.print()">
<div class="content" style="background-color: white; width: 70%; margin: auto">

    <section class="invoice" style="margin: 20px">
        <!-- title row -->

                <h2 class="page-header" style="text-align: center">
                    <i class="fa fa-globe"></i> société XYZ
                </h2>

        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <address>
                    <strong>Société XYZ</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@gmail.com
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">

            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col pull-right">
                <br>
                <b>commande N:</b> {{ $order->id }}<br>
                <b>Paiement dû:</b> {{ date_format($order->created_at, "d/m/y")  }}<br>
                <b>client:</b> {{ clients()[$order->client_id] }}
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="clearfix">
            <br>
        </div>
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped" style="">
                    <thead>
                    <tr style="height: 30px;">
                        <th>##</th>
                        <th>quantité</th>
                        <th>produit</th>
                        <th>prix unitaire</th>
                        <th>total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($details as $detail)
                        <tr style="height: 5px">
                            <th>{{ $detail->orders_id}}</th>
                            <td style="">{{ $detail->quantity }}</td>
                            <td>{{ goods()[$detail->stock_id] }}</td>
                            <td>{{ $detail->amount / $detail->quantity }} DH</td>
                            <td>{{ $detail->amount }} DH</td>
                        </tr>

                    @endforeach
                    </tbody>
                    <tfoot>
                    <th>Total</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>{{ $order->total }} DH</th>
                    </tfoot>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="clearfix">
            <br>
            <br>
        </div>
        <div class="row">
            <!-- accepted payments column -->

            <!-- /.col -->
            <div class="col-xs-6" style="margin-left: 33%">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Montant Brut:</th>
                            <td>$250.30</td>
                        </tr>
                        <tr>
                            <th>TVA (9.3%)</th>
                            <td>$10.34</td>
                        </tr>
                        <tr>
                            <th>Montant à payer:</th>
                            <td>$265.24</td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <br>
        <br>

        <div class="pull-right" style="margin-right: 20px">
            <small>Merci pour votre confiance</small>
        </div>
        <br>
        <br>


    </section>

</div>




</body>

</html>