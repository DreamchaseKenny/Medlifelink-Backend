@include('layouts.header')

    <h1 class="text-primary"> (Contact us EndpoinT) </h1>

   

    ////////////////////////////////////////////////////////////////////////

<button class="accordion">create contact</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/contact/create
        <h2>POST Request</h2>
        <p>
            {
                name : 'mark',
                "email": "mark@gmail.com (Unique)",
                "phone": "0908877899",
                "message" : "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem nisi, minima qui, soluta nihil quis magnam, accusamus ut sit ipsam distinctio. Eveniet maxime quo beatae necessitatibus animi, praesentium iste voluptas?
                "

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
        "name": "name",
        "phone": "phone",
        "message": "message",
        "updated_at": "2024-07-15T10:06:15.000000Z",
        "created_at": "2024-07-15T10:06:15.000000Z",
        "id": 1
    }
}
        </p>
    </div>

</div>


////////////////////////////////////////////////////////////////////////

<button class="accordion">Get all contacts</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/contact/{user_id}
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
    "message": "Contact successfully fetched",
    "status": true,
    "data": [
        {
            "id": 1,
            "name": "name",
            "email": "mark@gmail.com",
            "phone": "phone",
            "message": "message",
            "created_at": "2024-07-15T10:06:15.000000Z",
            "updated_at": "2024-07-15T10:06:15.000000Z"
        },
        {
            "id": 2,
            "name": "name",
            "email": "markio@gmail.com",
            "phone": "phone",
            "message": "messageikkkk",
            "created_at": "2024-07-15T10:37:38.000000Z",
            "updated_at": "2024-07-15T10:37:38.000000Z"
        },
        {
            "id": 3,
            "name": "name",
            "email": "markio@gmail.com",
            "phone": "phone",
            "message": "messageikkkk",
            "created_at": "2024-07-15T10:37:39.000000Z",
            "updated_at": "2024-07-15T10:37:39.000000Z"
        },
        {
            "id": 4,
            "name": "name",
            "email": "markio@gmail.com",
            "phone": "phone",
            "message": "messageikkkk",
            "created_at": "2024-07-15T10:37:41.000000Z",
            "updated_at": "2024-07-15T10:37:41.000000Z"
        }
    ]
  }
        </p>
    </div>

</div>




////////////////////////////////////////////////////////////////////////

<button class="accordion">Delete contact</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/contact/delete
        <h2>POST Request</h2>
        <p>
            {
                contact_id : 3,
                

            }
        </p>
    </div>

    <div>
        <h2>Response</h2>
        <p>
        {
    "message": " contact added",
    "status": true,
   
}
        </p>
    </div>

</div>







@include('layouts.footer')











