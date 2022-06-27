<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>

<body>


    <p>Hi {{$name}}</p>
    <p>Your Booking has been succesfully placed</p>
    <br>

    <table style="width: 600px; text-align: right">

        <thead>
            <tr>
                <th>Booked By</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Booked Room</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th>Adult</th>
                <th>Children</th>
            </tr>
        </thead>

        <tbody>
           <tr>
               <td>{{$name}}</td>
               <td>{{$email}}</td>
               <td>{{$phone}}</td>
               <td>{{$address}}</td>
               <td>{{$room_id}}</td>
               <td>{{$checkin_date}}</td>
               <td>{{$checkout_date}}</td>
               <td>{{$total_adults}}</td>
               <td>{{$total_children}}</td>
           </tr>

           <tr>
               <td colspan="3" style="border-top: 1px solid #ccc;"></td>
               <td style="front-size:25px; font-weight: bold">Total Cost:</td>
           </tr>




        </tbody>
        




    </table>

</body>
</html>