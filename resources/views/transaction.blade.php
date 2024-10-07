@include('layouts.header')

    <h1 class="text-primary"> (Admin) </h1>

   

    ////////////////////////////////////////////////////////////////////////

<button class="accordion">Get users transactions</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/user/transactions/3
        <h2>GET Request</h2>
       
    </div>

    <div>
        <h2>Response</h2>
        <p>
        {
    "message": "success",
    "status": true,
    "data": [
        {
            "id": 6,
            "user_id": 3,
            "status": "pending",
            "amount": 7000,
            "title": "wallet_funding",
            "description": "jjj",
            "credited_to": 3,
            "gateway": "paystack",
            "reference": "ufufuhhfhdhdhhdhf",
            "type": "credit",
            "created_at": "2024-07-07T18:23:12.000000Z",
            "updated_at": "2024-07-07T18:23:12.000000Z"
        }
    ]
}
        </p>
    </div>

</div>



////////////////////////////////////////////////////////////////////////

<button class="accordion">Get users transactions</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/user/transactions
        <h2>GET Request</h2>
        <p>
            {
                user_id: 8

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

<button class="accordion">Approve withdrawal and other transactions</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/transactions/approve
        <h2>POST Request</h2>
        <p>
            {
                transaction_id:8,
transaction_description:withdrawal,
user_id:2

            }
        </p>
    </div>

    <div>
        <h2>Response</h2>
        <p>
        {
    "message": "success",
    "status": true,
    "data": {
        "id": 8,
        "user_id": 2,
        "status": "approved",
        "amount": 7000,
        "title": "withdrawal",
        "description": "withdrawal",
        "credited_to": 2,
        "gateway": "bank transfer",
        "reference": "none",
        "type": "debit",
        "bank_name": null,
        "acc_number": null,
        "acc_name": null,
        "old_balance": 14600,
        "new_balance": 7600,
        "created_at": "2024-07-31T22:49:05.000000Z",
        "updated_at": "2024-07-31T22:50:59.000000Z"
    }
}
        </p>
    </div>

</div>



////////////////////////////////////////////////////////////////////////

<button class="accordion">Decline withdrawal and other transactions</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/transactions/approve
        <h2>POST Request</h2>
        <p>
            {
                transaction_id:8,
transaction_description:withdrawal,
user_id:2

            }
        </p>
    </div>

    <div>
        <h2>Response</h2>
        <p>
        {
    "message": "success",
    "status": true,
    "data": {
        "id": 8,
        "user_id": 2,
        "status": "declined",
        "amount": 7000,
        "title": "withdrawal",
        "description": "withdrawal",
        "credited_to": 2,
        "gateway": "bank transfer",
        "reference": "none",
        "type": "debit",
        "bank_name": null,
        "acc_number": null,
        "acc_name": null,
        "old_balance": 14600,
        "new_balance": 7600,
        "created_at": "2024-07-31T22:49:05.000000Z",
        "updated_at": "2024-07-31T22:50:59.000000Z"
    }
}
        </p>
    </div>

</div>



////////////////////////////////////////////////////////////////////////

<button class="accordion">Get All transactions</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/transactions/all/2
        <h2>GET Request</h2>
        <p>
           
        </p>
    </div>

    <div>
        <h2>Response</h2>
        <p>
        {
    "message": "success",
    "status": true,
    "data":[ {
        "id": 8,
        "user_id": 2,
        "status": "declined",
        "amount": 7000,
        "title": "withdrawal",
        "description": "withdrawal",
        "credited_to": 2,
        "gateway": "bank transfer",
        "reference": "none",
        "type": "debit",
        "bank_name": null,
        "acc_number": null,
        "acc_name": null,
        "old_balance": 14600,
        "new_balance": 7600,
        "created_at": "2024-07-31T22:49:05.000000Z",
        "updated_at": "2024-07-31T22:50:59.000000Z"
    }
    ]
}
        </p>
    </div>

</div>



@include('layouts.footer')









