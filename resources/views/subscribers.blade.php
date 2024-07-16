@include('layouts.header')

    <h1 class="text-primary"> (SubscRIBERs EndpoinT) </h1>

   

    ////////////////////////////////////////////////////////////////////////

<button class="accordion">create subscriber</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/subscriber/create
        <h2>POST Request</h2>
        <p>
            {
                name : 'optional',
                "email": "mark@gmail.com (Unique)"

            }
        </p>
    </div>

    <div>
        <h2>Response</h2>
        <p>
        {
    "message": " successfully added",
    "status": true,
    "data": {
        "email": "mark@gmail.com",
        "updated_at": "2024-07-15T08:10:12.000000Z",
        "created_at": "2024-07-15T08:10:12.000000Z",
        "id": 6
    }
}
        </p>
    </div>

</div>


////////////////////////////////////////////////////////////////////////

<button class="accordion">Get all subscribers</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/subscribers/{user_id}
        <h2>GET Request</h2>
        <!-- <p>
            {
                name : 'optional',
                "email": "mark@gmail.com (Unique)"

            }
        </p> -->
    </div>

    <div>
        <h2>Response</h2>
        <p>
        {
    "message": "Subscribers successfully fetched",
    "status": true,
    "data": [
        {
            "id": 1,
            "name": "uuu",
            "email": "hhhhh@gmail.com",
            "created_at": "2024-07-15T08:04:36.000000Z",
            "updated_at": "2024-07-15T08:04:36.000000Z"
        },
        {
            "id": 2,
            "name": "",
            "email": "hhhhh@gmail.com",
            "created_at": "2024-07-15T08:04:55.000000Z",
            "updated_at": "2024-07-15T08:04:55.000000Z"
        },
        {
            "id": 3,
            "name": "",
            "email": "hhhhh@gmail.com",
            "created_at": "2024-07-15T08:06:01.000000Z",
            "updated_at": "2024-07-15T08:06:01.000000Z"
        },
        {
            "id": 4,
            "name": "",
            "email": "hhhhh@gmail.com",
            "created_at": "2024-07-15T08:06:04.000000Z",
            "updated_at": "2024-07-15T08:06:04.000000Z"
        },
        {
            "id": 5,
            "name": "",
            "email": "hhhhh@gmail.com",
            "created_at": "2024-07-15T08:06:25.000000Z",
            "updated_at": "2024-07-15T08:06:25.000000Z"
        },
        {
            "id": 6,
            "name": "",
            "email": "mark@gmail.com",
            "created_at": "2024-07-15T08:10:12.000000Z",
            "updated_at": "2024-07-15T08:10:12.000000Z"
        }
    ]
}
        </p>
    </div>

</div>


////////////////////////////////////////////////////////////////////////

<button class="accordion">create subscriber</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/subscriber/create
        <h2>POST Request</h2>
        <p>
            {
                name : 'optional',
                "email": "mark@gmail.com (Unique)"

            }
        </p>
    </div>

    <div>
        <h2>Response</h2>
        <p>
        {
    "message": " successfully added",
    "status": true,
    "data": {
        "email": "mark@gmail.com",
        "updated_at": "2024-07-15T08:10:12.000000Z",
        "created_at": "2024-07-15T08:10:12.000000Z",
        "id": 6
    }
}
        </p>
    </div>

</div>




////////////////////////////////////////////////////////////////////////

<button class="accordion">Delete subscriber / Unsubscribe</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/subscriber/delete
        <h2>POST Request</h2>
        <p>
            {
                email : 'mark@gmail.com',
                

            }
        </p>
    </div>

    <div>
        <h2>Response</h2>
        <p>
        {
    "message": " successfully added",
    "status": true,
   
}
        </p>
    </div>

</div>







@include('layouts.footer')











