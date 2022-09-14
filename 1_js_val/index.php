<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
    <h2 style="text-align: center;">Student Information form with Validations</h2>

    <form name="myForm" method="post" action="action.php" onsubmit="return onSubmitFunc()">
        <table align="center">
            <tr>
                <td>First Name: </td>
                <td><input type="text" name="fname" id="fname"><span style="color: red;" id="fnameErr"></span></td>
            </tr>
            <tr>
                <td>Last Name: </td>
                <td><input type="text" name="lname" id="lname"><span style="color: red;" id="lnameErr"></span></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="email" name="email" id="email"><span style="color: red;" id="emailErr"></span></td>
            </tr>
            <tr>
                <td>Student Id: </td>
                <td><input type="number" name="s_id" id="s_id"><span style="color: red;" id="s_idErr"></span></td>
            </tr>
            <tr>
                <td>Department: </td>
                <td><input type="text" name="department" id="department"><span style="color: red;" id="departmentErr"></span></td>
            </tr>
            <tr>
                <td>Phone: </td>
                <td><input type="text" name="phone" id="phone"><span style="color: red;" id="phoneErr"></span></td>
            </tr>
            <tr>
                <td>Date of Birth: </td>
                <td><input type="date" name="birthday" id="birthday"><span style="color: red;" id="birthdayErr"></span></td>
            </tr>
            <tr>
                <td>Present Address: </td>
                <td><input type="text" name="p_address" id="p_address"><span style="color: red;" id="p_addressErr"></span></td>
            </tr>
            <tr>
                <td>Permanent Address: </td>
                <td><input type="text" name="per_address" id="per_address"><span style="color: red;" id="per_addressErr"></span></td>
            </tr>
            <tr>
                <td>Religion</td>
                <td>
                    <select name="religion" id="religion">
                        <option value="None">None</option>
                        <option value="Islam">Islam</option>
                        <option value="Hinduism">Hinduism</option>
                        <option value="Buddhism">Buddhism</option>
                        <option value="Christianity">Christianity</option>
                    </select><span style="color: red;" id="religionErr"></span>
                </td>
            </tr>
            <tr>
                <td>Gender: </td>
                <td>
                    <input type="radio" name="gender" id="gender" value="male">Male
                    <input type="radio" name="gender" id="gender" value="female">Female
                    <input type="radio" name="gender" id="gender" value="others">Others
                    <span style="color: red;" id="genderErr"></span>
                </td>
            </tr>
            <tr>
                <td>Blood Group: </td>
                <td>
                    <input type="radio" name="blood" id="blood" value="A+">A+
                    <input type="radio" name="blood" id="blood" value="A-">A-
                    <input type="radio" name="blood" id="blood" value="B+">B+
                    <input type="radio" name="blood" id="blood" value="B-">B-
                    <input type="radio" name="blood" id="blood" value="AB+">AB+
                    <input type="radio" name="blood" id="blood" value="AB-">AB-
                    <input type="radio" name="blood" id="blood" value="O+">O+
                    <input type="radio" name="blood" id="blood" value="O-">O-
                    <span style="color: red;" id="bloodErr"></span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="submit"></td>
            </tr>
        </table>
    </form>

    <script>
        function onSubmitFunc() {
            const errors = {};
            const formData = document.forms["myForm"];
            //validation for first name
            if (formData["fname"].value == "") {
                errors["fnameErr"] = "*Must be Filled";
                document.getElementById("fnameErr").innerHTML = errors.fnameErr;

            } else {
                const fname_val = /[A-Za-z]{4,}/;
                if (!formData["fname"].value.match(fname_val)) {
                    errors["fnameErr"] = "*Must be at least 4 letters";
                    document.getElementById("fnameErr").innerHTML = errors.fnameErr;
                } else {
                    document.getElementById("fnameErr").innerHTML = "";
                }
            }
            //validation for last name
            if (formData["lname"].value == "") {
                errors["lnameErr"] = "*Must be Filled";
                document.getElementById("lnameErr").innerHTML = errors.lnameErr;

            } else {
                const lname_val = /[A-Za-z]{4,}/;
                if (!formData["lname"].value.match(lname_val)) {
                    errors["lnameErr"] = "*Must be at least 4 letters";
                    document.getElementById("lnameErr").innerHTML = errors.lnameErr;
                } else {
                    document.getElementById("lnameErr").innerHTML = "";
                }
            }
            //validation for email
            if (formData["email"].value == "") {
                errors["emailErr"] = "*Must be Filled";
                document.getElementById("emailErr").innerHTML = errors.emailErr;

            } else {
                const email_val = /^\w+@\w+(\.\w{2,3})+$/;
                if (!formData["email"].value.match(email_val)) {
                    errors["emailErr"] = "*Invalid Email";
                    document.getElementById("emailErr").innerHTML = errors.emailErr;
                } else {
                    document.getElementById("emailErr").innerHTML = "";
                }
            }
            //validation for student id
            if (formData["s_id"].value == "") {
                errors["s_idErr"] = "*Must be Filled";
                document.getElementById("s_idErr").innerHTML = errors.s_idErr;

            } else {
                const s_id_val = /^\(?([0-9]{8})\)?$/;
                if (!formData["s_id"].value.match(s_id_val)) {
                    errors["s_idErr"] = "*Must be 8 letters";

                    document.getElementById("s_idErr").innerHTML = errors.s_idErr;
                } else {
                    document.getElementById("s_idErr").innerHTML = "";
                }
            }
            //validation for department
            if (formData["department"].value == "") {
                errors["departmentErr"] = "*Must be Filled";
                document.getElementById("departmentErr").innerHTML = errors.departmentErr;

            } else {
                document.getElementById("departmentErr").innerHTML = "";
            }

            // validation for phone number
            if (formData["phone"].value == "") {
                errors["phoneErr"] = "Must be filled";
                document.getElementById("phoneErr").innerHTML = errors.phoneErr;
            } else {
                const phone_var = /^\(?([0][1][0-9]{9})\)?$/;
                if (!formData["phone"].value.match(phone_var)) {
                    errors["phoneErr"] = "*Must be 11 letters & start with 01";
                    document.getElementById("phoneErr").innerHTML = errors.phoneErr;
                } else {
                    document.getElementById("phoneErr").innerHTML = "";
                }
            }
            //validation for birthday
            if (formData["birthday"].value == "") {
                errors["birthdayErr"] = "*Must be filled";
                document.getElementById("birthdayErr").innerHTML = errors.birthdayErr;
            } else {
                const today = new Date();
                const date = formData["birthday"].value;
                const date_to_string = new Date(date);
                if (date_to_string > today) {
                    errors["birthdayErr"] = "*Date must be less than today";
                    document.getElementById("birthdayErr").innerHTML = errors.birthdayErr;
                } else {
                    document.getElementById("birthdayErr").innerHTML = "";
                }
            }
            //validation for present address
            if (formData["p_address"].value == "") {
                errors["p_addressErr"] = "*Must be Filled";
                document.getElementById("p_addressErr").innerHTML = errors.p_addressErr;

            } else {
                document.getElementById("p_addressErr").innerHTML = "";
            }
            //validation for permanent address
            if (formData["per_address"].value == "") {
                errors["per_addressErr"] = "*Must be Filled";
                document.getElementById("per_addressErr").innerHTML = errors.per_addressErr;

            } else {
                document.getElementById("per_addressErr").innerHTML = "";
            }
            //validation for religion
            if (formData["religion"].value == "None") {
                errors["religionErr"] = "*Must Select one field";
                document.getElementById("religionErr").innerHTML = errors.religionErr;

            } else {
                document.getElementById("religionErr").innerHTML = "";
            }
            //validation for gender
            if (formData["gender"].value == "") {
                errors["genderErr"] = "*Must be Filled";
                document.getElementById("genderErr").innerHTML = errors.genderErr;

            } else {
                document.getElementById("genderErr").innerHTML = "";
            }
            //validation for blood group
            if (formData["blood"].value == "") {
                errors["bloodErr"] = "*Must be Filled";
                document.getElementById("bloodErr").innerHTML = errors.bloodErr;

            } else {
                document.getElementById("bloodErr").innerHTML = "";
            }
            
            //An object error passes and check conditions then return true or false
            if (Object.keys(errors).length === 0) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>
</html>