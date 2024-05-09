@include('layouts.header')

    <h1 class="text-primary"> (Admin) </h1>

   

    ////////////////////////////////////////////////////////////////////////

<button class="accordion">Get All users</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/admin/users
        <h2>Request</h2>
        <p>
            {
                role: patient or doctor or hospital

            }
        </p>
    </div>

    <div>
        <h2>Response</h2>
        <p>
        [
            {
        "message": "User fetch successful",
        "status": true,
        "data": [
            {
                "id": 1,
                "user_id": "7PGSISJ4",
                "fullname": "",
                "balance": 0,
                "email": "mark@gmail.com",
                "username": "markobi",
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
                "rating": "",
                "role_id": "1",
                "email_verified_at": null,
                "weight": "0",
                "height": "0",
                "blood_pressure": "",
                "glucose_level": "",
                "photo": "",
                "created_at": "2024-05-09T15:01:59.000000Z",
                "updated_at": "2024-05-09T15:01:59.000000Z"
            }
        ]
    }
]
        </p>
    </div>

</div>


@include('layouts.footer')









