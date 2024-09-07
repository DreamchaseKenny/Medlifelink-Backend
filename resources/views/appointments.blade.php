@include('layouts.header')

    <h1 class="text-primary"> (Appointment) </h1>



    
////////////////////////////////////////////////////////////////////////

<button class="accordion">Book Appointment</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/appointment/create
        <h2>Post Request</h2>
          <pre>
        {
            doctor_id:1
patient_id:2
appointment_time:23:32:04
link:https://meetlink.cm/h
title:title
description:desc
appointment_date:2024-09-04
            }

          </pre>
    </div>

    <div>
        <h2>Pst Response</h2>
          <pre>
        
        {
    "message": "Registeration successful",
    "status": true,
    "data": {
        "status": "pending",
        "doctor_id": "1",
        "patient_id": "2",
        "appointment_time": "23:32:04",
        "link": "lllll",
        "title": "title",
        "description": "desc",
        "appointment_date": "2024-09-04",
        "updated_at": "2024-09-04T23:33:02.000000Z",
        "created_at": "2024-09-04T23:33:02.000000Z",
        "id": 4,
        "doctor": {
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
            "rating": "",
            "dob": "",
            "consultation_amount": "0",
            "role_id": "2",
            "email_verified_at": null,
            "weight": "0",
            "height": "0",
            "blood_pressure": "",
            "glucose_level": "",
            "photo": "",
            "created_at": "2024-09-04T23:05:18.000000Z",
            "updated_at": "2024-09-04T23:05:18.000000Z"
        },
        "patient": {
            "id": 2,
            "user_id": "NCLTNJUN",
            "fullname": "",
            "balance": 0,
            "email": "zhinzeu2@gmail.com",
            "username": "zhinzeu2",
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
            "rating": "",
            "dob": "",
            "consultation_amount": "0",
            "role_id": "2",
            "email_verified_at": null,
            "weight": "0",
            "height": "0",
            "blood_pressure": "",
            "glucose_level": "",
            "photo": "",
            "created_at": "2024-09-04T23:05:32.000000Z",
            "updated_at": "2024-09-04T23:05:32.000000Z"
        }
    }
}
          </pre>
    </div>

</div>



////////////////////////////////////////////////////////////////////////

<button class="accordion">List of Appointments</button>
<div class="panel">
    <div>
        http://127.0.0.1:8000/api/appointment/list
        <h2>Pst Request</h2>
          <pre>
            {
            user_id:3
            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
        {
    "message": "appointments successfully fetched",
    "status": true,
    "data": [
        {
            "id": 4,
            "doctor_id": 1,
            "patient_id": 2,
            "appointment_time": "23:32:04.000000",
            "appointment_date": "2024-09-04",
            "title": "title",
            "link": "lllll",
            "type": "",
            "status": "pending",
            "description": "desc",
            "created_at": "2024-09-04T23:33:02.000000Z",
            "updated_at": "2024-09-04T23:33:02.000000Z",
            "doctor": {
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
                "rating": "",
                "dob": "",
                "consultation_amount": "0",
                "role_id": "2",
                "email_verified_at": null,
                "weight": "0",
                "height": "0",
                "blood_pressure": "",
                "glucose_level": "",
                "photo": "",
                "created_at": "2024-09-04T23:05:18.000000Z",
                "updated_at": "2024-09-04T23:05:18.000000Z"
            },
            "patient": {
                "id": 2,
                "user_id": "NCLTNJUN",
                "fullname": "",
                "balance": 0,
                "email": "zhinzeu2@gmail.com",
                "username": "zhinzeu2",
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
                "rating": "",
                "dob": "",
                "consultation_amount": "0",
                "role_id": "2",
                "email_verified_at": null,
                "weight": "0",
                "height": "0",
                "blood_pressure": "",
                "glucose_level": "",
                "photo": "",
                "created_at": "2024-09-04T23:05:32.000000Z",
                "updated_at": "2024-09-04T23:05:32.000000Z"
            }
        },
       
        
    ]
}
          </pre>
    </div>

</div>




////////////////////////////////////////////////////////////////////////

<button class="accordion">Update Appointment status</button>

<div class="panel">
    <div>
        http://127.0.0.1:8000/api/appointment/status
        <h2>Post Request</h2>
          <pre>
            {

            'appointment_id' : 1,
            'action' :  || approve || completed,




            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
            {
            "message": "successfull",
            "status": true,


            }
          </pre>
    </div>
</div>



////////////////////////////////////////////////////////////////////////

<button class="accordion">Canacel Appointment </button>

<div class="panel">
    <div>
        http://127.0.0.1:8000/api/appointment/cancel
        <h2>Post Request</h2>
          <pre>
            {

            'appointment_id' : 1,
            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
            {
            "message": "successfull",
            "status": true,


            }
          </pre>
    </div>
</div>




////////////////////////////////////////////////////////////////////////

<button class="accordion">Update Appointment </button>

<div class="panel">
    <div>
        http://127.0.0.1:8000/api/appointment/Update
        <h2>Post Request</h2>
          <pre>
            {

              
appointment_time:12
appointment_date:1209-02-02
link:https//medlifelink.cm/videchat/34
title:title
description:desc
type:sugrey
appointment_id:2

            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
        {
    "message": "Registeration successful",
    "status": true,
    "data": {
        "id": 2,
        "doctor_id": 1,
        "patient_id": 2,
        "appointment_time": "12",
        "appointment_date": "1209-02-02",
        "price": 0,
        "title": "title",
        "link": "lllll",
        "type": "ewu",
        "status": "pending",
        "description": "desc",
        "created_at": "2024-09-04T23:19:40.000000Z",
        "updated_at": "2024-09-06T23:32:28.000000Z",
        "doctor": {
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
            "rating": "",
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
            "updated_at": "2024-09-04T23:05:18.000000Z"
        },
        "patient": {
            "id": 2,
            "user_id": "NCLTNJUN",
            "fullname": "",
            "balance": 0,
            "email": "zhinzeu2@gmail.com",
            "username": "zhinzeu2",
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
            "rating": "",
            "dob": "",
            "consultation_amount": "0",
            "role_id": "2",
            "email_verified_at": null,
            "weight": "0",
            "height": "0",
            "blood_pressure": "",
            "glucose_level": "",
            "photo": "",
            "created_at": "2024-09-04T23:05:32.000000Z",
            "updated_at": "2024-09-04T23:05:32.000000Z"
        }
    }
}
          </pre>
    </div>
</div>














////////////////////////////////////////////////////////////////////////

<button class="accordion">Reschedule Appointment </button>

<div class="panel">
    <div>
        http://127.0.0.1:8000/api/appointment/reschedule
        <h2>Post Request</h2>
          <pre>
            {

              
appointment_time:12
appointment_date:1209-02-02
link:https//medlifelink.cm/videchat/34
title:title
description:desc
type:sugrey
appointment_id:2

            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
        {
    "message": "Registeration successful",
    "status": true,
    "data": {
        "id": 2,
        "doctor_id": 1,
        "patient_id": 2,
        "appointment_time": "12",
        "appointment_date": "1209-02-02",
        "price": 0,
        "title": "title",
        "link": "lllll",
        "type": "ewu",
        "status": "pending",
        "description": "desc",
        "created_at": "2024-09-04T23:19:40.000000Z",
        "updated_at": "2024-09-06T23:32:28.000000Z",
        "doctor": {
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
            "rating": "",
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
            "updated_at": "2024-09-04T23:05:18.000000Z"
        },
        "patient": {
            "id": 2,
            "user_id": "NCLTNJUN",
            "fullname": "",
            "balance": 0,
            "email": "zhinzeu2@gmail.com",
            "username": "zhinzeu2",
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
            "rating": "",
            "dob": "",
            "consultation_amount": "0",
            "role_id": "2",
            "email_verified_at": null,
            "weight": "0",
            "height": "0",
            "blood_pressure": "",
            "glucose_level": "",
            "photo": "",
            "created_at": "2024-09-04T23:05:32.000000Z",
            "updated_at": "2024-09-04T23:05:32.000000Z"
        }
    }
}
          </pre>
    </div>
</div>




////////////////////////////////////////////////////////////////////////











////////////////////////////////////////////////////////////////////////

<button class="accordion">Delete Appointment </button>

<div class="panel">
    <div>
        http://127.0.0.1:8000/api/appointment/delete
        <h2>Post Request</h2>
          <pre>
            {

            'appointment_id' : 1,





            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
            {
            "message": "successfull",
            "status": true,


            }
          </pre>
    </div>




</div>


////////////////////////////////////////////////////////////////////////


    
@include('layouts.footer')