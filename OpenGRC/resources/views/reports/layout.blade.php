<!DOCTYPE html>
<html>
<head>
    <title>Laravel PDF</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <style>

        @page { margin: 100px 50px; }

        .page-break {
            page-break-after: always;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-bottom: 40px;
            page-break-inside: avoid;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .complete, .effective, .applicable{
            background-color: #d4edda;
            color: #155724;
        }

        .noteffective {
            background-color: #f8d7da;
            color: #721c24;
        }

        .partiallyeffective, .inprogress {
            background-color: #fff3cd;
            color: #856404;
        }

        .unknown, .notapplicable, .nottested {
            background-color: #f8d7da;
            color: #721c24;
        }

        #header { position: fixed; left: 0px; top: -75px; right: 0px; height: 35px; text-align: center; }
        #footer { position: fixed; left: 0px; bottom: -50px; right: 0px; height: 35px; }
        #footer .page:after { content: counter(page, numeric); }

    </style>

</head>
<body>

@yield('content')

</body>
</html>
