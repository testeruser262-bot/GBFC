<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Payment Receipt</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 25px;
        }

        /* ================= HEADER ================= */
        .header-table {
            width: 100%;
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 10px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #0d6efd;
            text-align: left;
        }

        .notify {
            font-size: 12px;
            color: #777;
            text-align: right;
        }

        .title {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            padding-top: 10px;
        }

        /* ================= DETAILS BOX ================= */
        .box {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 18px;
            margin-top: 20px;
        }

        .box table {
            width: 100%;
        }

        .box td {
            padding: 8px 5px;
        }

        .amount {
            color: #198754;
            font-weight: bold;
            font-size: 16px;
        }

        .status {
            background: #d1e7dd;
            color: #0f5132;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
        }

        /* ================= FOOTER ================= */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            border-top: 1px solid #ddd;
            padding: 10px 25px;
            font-size: 11px;
            color: #888;
        }

        .footer-table {
            width: 100%;
        }
    </style>
</head>

<body>

<div class="container">

    <!-- ================= HEADER ================= -->
    <table class="header-table">

        <!-- ROW 1 -->
        <tr>
            <td class="logo" width="50%">
                GBFC
            </td>

            <td class="notify" width="50%">
                Notify
            </td>
        </tr>

        <!-- ROW 2 -->
        <tr>
            <td colspan="2" class="title">
                PAYMENT DETAIL
            </td>
        </tr>

    </table>

    <!-- ================= DETAILS ================= -->
    <div class="box">

        <table>

            <tr>
                <td><strong>Transaction ID:</strong></td>
                <td>{{ $data->transactionId }}</td>
            </tr>

            <tr>
                <td><strong>Name:</strong></td>
                <td>{{ $data->firstName }} {{ $data->lastName }}</td>
            </tr>

            <tr>
                <td><strong>Email:</strong></td>
                <td>{{ $data->email }}</td>
            </tr>

            <tr>
                <td><strong>Phone:</strong></td>
                <td>{{ $data->phone ?? '-' }}</td>
            </tr>

            <tr>
                <td><strong>Age Group:</strong></td>
                <td>{{ $data->age_group ?? '-' }}</td>
            </tr>

            <tr>
                <td><strong>Amount Paid:</strong></td>
                <td class="amount">${{ $data->netAmount }}</td>
            </tr>

            <tr>
                <td><strong>Status:</strong></td>
                <td>
                    <span class="status">{{ strtoupper($data->status) }}</span>
                </td>
            </tr>

            <tr>
                <td><strong>Date:</strong></td>
                <td>
                    {{ \Carbon\Carbon::parse($data->date)->format('d M Y, h:i A') }}
                </td>
            </tr>

        </table>

    </div>

</div>

<!-- ================= FOOTER ================= -->
<div class="footer">
    <table class="footer-table">
        <tr>
            <td style="text-align:left;">© {{ date('Y') }} GBFC</td>
            <td style="text-align:center;">System generated receipt</td>
            <td style="text-align:right;">No signature required</td>
        </tr>
    </table>
</div>

</body>
</html>