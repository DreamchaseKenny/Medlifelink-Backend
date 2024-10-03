@include('layouts.header')

<h1 class="text-primary"> (Patients) </h1>

////////////////////////////////////////////////////////////////////////

<button class="accordion">List of Video Call Logs</button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/callogs/all
        <h2>Request</h2>
          <pre>
         
          </pre>
    </div>

    <div>
        <h2>Response</h2>
          <pre>
            <code>
            {
    "message": "success",
    "status": true,
    "data": []
}
           
            
          </pre>
    </div>

</div>


////////////////////////////////////////////////////////////////////////

<button class="accordion">Create a Call log </button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/callogs/create
        <h2>Post Request</h2>
          <pre>
            {
                call_id:767
patient_id:1
doctor_id:3

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
        "call_id": "767",
        "patient_id": "1",
        "doctor_id": "3",
        "updated_at": "2024-10-02T21:18:03.000000Z",
        "created_at": "2024-10-02T21:18:03.000000Z",
        "id": 1
    }
}
    

          </pre>
    </div>

</div>







////////////////////////////////////////////////////////////////////////

<button class="accordion">Create a Call log </button>
<div class="panel">
    <div>
    http://127.0.0.1:8000/api/callogs/get
        <h2>Post Request</h2>
          <pre>
            {
                call_id:767


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
        "call_id": "767",
        "patient_id": "1",
        "doctor_id": "3",
        "updated_at": "2024-10-02T21:18:03.000000Z",
        "created_at": "2024-10-02T21:18:03.000000Z",
        "id": 1
    }
}
    

          </pre>
    </div>

</div>











@include('layouts.footer')