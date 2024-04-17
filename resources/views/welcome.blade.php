<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }

        .active,
        .accordion:hover {
            background-color: #ccc;
        }

        .panel {
            padding: 0 18px;
            display: none;
            background-color: white;
            overflow: hidden;
        }
    </style>
</head>

<body>

    <h1 class="text-primary">MEDLIFE LINK BACkEND </h1>

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










    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>

</body>

</html>