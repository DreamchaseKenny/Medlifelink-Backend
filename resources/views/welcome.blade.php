@include('layouts.header')

<h1 class="text-primary"> (General) </h1>

    <button class="accordion">Register</button>
    <div class="panel">
        <div>
            http://127.0.0.1:8000/api/create_user
            <h2>Request</h2>
            <p>
                {
                email:mark@gmail.com
                user_type:patient
                username:mark
                password:123456
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
                "token": "4|x3riNnhu7uiBywZbtjfexxIFuIUyhaQVBhnpxBSC85399bfa",
                "data": {
                "id": 2,
                "user_id": "GACOGXOO",
                "fullname": "",
                "email": "mark@gmail.com",
                "username": "mark",
                "phone": "",
                "country_code": "",
                "country": "",
                "gender": "",
                "address": "",
                "verification_code": null,
                "email_verified": 0,
                "status": "active",
                "user_type": "patient",
                "user_type_int": "1",
                "email_verified_at": null,
                "created_at": "2024-04-17T15:59:23.000000Z",
                "updated_at": "2024-04-17T15:59:23.000000Z"
                }
                }
                ]
            </p>
        </div>

    </div>

   ////////////////////////////////////////////////////////////////////////

    <button class="accordion">Login</button>
    <div class="panel">
        <div>
        http://127.0.0.1:8000/api/login_user
            <h2>Request</h2>
            <p>
                {
                email:mark@gmail.com
                password:123456
                }
            </p>
        </div>

        <div>
            <h2>Response</h2>
            <p>
                [
                {
                "message": "Login successful",
                "status": true,
                "token": "4|x3riNnhu7uiBywZbtjfexxIFuIUyhaQVBhnpxBSC85399bfa",
                "data": {
                "id": 2,
                "user_id": "GACOGXOO",
                "fullname": "",
                "email": "mark@gmail.com",
                "username": "mark",
                "phone": "",
                "country_code": "",
                "country": "",
                "gender": "",
                "address": "",
                "verification_code": null,
                "email_verified": 0,
                "status": "active",
                "user_type": "patient",
                "user_type_int": "1",
                "email_verified_at": null,
                "created_at": "2024-04-17T15:59:23.000000Z",
                "updated_at": "2024-04-17T15:59:23.000000Z"
                }
                }
                ]
            </p>
        </div>

    </div>

    ////////////////////////////////////////////////////////////////////////

    <button class="accordion">Book Appointment</button>
    <div class="panel">
        <div>
        http://127.0.0.1:8000/api/create_appointment
            <h2>Request</h2>
            <p>
                {
                    booked_by:3
booked_with:4
appointment_time:2014-08-12 11:14:54
title:meeting
description:for medicaion
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
        "data": {
            "booked_by": "3",
            "booked_with": "4",
            "appointment_time": "2014-08-12 11:14:54",
            "title": "2014-08-12 11:14:54am",
            "description": "ssssss",
            "status": "active",

            "updated_at": "2024-04-18T10:05:16.000000Z",
            "created_at": "2024-04-18T10:05:16.000000Z",
            "id": 1
        }
    }
]
            </p>
        </div>

    </div>

    ////////////////////////////////////////////////////////////////////////

<button class="accordion">List of Appointments</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/list_appointments
        <h2>Request</h2>
        <p>
            {
                user_id:3
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
    "data": [ {
        "booked_by": "3",
        "booked_with": "4",
        "appointment_time": "2014-08-12 11:14:54",
        "title": "2014-08-12 11:14:54am",
        "description": "ssssss",
        "status": "active",

        "updated_at": "2024-04-18T10:05:16.000000Z",
        "created_at": "2024-04-18T10:05:16.000000Z",
        "id": 1
    }
    ]
}
]
        </p>
    </div>

</div>

    ////////////////////////////////////////////////////////////////////////

    ////////////////////////////////////////////////////////////////////////

<button class="accordion">Prescribe Medication</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/create_prescription
        <h2>Request</h2>
        <p>
            {
                user_id:3
prescribed_by:4
medicine_name:meeting
dosage:for medicaion
frequency:2x a day
start_date:2014-08-12 11:14:54
note:sleep well
            }
        </p>
    </div>

    <div>
        <h2>Response</h2>
        <p>
        [
    {
        "message": "medicaion prescription successful",
        "status": true,
        "data": {
            "user_id": "3",
            "prescribed_by": "4",
            "medicine_name": "meeting",
            "dosage": "for medicaion",
            "frequency": "2x a day",
            "start_date": "2014-08-12 11:14:54",
            "note": "sleep well",
            "updated_at": "2024-04-18T11:14:57.000000Z",
            "created_at": "2024-04-18T11:14:57.000000Z",
            "id": 1
        }
    }
]

        </p>
    </div>

</div>

////////////////////////////////////////////////////////////////////////

<button class="accordion">List of Medication</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/list_medications
        <h2>Request</h2>
        <p>
            {
                user_id:3

            }
        </p>
    </div>

    <div>
        <h2>Response</h2>
        <p>
        [
    
        {
        "message": "medicaions successfully fetched",
        "status": true,
        "data": [ {
            "user_id": "3",
            "prescribed_by": "4",
            "medicine_name": "meeting",
            "dosage": "for medicaion",
            "frequency": "2x a day",
            "start_date": "2014-08-12 11:14:54",
            "note": "sleep well",
            "updated_at": "2024-04-18T11:14:57.000000Z",
            "created_at": "2024-04-18T11:14:57.000000Z",
            "id": 1
        },
        {
            "user_id": "3",
            "prescribed_by": "4",
            "medicine_name": "meeting",
            "dosage": "for medicaion",
            "frequency": "2x a day",
            "start_date": "2014-08-12 11:14:54",
            "note": "sleep well",
            "updated_at": "2024-04-18T11:14:57.000000Z",
            "created_at": "2024-04-18T11:14:57.000000Z",
            "id": 1
        }
        ]
    }
]
        </p>
    </div>

</div>


////////////////////////////////////////////////////////////////////////

<button class="accordion">get user by ID</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/get_user
        <h2>Request</h2>
        <p>
            {
                user_id:8

            }
        </p>
    </div>

    <div>
        <h2>Response</h2>
        <p>
        [
    {
        "message": " successful",
        "status": true,
        "data": {
            "id": 8,
            "user_id": "OMKLPY0I",
            "fullname": "postial doctor",
            "balance": 0,
            "email": "doctor12300@gmail.com",
            "username": "ogaobi11390",
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
            "created_by": "",
            "rating": "",
            "role_id": "2",
            "email_verified_at": null,
            "weight": "0",
            "height": "0",
            "blood_pressure": "",
            "glucose_level": "",
            "photo": "",
            "created_at": "2024-05-09T16:11:54.000000Z",
            "updated_at": "2024-05-09T16:11:54.000000Z"
        }
    }
]
        </p>
    </div>

</div>


////////////////////////////////////////////////////////////////////////
    










@include('layouts.footer')