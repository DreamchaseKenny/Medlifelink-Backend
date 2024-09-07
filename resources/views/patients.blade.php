@include('layouts.header')

<h1 class="text-primary"> (Patients) </h1>

////////////////////////////////////////////////////////////////////////

<button class="accordion">List of Medication</button>
<div class="panel">
    <div>
        http://127.0.0.1:8000/api/list_medications
        <h2>Request</h2>
          <pre>
            {
            user_id:3

            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
            <code>
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
            
          </pre>
    </div>

</div>


////////////////////////////////////////////////////////////////////////

<button class="accordion">Get patiens of Doctors </button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/patients/doctor
        <h2>Post Request</h2>
          <pre>
            {
                patients_id:1

            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
        
        {
    "message": "Doctors successfully fetched",
    "status": true,
    "data": [
        {
            "id": 1,
            "user_id": "5NLTCRS2",
            "fullname": "postial doctor",
            "balance": 25000,
            "email": "email@gmail.com",
            "username": "martins",
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
            "dob": "dob",
            "consultation_amount": "0",
            "role_id": "1",
            "email_verified_at": null,
            "weight": "0",
            "height": "0",
            "blood_pressure": "",
            "glucose_level": "",
            "photo": "",
            "created_at": "2024-06-26T09:47:28.000000Z",
            "updated_at": "2024-06-26T11:03:13.000000Z"
        }
    ]
}
    

          </pre>
    </div>

</div>











@include('layouts.footer')