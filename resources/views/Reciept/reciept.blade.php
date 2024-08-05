<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }

        .container {
            /* background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex; /* Make the container a flexbox */
            justify-content: space-between; /* Distribute items along the main axis */
            align-items: center; /
        }

        header {
            /* display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            width: 100%; Ensure header takes full width */
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            align-items: center; /* Ensure header takes full width */

        }
        .header-left {
            display: flex;
            align-items: center; /* Center items vertically */
        }

        .header-left img.logo {
            height: 60px;
            margin-right: 10px;
        }

        .header-right {
            /* text-align: right; */
            text-align: right;
            flex-grow: 1;
        }

        .header-right h1 {
            margin-bottom: 5px;
        }

        .employee-details {
            margin-bottom: 20px;
        }

        .employee-details h2 {
            margin-bottom: 10px;
            border-bottom: 2px solid #333;
            display: inline-block;
            padding-bottom: 5px;
        }

        .salary-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .salary-table th,
        .salary-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .salary-table th {
            background-color: #f8f8f8;
            font-weight: bold;
        }

        .salary-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        footer {
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <div class="header-left">
                {{-- <img src="{{ asset('../../../assets/images/logo.png') }}" alt="Company Logo" class="logo"> --}}
                <img src="{{ public_path('assets/images/logo3.png') }}"
                width="250" height="100">
            </div>
            <span>
            <div class="header-right" >
                <h1>Blue Berry</h1>
                <p>Nittambuwa Road</p>
                <p>Aththanagalla</p>
                <p>Email: sanujaushan1115@gmail.com</p>
            </div>
            </span>
        </header>
        @php
            use Carbon\Carbon;
        @endphp
        <section class="employee-details">
            <h2>Employee Salary Pay Sheet</h2>
            <p><strong>Employee Name:</strong>
                {{ $paymentData->employee->first_name }}&nbsp;{{ $paymentData->employee->middle_name }}&nbsp;{{ $paymentData->employee->last_name }}
            </p>
            <p><strong>Employee NIC:</strong> {{ $paymentData->employee->nic }}</p>
            {{-- <p><strong>Designation:</strong> Software Engineer</p> --}}
            <p><strong>Section:</strong>{{ \App\Enums\SectionTypeEnum::from($paymentData->employee->section->section)->toString() }}
            </p>
            <p><strong>Pay Period:</strong>{{ Carbon::parse($paymentData->pay_date)->toDateString() }}</p>
        </section>

        <table class="salary-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Basic Salary</td>
                    <td>{{ $paymentData->basic_salary ?? '0.00' }}&nbsp;(LKR)</td>
                </tr>
                <tr>
                    <td>Deduction Amounts</td>
                    <td>-&nbsp;{{ $paymentData->deduction_amount ?? '0.00' }}&nbsp;(LKR)</td>
                </tr>
                <tr>
                    <td>EPF</td>
                    <td>-&nbsp;{{ $paymentData->epf ?? '0.00' }}&nbsp;(LKR)</td>
                </tr>
                <tr>
                    <td>Bonus Payment</td>
                    <td>+&nbsp;{{ $paymentData->bonus_amount ?? '0.00' }}&nbsp;(LKR)</td>
                </tr>
                <tr>
                    <td>OT Payment</td>
                    <td>+&nbsp;{{ $paymentData->ot_amount ?? '0.00' }}&nbsp;(LKR)</td>
                </tr>
                <tr>
                    <td>Net Salary</td>
                    <td>{{ $paymentData->pay_amount ?? '0.00' }}&nbsp;(LKR)</td>
                </tr>
            </tbody>
        </table>

        <footer>
            <p>Generated on: {{ date('Y-m-d') }}</p>
        </footer>
    </div>
</body>

</html>
