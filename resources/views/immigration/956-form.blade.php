<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form 956</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 20px;
}

.form-container {
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ccc;
    max-width: 800px;
    margin: auto;
}

header {
    text-align: center;
    margin-bottom: 20px;
}

.gov-logo img {
    width: 100px;
}

h1, h2, h3 {
    margin-bottom: 10px;
}

section {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="radio"], 
input[type="checkbox"] {
    margin-right: 10px;
}

input[type="radio"] + label,
input[type="checkbox"] + label {
    display: inline-block;
}

input[type="submit"] {
    background-color: #0073e6;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #005bb5;
}

    </style>
</head>
<body>
    <div class="form-container">
        <header>
            <div class="gov-logo">
                <img src="path_to_logo.png" alt="Australian Government Logo">
            </div>
            <h1>Appointment of a registered migration agent, legal practitioner or exempt person</h1>
            <h2>Form 956</h2>
        </header>
        <form>
            <section class="section">
                <h3>Part A – New appointment</h3>
                <label for="appointment-type">Are you notifying the Department that you have been appointed?</label><br>
                <input type="radio" id="new-appointment" name="appointment-type" checked> New appointment (Complete Part A and Part C)<br>
                <input type="radio" id="appointment-ended" name="appointment-type"> Appointment has ended (Complete Part B and Part C)<br><br>

                <label>Title:</label><br>
                <input type="radio" id="mr" name="title" value="Mr" checked> Mr
                <input type="radio" id="mrs" name="title" value="Mrs"> Mrs
                <input type="radio" id="miss" name="title" value="Miss"> Miss
                <input type="radio" id="ms" name="title" value="Ms"> Ms
                <input type="radio" id="other" name="title" value="Other"> Other <br><br>

                <label for="family-name">Family name</label>
                <input type="text" id="family-name" value="Kapoor"><br><br>

                <label for="given-name">Given names</label>
                <input type="text" id="given-name" value="Mayank"><br><br>

                <label for="organisation">Organisation name</label>
                <input type="text" id="organisation" value="Aussizz Migration and Education Consultants"><br><br>

                <label for="address">Business or residential address</label>
                <input type="text" id="address" value="Level 1, 328 Burwood Road, Hawthorn, Victoria, Australia, 3122"><br><br>

                <label for="correspondence">Address for correspondence</label>
                <input type="text" id="correspondence" value="AS ABOVE"><br><br>

                <label for="phone">Telephone numbers</label><br>
                Office hours: <input type="text" id="office-phone" placeholder="Office phone"><br>
                Mobile/cell: <input type="text" id="mobile-phone" value="0399007277"><br><br>

                <label for="email">Do you agree to the Department communicating by email?</label><br>
                <input type="radio" id="yes-email" name="email-agreement" checked> Yes
                <input type="radio" id="no-email" name="email-agreement"> No <br>
                Email: <input type="email" id="email" value="ddpatel@aussizzgroup.com"><br><br>

                <label for="capacity">In what capacity are you providing assistance?</label><br>
                <input type="radio" id="migration-agent" name="capacity" checked> Registered migration agent<br>
                <input type="radio" id="legal-practitioner" name="capacity"> Legal practitioner<br>
                <input type="radio" id="exempt-person" name="capacity"> Exempt person<br><br>

                <label for="marn">Migration Agent Registration Number (MARN)</label>
                <input type="text" id="marn" value="2318347"><br><br>

                <label for="legal-practitioner-number">Legal Practitioner Number (LPN)</label>
                <input type="text" id="lpn" value="5555555"><br><br>

                <label for="backup-agent">Is there another agent from your organisation?</label><br>
                <input type="radio" id="no-backup" name="backup-agent" checked> No<br>
                <input type="radio" id="yes-backup" name="backup-agent"> Yes <br><br>

                <h3>Reason for exemption</h3>
                <input type="checkbox" id="family-member" name="exemption-reason"> Close family member<br>
                <input type="checkbox" id="sponsor" name="exemption-reason"> Sponsor<br>
                <input type="checkbox" id="nominator" name="exemption-reason"> Nominator<br><br>
            </section>
        </form>
    </div>
</body>
</html>
