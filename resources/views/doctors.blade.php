@include('layouts.header')

<h1 class="text-primary"> (Doctors) </h1>



////////////////////////////////////////////////////////////////////////

<button class="accordion">Prescribe Medication</button>
<div class="panel">
    <div>
        http://127.0.0.1:8000/api/medication/create
        <h2>Request</h2>
          <pre>
            {
            user_id:3
            prescribed_by:4
            medicine_name:meeting
            dosage:for medicaion
            frequency:2x a day
            start_date:2014-08-12 11:14:54
            note:sleep well
            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
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
          </pre>
    </div>

</div>



////////////////////////////////////////////////////////////////////////

<button class="accordion">Get doctors patients</button>
<div class="panel">
    <div>
        http://127.0.0.1:8000/api/doctor/patients
        <h2>Request</h2>
          <pre>
            {
            doctor_id:8

            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
            [
            {
            "message": "Patients successfully fetched",
            "status": true,
            "data": [
            {
            "id": 11,
            "user_id": "FZ2IEX7M",
            "fullname": "postial doctor",
            "balance": 0,
            "email": "ugwumba1@gmail.com",
            "username": "ugwumba1",
            "phone": "098988834",
            "country_code": "+234",
            "country": "Nigeria",
            "gender": "male",
            "address": "123 address",
            "specialization": "Toot",
            "verification_code": null,
            "email_verified": 0,
            "status": "active",
            "role": "patient",
            "created_by": "8",
            "rating": "",
            "role_id": "1",
            "email_verified_at": null,
            "weight": "0",
            "height": "0",
            "blood_pressure": "",
            "glucose_level": "",
            "photo": "",
            "created_at": "2024-05-09T16:24:22.000000Z",
            "updated_at": "2024-05-09T16:24:22.000000Z"
            }
            ]
            }
            ]
          </pre>
    </div>

</div>


////////////////////////////////////////////////////////////////////////

<button class="accordion">Doctor Create patients </button>
<div class="panel">
    <div>
        http://127.0.0.1:8000/api/doctor/create_patient
        <h2>Request</h2>
          <pre>

        <pre>

            {
doctor_id:8
role:patient
email:ugwumba@gmail.com
password:12345678
fullname:postial doctor
country_code:+234
country:Nigeria
gender:male
address:123 address
phone:098988834
username:ugwumba
allergies:[ugwumba,anyher],
"family_history":"",
"social_history":"",
"sogical_history":"",
"photo":"",

            }
       
        <pre>
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
        [
    {
        "message": "Registeration successful",
        "status": true,
        "token": "9|tZXInbLwnAQMLjE3x7Lfa67P9n9BskkBDWuI1Plo5aa48cd9",
        "data": {
            "id": 11,
            "user_id": "FZ2IEX7M",
            "fullname": "postial doctor",
            "balance": 0,
            "email": "ugwumba1@gmail.com",
            "username": "ugwumba1",
            "phone": "098988834",
            "country_code": "+234",
            "country": "Nigeria",
            "gender": "male",
            "address": "123 address",
            "specialization": "Toot",
            "verification_code": null,
            "email_verified": 0,
            "status": "active",
            "role": "patient",
            "created_by": "8",
            "rating": "",
            "role_id": "1",
            "email_verified_at": null,
            "weight": "0",
            "height": "0",
            "blood_pressure": "",
            "glucose_level": "",
            "photo": "",
            "created_at": "2024-05-09T16:24:22.000000Z",
            "updated_at": "2024-05-09T16:24:22.000000Z"
        }
    }
]
          </pre>
    </div>

</div>


////////////////////////////////////////////////////////////////////////

<button class="accordion">List of Doctors </button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/doctors
        <h2>Post Request</h2>
          <pre>
            {
                user_id:1

            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
        
    {
        "message": "Doctors  successful fetched",
        "status": true,
        
        "data":[ 
            {
            "id": 11,
            "user_id": "FZ2IEX7M",
            "fullname": "postial doctor",
            "balance": 0,
            "email": "ugwumba1@gmail.com",
            "username": "ugwumba1",
            "phone": "098988834",
            "country_code": "+234",
            "country": "Nigeria",
            "gender": "male",
            "address": "123 address",
            "specialization": "Toot",
            "verification_code": null,
            "email_verified": 0,
            "status": "active",
            "role": "patient",
            "created_by": "8",
            "rating": "",
            "role_id": "1",
            "email_verified_at": null,
            "weight": "0",
            "height": "0",
            "blood_pressure": "",
            "glucose_level": "",
            "photo": "",
            "created_at": "2024-05-09T16:24:22.000000Z",
            "updated_at": "2024-05-09T16:24:22.000000Z"
        }

        ]
    }

          </pre>
    </div>

</div>





////////////////////////////////////////////////////////////////////////

<button class="accordion"> Doctors Withdrawal</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/doctors/withdraw
        <h2>Post Request</h2>
          <pre>
            {
                user_id:2
acc_number:7878877878
acc_name:Mark doctore
bank_name:First bank

            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
        
        {
    "message": "success",
    "status": true,
    "data": {
        "amount": "7000",
        "user_id": "2",
        "reference": "none",
        "gateway": "bank transfer",
        "description": "withdrawal",
        "credited_to": "2",
        "type": "debit",
        "status": "pending",
        "title": "withdrawal",
        "old_balance": 14600,
        "new_balance": 7600,
        "updated_at": "2024-07-31T22:49:05.000000Z",
        "created_at": "2024-07-31T22:49:05.000000Z",
        "id": 8
    }
}

          </pre>
    </div>

</div>



////////////////////////////////////////////////////////////////////////

<button class="accordion">Activate Doctor</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/doctors/activate
        <h2>Post Request</h2>
          <pre>
            {
                user_id:2
                amount:7000
reference:HJUYUHHHJJ787
gateway:paystack

            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
        
        {
    "message": "success",
    "status": true,
    "data": {
        "amount": "7000",
        "user_id": "2",
        "reference": "none",
        "gateway": "bank transfer",
        "description": "withdrawal",
        "credited_to": "2",
        "type": "debit",
        "status": "pending",
        "title": "withdrawal",
        "old_balance": 14600,
        "new_balance": 7600,
        "updated_at": "2024-07-31T22:49:05.000000Z",
        "created_at": "2024-07-31T22:49:05.000000Z",
        "id": 8
    }
}

          </pre>
    </div>

</div>



@include('layouts.footer')