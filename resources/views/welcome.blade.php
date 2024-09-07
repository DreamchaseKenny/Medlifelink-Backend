@include('layouts.header')

<h1 class="text-primary"> (General) </h1>

<button class="accordion">Register</button>
<div class="panel">
    <div>
        http://127.0.0.1:8000/api/create_user
        <h2>Request</h2>
          <pre>
            {
            email:mark@gmail.com
            role:patient
            username:mark
            password:123456
            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
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
          </pre>
    </div>

</div>


////////////////////////////////////////////////////////////////////////

<button class="accordion">Login</button>
<div class="panel">
    <div>
        http://127.0.0.1:8000/api/login_user
        <h2>Request</h2>
          <pre>
            {
            email:mark@gmail.com
            password:123456
            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
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
          </pre>
    </div>

</div>




////////////////////////////////////////////////////////////////////////





<button class="accordion">get user by ID</button>
<div class="panel">
    <div>
        http://127.0.0.1:8000/api/get_user
        <h2>Request</h2>
          <pre>
            {
            user_id:8

            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
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
          </pre>
    </div>

</div>


////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////

<button class="accordion">Update user</button>

<div class="panel">
    <div>
        http://127.0.0.1:8000/api/update_user
        <h2>Post Request</h2>
          <pre>
            {
            'phone' : 09087877766,
            'fullname' => mark john,
            'country_code' => +234,
            'country' => Nigeria,
            'gender' => male,
            'address' => 123 enugu road,
            'dob' => 2000-4-12,
            "user_id"=>3,
            email=>email@gmail.cm

            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
            {
            "message": " successful",
            "status": true,
            "data": {
            "id": 1,
            "user_id": "LTLQN71L",
            "fullname": "postial doctor",
            "balance": 0,
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
            "role": "patient",
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
            "created_at": "2024-06-26T08:35:56.000000Z",
            "updated_at": "2024-06-26T08:35:56.000000Z"
            }
            }
          </pre>
    </div>

</div>



////////////////////////////////////////////////////////////////////////

<button class="accordion">Fund wallet</button>

<div class="panel">
    <div>
        http://127.0.0.1:8000/api/fund_wallet
        <h2>Post Request</h2>
          <pre>
            {
            'amount' : 500,
            'user_id' : 1,
            'reference' : 7869088ggiig,
            'gateway' : paystack,
            'description' : "wallet funding",



            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
            {
            "message": "This transaction has been credited before",
            "status": false,
            "data":
            {
            "id": 1,
            "user_id": 1,
            "status": "pending",
            "amount": 5000,
            "title": "wallet_funding",
            "description": "jjj",
            "credited_to": 1,
            "gateway": "paystack",
            "reference": "88888888888888888888888",
            "type": "credit",
            "created_at": "2024-06-26T09:47:40.000000Z",
            "updated_at": "2024-06-26T09:47:40.000000Z"
            }

            }
          </pre>
    </div>
</div>



///////////////////////////////////////////////////////////////////

<button class="accordion">Update user professional Details </button>

<div class="panel">
    <div>
        http://127.0.0.1:8000/api/user/update_prof_info
        <h2>Post Request</h2>
          <pre>
            {

            'photo' : https://photolink/photo.png,
            'specialization' : dentist,
            'consultation_amount' : 10000,
            'address': 123 new address lagos





            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
            {
            "message": " successful",
            "status": true,
            "data": {
            "id": 3,
            "user_id": "23SG5IQW",
            "fullname": "newname",
            "balance": 0,
            "email": "zhinzeu@gmail.com",
            "username": "zhinzeu",
            "phone": "098988834",
            "country_code": "+234",
            "country": "Nigeria",
            "gender": "male",
            "address": "123 address hill view road",
            "specialization": "dentist",
            "verification_code": null,
            "email_verified": 0,
            "status": "active",
            "role": "patient",
            "created_by": "",
            "rating": "",
            "dob": "12-45-899",
            "consultation_amount": "9000",
            "role_id": "1",
            "email_verified_at": null,
            "weight": "0",
            "height": "0",
            "blood_pressure": "",
            "glucose_level": "",
            "photo": "link to photos",
            "created_at": "2024-07-04T00:57:41.000000Z",
            "updated_at": "2024-07-04T08:27:33.000000Z"
            }
            }
          </pre>
    </div>




</div>


////////////////////////////////////////////////////////////////////////

<button class="accordion">Update password </button>

<div class="panel">
    <div>
        http://127.0.0.1:8000/api/user/update_password
        <h2>Post Request</h2>
          <pre>
            {

            'user_id' : 1,
            "new_password":"2345678",
            "password":1234567





            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
            {
            "message": " successful",
            "status": true,
            "data": {
            "id": 3,
            "user_id": "23SG5IQW",
            "fullname": "newname",
            "balance": 0,
            "email": "zhinzeu@gmail.com",
            "username": "zhinzeu",
            "phone": "098988834",
            "country_code": "+234",
            "country": "Nigeria",
            "gender": "male",
            "address": "123 address hill view road",
            "specialization": "dentist",
            "verification_code": null,
            "email_verified": 0,
            "status": "active",
            "role": "patient",
            "created_by": "",
            "rating": "",
            "dob": "12-45-899",
            "consultation_amount": "9000",
            "role_id": "1",
            "email_verified_at": null,
            "weight": "0",
            "height": "0",
            "blood_pressure": "",
            "glucose_level": "",
            "photo": "link to photos",
            "created_at": "2024-07-04T00:57:41.000000Z",
            "updated_at": "2024-07-04T08:27:33.000000Z"
            }
            }
          </pre>
    </div>
</div>


////////////////////////////////////////////////////////////////////////

<button class="accordion">Forgot password </button>

<div class="panel">
    <div>
        http://127.0.0.1:8000/api/user/forgotpassword
        <h2>Post Request</h2>
          <pre>
            {

            'email' : user@gmail.com,






            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
            {
            "message": " otp sent",
            "status": true
            }
          </pre>
    </div>
</div>



////////////////////////////////////////////////////////////////////////

<button class="accordion">Confirm OTP </button>

<div class="panel">
    <div>
        http://127.0.0.1:8000/api/otp/confirm
        <h2>Post Request</h2>
          <pre>
            {

            'email' : user@gmail.com,
            'otp' : 90999,






            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
            {
                "message": " successful",
                "status": true,
                "data": {
                "id": 3,
                "user_id": "23SG5IQW",
                "fullname": "newname",
                "balance": 0,
                "email": "zhinzeu@gmail.com",
                "username": "zhinzeu",
                "phone": "098988834",
                "country_code": "+234",
                "country": "Nigeria",
                "gender": "male",
                "address": "123 address hill view road",
                "specialization": "dentist",
                "verification_code": null,
                "email_verified": 0,
                "status": "active",
                "role": "patient",
                "created_by": "",
                "rating": "",
                "dob": "12-45-899",
                "consultation_amount": "9000",
                "role_id": "1",
                "email_verified_at": null,
                "weight": "0",
                "height": "0",
                "blood_pressure": "",
                "glucose_level": "",
                "photo": "link to photos",
                "created_at": "2024-07-04T00:57:41.000000Z",
                "updated_at": "2024-07-04T08:27:33.000000Z"
                }
                }
          </pre>
    </div>
</div>





////////////////////////////////////////////////////////////////////////

<button class="accordion">Change password </button>

<div class="panel">
    <div>
        http://127.0.0.1:8000/api/user/changePassword
        <h2>Post Request</h2>
          <pre>
            {

            'email' : user@gmail.com,
            "new_password":"2345678",
            <!-- "otp":089898 -->





            }
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
            {
            "message": " successful",
            "status": true,
            "data": {
            "id": 3,
            "user_id": "23SG5IQW",
            "fullname": "newname",
            "balance": 0,
            "email": "zhinzeu@gmail.com",
            "username": "zhinzeu",
            "phone": "098988834",
            "country_code": "+234",
            "country": "Nigeria",
            "gender": "male",
            "address": "123 address hill view road",
            "specialization": "dentist",
            "verification_code": null,
            "email_verified": 0,
            "status": "active",
            "role": "patient",
            "created_by": "",
            "rating": "",
            "dob": "12-45-899",
            "consultation_amount": "9000",
            "role_id": "1",
            "email_verified_at": null,
            "weight": "0",
            "height": "0",
            "blood_pressure": "",
            "glucose_level": "",
            "photo": "link to photos",
            "created_at": "2024-07-04T00:57:41.000000Z",
            "updated_at": "2024-07-04T08:27:33.000000Z"
            }
            }
          </pre>
    </div>
</div>


////////////////////////////////////////////////////////////////////////














@include('layouts.footer')