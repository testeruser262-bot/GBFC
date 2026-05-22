<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Invoice Details</title>

<style>

@page {
    margin: 100px 0 70px 0;
}

html, body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    font-size: 14px;
    color: #333;
}

/* ================= HEADER ================= */
.header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 80px;
    background: #002d72;
    color: #fff;
    padding: 25px 30px;
}

.header-table {
    width: 100%;
    color: #fff;
}

.logo {
    font-size: 45px;
    font-weight: bold;
}

.right-text {
    text-align: right;
    font-size: 12px;
}

/* ================= CONTENT ================= */
.content {
    padding-top: 120px;
    padding-bottom: 80px;
    text-align: center;
}

/* ================= TITLE ================= */
.title {
    text-align: center;
    font-size: 25px;
    font-weight: bold;
    margin-bottom: 20px;
}

/* ================= BOX ================= */
.box {
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    background: #fff;
    width: 650px;
    margin: 0 auto;
    text-align: left;
}

.box table {
    width: 100%;
    border-collapse: collapse;
}

.box td {
    padding: 8px 6px;
}

.box td:first-child {
    font-weight: bold;
    width: 180px;
}

/* ================= STATUS ================= */
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
    height: 50px;
    border-top: 1px solid #ddd;
    padding: 10px 30px;
    color: #777;
    background: #fff;
}

/* ================= FOOTER TABLE ================= */
.footer table {
    width: 100%;
}

</style>

</head>

<body>

<!-- ================= HEADER ================= -->
<div class="header">
    <table class="header-table">
        <tr>
            <td class="logo">GBFC</td>
            <td class="right-text">
                Invoice Details<br>
                {{ date('Y-m-d H:i') }}
            </td>
        </tr>
    </table>
</div>

<!-- ================= CONTENT ================= -->
<div class="content">
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <h2 class="title">PAYMENT INVOICE</h2>
 <br/>
    <div class="box">

        <table>

            <tr>
                <td>Transaction ID:</td>
                <td>{{ $data->transactionId }}</td>
            </tr>

            <tr>
                <td>Name:</td>
                <td>{{ $data->firstName }} {{ $data->lastName }}</td>
            </tr>

            <tr>
                <td>Email:</td>
                <td>{{ $data->email }}</td>
            </tr>

            <tr>
                <td>Phone:</td>
                <td>{{ $data->phone ?? '-' }}</td>
            </tr>

            <tr>
                <td>Age Group:</td>
                <td>{{ $data->age_group ?? '-' }}</td>
            </tr>

            <tr>
                <td>Amount Paid:</td>
                <td class="amount">${{ $data->netAmount }}</td>
            </tr>

            <tr>
                <td>Status:</td>
                <td>
                    <span class="status">{{ strtoupper($data->status) }}</span>
                </td>
            </tr>

            <tr>
                <td>Date:</td>
                <td>
                    {{ \Carbon\Carbon::parse($data->date)->format('d M Y, h:i A') }}
                </td>
            </tr>

        </table>

    </div>

</div>

<!-- ================= FOOTER ================= -->
<div class="footer">
    <table width="100%">
        <tr>
            <td style="text-align:left; font-size:12px; color:#666;">
                GBFC • Billing System
            </td>

            <td style="text-align:center; font-size:12px; color:#666;">
                Invoice generated automatically
            </td>

            <td style="text-align:right; font-size:12px; color:#666;">
                Page generated on {{ date('d M Y') }}
            </td>
        </tr>
    </table>
</div>

</body>
</html>