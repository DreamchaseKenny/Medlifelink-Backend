@include('layouts.header')

    <h1 class="text-primary"> (Hospital) </h1>

   

    ////////////////////////////////////////////////////////////////////////

<button class="accordion">Get All Doctors</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/hospital/doctors
        <h2>Request</h2>
        <p>
            {
                hospital_id: 3

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



////////////////////////////////////////////////////////////////////////

<button class="accordion">Get All patients</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/hospital/Patients
        <h2>Request</h2>
        <p>
            {
                hospital_id: 3

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


////////////////////////////////////////////////////////////////////////

<button class="accordion">Create patients or doctor</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/hospital/create_user
        <h2>Request</h2>
        <p>
            {
                hospital_id:2
role:doctor
email:ugwumba@gmail.com
password:12345678
fullname:postial doctor
country_code:+234
country:Nigeria
gender:male
address:123 address
specialization:Toot 
phone:098988834
username:ugwumba

            }
        </p>
    </div>

    <div>
        <h2>Response</h2>
        <p>
        [
    {
        "message": "Registeration successful",
        "status": true,
        "token": "8|PT1SDX7rf7xPHCg8iH1dUvJa8yqtcrPLfFTywCdH777764dd",
        "data": {
            "id": 10,
            "user_id": "O9AS45X6",
            "fullname": "postial doctor",
            "balance": 0,
            "email": "ugwumba@gmail.com",
            "username": "ugwumba",
            "phone": "098988834",
            "country_code": "+234",
            "country": "Nigeria",
            "gender": "male",
            "address": "123 address",
            "specialization": "Toot",
            "verification_code": null,
            "email_verified": 0,
            "status": "active",
            "role": "doctor",
            "created_by": "2",
            "rating": "",
            "role_id": "2",
            "email_verified_at": null,
            "weight": "0",
            "height": "0",
            "blood_pressure": "",
            "glucose_level": "",
            "photo": "",
            "created_at": "2024-05-09T16:13:47.000000Z",
            "updated_at": "2024-05-09T16:13:47.000000Z"
        }
    }
]
        </p>
    </div>

</div>



@include('layouts.footer')











