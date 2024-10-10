@include('layouts.header')

    <h1 class="text-primary"> (PLAN SUBSCRIPTION EndpoinT) </h1>

   

    ////////////////////////////////////////////////////////////////////////

<button class="accordion">Plan List</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/plan/all
        <h2>GET Request</h2>
       
    </div>

    <div>
        <h2>Response</h2>
       <pre>
       {
    "message": "successfull",
    "status": true,
    "data": [
        {
            "id": 1,
            "name": "Baic",
            "amount": 2500,
            "total_bookings": 3,
            "duration": 30,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 2,
            "name": "Special",
            "amount": 10000,
            "total_bookings": 8,
            "duration": 30,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 3,
            "name": "Family Plan",
            "amount": 56000,
            "total_bookings": 39,
            "duration": 30,
            "created_at": null,
            "updated_at": null
        }
    ]
}
       </pre>
    </div>

</div>


////////////////////////////////////////////////////////////////////////

<button class="accordion">Subscribe to a plan</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/plan/subscribe
        <h2>POST Request</h2>
        <pre>
            {
                user_id :2,
                plan_id:1

            }
       </pre>
    </div>

    <div>
        <h2>Response</h2>
       <pre>
       {
    "message": "Subscription Successfully",
    "status": true
}
       </pre>
    </div>

</div>


////////////////////////////////////////////////////////////////////////

<button class="accordion">Get all plan subscriber</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/plan/subscribers
        <h2>POST Request</h2>
       <pre>
            {
                user_id : 1,
                "status": all || active || completed"

            }
       </pre>
    </div>

    <div>
        <h2>Response</h2>
       <pre>
       {
    "message": " success ",
    "status": true,
    "data": [
        {
            "id": 1,
            "user_id": 4,
            "plan_id": 1,
            "amount": 2500,
            "appointments_booked": 0,
            "total_appointments": 3,
            "num_days": 0,
            "duration": 30,
            "status": "active",
            "created_at": "2024-09-15T13:05:38.000000Z",
            "updated_at": "2024-09-15T13:05:38.000000Z"
        },
        
    ]
}
       </pre>
    </div>

</div>




////////////////////////////////////////////////////////////////////////








@include('layouts.footer')











