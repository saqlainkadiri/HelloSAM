# HelloSAM

This Student Attendance Management(SAM) project was done during Unscript-2k18 24 hours Hackathon for which we won 2nd prize.

## Technologies Used

1.HTML5

2.CSS3

3.Javascript

4.jQuery

5.PHP

6.MySQL

7.Arduino

8.Embedded C++

9.Bootstrap


## Main Features

1.Biometric Attendance

2.Manual Attendance

3.Attendance Reports using Bar Chart and Pie Chart(using ChartJS)

4.Generating Excel File for Lecture Attendance Summary(for Teachers)

5.File Upload feature for adding Circulars

6.Generating PDF Results(using dompdf)

7.SMS on Student Admission (using Twilio)

8.Email on Student Admission or Addition of new Teachers(using PHPMailer)

## Steps of Installation 

1.Download or Clone "HelloSAM" from here.

2.Verify and Enter your database username and password at "hellosam/db_connection.php".

3.Create a database "hellosam" and import the database from "database/hellosam.sql".

4.Make a Twilio account to get Account SID, Auth Token and Twilio Mobile Number and substitute them in the placeholders at "hellosam/login/signup.php".

5.Place "cacert.pem" inside any directory inside C drive.

6.Open php.ini and uncomment the line "curl.cainfo = " by removing the semicolon at the start of the line.

7.Update curl.cainfo="C:/path/of/file/cacert.pem" and restart WAMP/XAMPP.

8.Substitute your Gmail account credentials and Contact Queries receiving Email Address in the placeholders at "hellosam/admin/add_admission.php" and "hellosam/admin/add_teacher.php".

9.Allow use of less secured apps in the Settings Panel of your Gmail Account (just in case Sending Emails is not working).

10.Setup an Arduino along with a Fingerprint Scanner as shown in "screenshots/Arduino.png". 

## NOTE 

1.Twilio only sends SMS between morning 9am to evening 9pm.

2.Sample Biometric Registration and Attendance Video is available at "Videos/*".

3.Sample Attendance Summary Excel File can be found at "Samples/Sample Attendance Summary.xlsx".

4.Sample Result Sheet PDF can be found at "Samples/Sample Result Sheet.pdf".


## Screenshots

### Arduino

![Arduino Setup](/screenshots/Arduino.PNG)

### Add Circular Page

![Add Circular Page](/screenshots/Add%20Circular.PNG)

### Generate Result Page

![Generate Result Page](/screenshots/Generate%20Result.PNG)

### Take Attendance Page

![Take Attendance Page](/screenshots/Take%20Attendance.PNG)

### Attendance Graphs

![Attendance Graphs](/screenshots/Sample%20Graphs.PNG)

### Sample SMS

![Sample SMS](/screenshots/Sample%20SMS.PNG)

### Sample Email

![Sample Email](/screenshots/Sample%20Email.PNG)

