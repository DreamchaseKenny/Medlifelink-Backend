@include('layouts.header')

    <h1 class="text-primary"> (Rating EndpoinT) </h1>

   

    ////////////////////////////////////////////////////////////////////////

<button class="accordion">List of user Ratings</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/ratings
        <h2>POST Request</h2>
       <pre>
            {
                user_id : 1,
               

            }
       </pre>
    </div>

    <div>
        <h2>Response</h2>
       <pre>
       
    {
        "message": "Rating successfully fetched",
        "status": true,
        "data": [
            {
                "id": 9,
                "rater": 3,
                "ratee": 1,
                "feedback": "",
                "overall_satisfaction": 2,
                "communication": 3,
                "knowledge": 2,
                "bedside_manner": 1,
                "appointment_cancellation": 0,
                "no_show": 0,
                "waiting_time": 0,
                "adherence_to_treatment": 0,
                "average": 2.2,
                "created_at": "2024-09-07T17:40:34.000000Z",
                "updated_at": "2024-09-07T17:40:34.000000Z",
                "ratee_details": {
                    "id": 1,
                    "user_id": "FIU3WWVU",
                    "fullname": "",
                    "balance": 0,
                    "email": "zhinzeu@gmail.com",
                    "username": "zhinzeu",
                    "phone": "",
                    "country_code": "",
                    "country": "",
                    "gender": "",
                    "address": "",
                    "specialization": "",
                    "verification_code": null,
                    "email_verified": 0,
                    "status": "active",
                    "role": "doctor",
                    "created_by": "",
                    "rating": "2.2",
                    "dob": "",
                    "consultation_amount": "50",
                    "role_id": "2",
                    "email_verified_at": null,
                    "weight": "0",
                    "height": "0",
                    "blood_pressure": "",
                    "glucose_level": "",
                    "photo": "",
                    "created_at": "2024-09-04T23:05:18.000000Z",
                    "updated_at": "2024-09-07T17:40:35.000000Z"
                },
                "rater_details": {
                    "id": 3,
                    "user_id": "3Z5BDIKX",
                    "fullname": "",
                    "balance": 550,
                    "email": "zhinzeu3@gmail.com",
                    "username": "zhinzeu3",
                    "phone": "",
                    "country_code": "",
                    "country": "",
                    "gender": "",
                    "address": "",
                    "specialization": "",
                    "verification_code": null,
                    "email_verified": 0,
                    "status": "active",
                    "role": "patient",
                    "created_by": "",
                    "rating": "3.7",
                    "dob": "",
                    "consultation_amount": "100",
                    "role_id": "1",
                    "email_verified_at": null,
                    "weight": "0",
                    "height": "0",
                    "blood_pressure": "",
                    "glucose_level": "",
                    "photo": "",
                    "created_at": "2024-09-04T23:05:57.000000Z",
                    "updated_at": "2024-09-07T17:35:12.000000Z"
                }
            }
        ]
    }

       </pre>
    </div>

</div>


////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////

<button class="accordion">Rate a Doctor</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/rate/doctor
        <h2>POST Request</h2>
       <pre>
            {
rater:2
ratee:3
overall_satisfaction:2
communication:3
knowledge:2
bedside_manner:1
               

            }
       </pre>
    </div>

    <div>
        <h2>Response</h2>
       <pre>
       {
    "message": "Rating successfull",
    "status": false,
    "data": {
        "rater": "2",
        "ratee": "3",
        "overall_satisfaction": "2",
        "communication": "3",
        "knowledge": "2",
        "bedside_manner": "1",
        "updated_at": "2024-09-07T18:37:15.000000Z",
        "created_at": "2024-09-07T18:37:15.000000Z",
        "id": 10,
        "average": 2.2
    }
}
       </pre>
    </div>

</div>


////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////

<button class="accordion">Rate a Patient</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/rate/patient
        <h2>POST Request</h2>
       <pre>
            {
                rater:2
ratee:4
appointment_cancellation:2
no_show:3
waiting_time:2
adherence_to_treatment:1
               

            }
       </pre>
    </div>

    <div>
        <h2>Response</h2>
       <pre>
       {
    "message": "Rating successfull",
    "status": false,
    "data": {
        "rater": "2",
        "ratee": "4",
        "appointment_cancellation": "2",
        "no_show": "3",
        "waiting_time": "2",
        "adherence_to_treatment": "1",
        "updated_at": "2024-09-07T18:40:56.000000Z",
        "created_at": "2024-09-07T18:40:56.000000Z",
        "id": 11,
        "average": 2
    }
}
       </pre>
    </div>

</div>


////////////////////////////////////////////////////////////////////////




@include('layouts.footer')











