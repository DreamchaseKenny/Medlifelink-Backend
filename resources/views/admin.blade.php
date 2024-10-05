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


////////////////////////////////////////////////////////////////////////

<button class="accordion">Get website settings</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/website/settings
        <h2>POST Request</h2>
        <p>
            {
                user_id: 1

            }
        </p>
    </div>

    <div>
        <h2>Response</h2>
        <p>
        {
    "message": "succes",
    "status": true,
    "data": {
        "id": 1,
        "name": "medlife",
        "phone_number": "09999",
        "email": "medlife@gmail.com",
        "address": "123 address",
        "about_us": "medlife",
        "created_at": null,
        "updated_at": "2024-09-14T06:31:37.000000Z"
    }
}
        </p>
    </div>

</div>




////////////////////////////////////////////////////////////////////////

<button class="accordion">update website settings</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/website/settings
        <h2>POST Request</h2>
        <p>
            {
                name: medlifelink
phone_number: 09999
email: medlifelink@gmail.com
address: 34 medlifelink road
about_us: medlifelink

            }
        </p>
    </div>

    <div>
        <h2>Response</h2>
        <p>
        {
    "message": "succes",
    "status": true,
    "data": {
        "id": 1,
        "name": "medlife",
        "phone_number": "09999",
        "email": "medlife@gmail.com",
        "address": "123 medlifelink road",
        "about_us": "medlife",
        "created_at": null,
        "updated_at": "2024-09-14T06:31:37.000000Z"
    }
}
        </p>
    </div>

</div>






////////////////////////////////////////////////////////////////////////

<button class="accordion">Admin create/ onboard Doctor  </button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/website/settings
        <h2>POST Request</h2>
        <p>
            {
                admin_id:1

email:docs3@gmail.com
password:12345678
username:ogadocs3
phone:09088666
fullname:Mr DOcs
gender:male
dob:12-01-1998
photo:photo

clinic_affiliation:patient
certifications:[MBLA Certificate]
years_of_experience:10
languages:[english,igbo]
specialization:tooth


            }
        </p>
    </div>

    <div>
        <h2>Response</h2>
        <p>
      {
    "message": "Successfully created",
    "status": true
}
        </p>
    </div>

</div>





////////////////////////////////////////////////////////////////////////

<button class="accordion">Admin create/ onboard Doctor  </button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/website/settings
        <h2>POST Request</h2>
        <p>
            {
                admin_id:1

email:docs3@gmail.com
password:12345678
username:ogadocs3
phone:09088666
fullname:Mr DOcs
gender:male
dob:12-01-1998
photo:photo

clinic_affiliation:patient
certifications:[MBLA Certificate]
years_of_experience:10
languages:[english,igbo]
specialization:tooth


            }
        </p>
    </div>

    <div>
        <h2>Response</h2>
        <p>
      {
    "message": "Successfully created",
    "status": true
}
        </p>
    </div>

</div>



@include('layouts.footer')









