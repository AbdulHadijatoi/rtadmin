<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Order Details</title>

    <style>

        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }

        table{
            font-size: 11px;
            font-family: DejaVu Sans, sans-serif;
        }

        .float-left{
            float:left;
        }
        
        .float-right{
            float:right;
        }
        .text-right{
            text-align: right;
        }

        .full-width{
            width: 100%;
        }
        .half-width{
            width: 345px;
        }

        .bigger-text{
            font-size: 18px;
            font-weight: bold;
        }

        .text-white{
            color: white;
        }

        .text-bold{
            font-weight: bold;
        }
        
        .text-center{
            text-align: center;
        }
     
    </style>
</head>

<body>

    <table class="full-width">
        <tbody>
            <tr>
                <td class="float-left" style="width: 230px;">
                
                    <img src="https://pacific-adventures.com/logo.png" alt="Main Logo" width="120px" style="display: block; margin-bottom: 20px;">
                </td>
                <td class="float-right" style="width: 230px;"></td>
                <td class="float-right" style="width: 230px;"></td>
            </tr>
            <br>
            <br>
            <tr>
                <td class="float-left" style="width: 230px;">
                    <span>{{ $order->first_name }} {{ $order->last_name }}</span>
                </td>
                <td class="float-right"></td>
                <td class="float-right text-right" style="width: 230px;">
                    <span>Document Date: {{ now()->format('M d, Y') }}<span>
                </td>
            </tr>
            
            <tr>
                <td class="float-left " style="width: 230px;">
                    <span>{{ $order->nationality }}</span>
                </td>
                <td class="float-right"></td>
                <td class="float-right text-right" style="width: 230px;">
                    <span>Booking reference: {{ $order->reference_id }}<span>
                </td>
            </tr>
            
            
            <tr>
                <td class="float-left full-width" style="margin-top: 100px;">
                </td>
                <td class="float-right"></td>
                <td class="float-right"></td>
            </tr>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            
            <tr>
                <td class="float-left text-bold" style="width: 230px; margin-bottom: 10px; font-size: 14px">
                    <span>Proof of Payment</span>
                </td>
                <td class="float-right"></td>
                <td class="float-right"></td>
            </tr>
           <br>
            <tr>
                <td class="float-left text-bold" style="width: 230px;">
                    <span>Booking reference ({{ $order->reference_id }})</span>
                    
                </td>
                <td class="float-right"></td>
                <td class="float-right text-bold text-right" style="width: 230px;">
                    Amount in <span>د.إ</span>
                </td>
            </tr>
            @php
            $total_participants = 0;
            $activity_name = $order->activity_name;
            $booking_date = $order->date;
            @endphp
            @if($order->orderItems)
                @foreach ($order->orderItems as $option)
                    <tr>
                        <td class="float-left" colspan="2" style="width: 230px;">
                            <span>Activity Name: {{ $activity_name }}</span><br>
                            <span>Option Booked: 
                                    @php
                                        $total_participants = $option->infant + $option->child + $option->adult;
                                    @endphp
                                    {{ $option->package_title }}
                            </span><br>
                            <span>Tour date: {{ $booking_date? Carbon\Carbon::parse($booking_date)->format('M d, Y'): '' }}, Participants: {{ $total_participants }}</span>
                        </td>
                        <td class="float-right text-bold text-right" colspan="1" style="width: 230px; vertical-align: top;">{{ number_format($option->total_price, 2) }}</td>
                    </tr>
                @endforeach
            @endif
            

            <tr>
                <td class="float-left full-width" style="width: 230px; border-bottom:1px solid grey;"></td>
                <td class="float-left full-width" style="width: 230px; border-bottom:1px solid grey;"></td>
                <td class="float-left full-width" style="width: 230px; border-bottom:1px solid grey;"></td>
            </tr>
            
            <tr>
                <td class="float-left"></td>
                <td class="float-right"></td>
                <td class="float-right"></td>
            </tr>
            
            <tr>
                <td class="float-left text-bold" style="width: 230px;">
                    <span>Total paid amount</span>
                </td>
                <td class="float-right"></td>
                <td class="float-right text-bold text-right" style="width: 230px;">{{ $order->total_amount }}</td>
            </tr>
            
            <br>
            <br>
            

            <tr>
                <td class="float-left" colspan="3" style="width: 230px;">
                    We have received the payment of {{ $order->total_amount }} <span>إ.د</span>
                </td>
            </tr>
            

            <br>
            <br>
            <br>
            

            <tr>
                <td class="float-left" colspan="2">
                    <span>
                        This is not an invoice for VAT purposes.<br>
                        Please note that this document is proof of payment only.
                    </span>
                </td>
                <td class="float-right"></td>
            </tr>
           

            
            
            
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <tr>
                <td class="float-left text-bold" colspan="3">
                    <span>
                        Pacific Adventures L.L.C
                    </span>
                </td>
            </tr>
            <tr>
                <td class="float-left" colspan="1" style="min-height: 50px;">
                    Port Saeed , Deira<br>
                    Office 714, Makateb Building<br>
                    Dubai U.A.E
                </td>
                <td class="float-left text-center" colspan="1" style="min-height: 50px; border-left: 1px solid black; border-right: 1px solid black;">
                    Phone: +971 58 862 7171<br>
                    booking@pacific-adventures.com<br>
                    www.pacific-adventures.com
                </td>
                <td class="float-left text-right" colspan="1" style="min-height: 50px;">
                    Pacific Adventures L.L.C
                </td>
            </tr>

        </tbody>
    </table>
</body>

</html>
