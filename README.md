# Hospital-Management-System
This application helps hospital staffs better manage personal information (The information of doctors, nurses, patients and administrators) and medical records. It allows users to interact with the hospital database via web pages. Each user is granted the privileges to the database according to his/her identity. 

## Functionality
1. For doctors, by logging in the system, they can check the list of patients to whom they are assigned (They can only check the list of their own patients). What's more, they can make treatment plans for their patients. (e.g. Set the name of the treatment, decide what medicine to be used and the does of the medicine)
2. For nurses, they can check the list of their own patients.
3. For patients, they can check the list of their own doctors and nurses.
4. For administrators, they can get access to all the information stored in the database. For example, they can check the personal information lists of all doctors, nurses, patients and medicine. They can also check the doctor-patient, nurse-patient, patient-medicine relation lists. Beyond that, they can assign doctors/ nurses to patients and delete anyone's account from the system.

## Database Design
The details about the database schema are shown below
### ER diagram
<img src="https://github.com/JoshuaHong0/Hospital-Management-System/blob/master/database_info/ER_diagram.png" width="600" height="400" />

### Relational Schema
<img src="https://github.com/JoshuaHong0/Hospital-Management-System/blob/master/database_info/Relational_Schema.jpg" width="350" height="450" />

## Web application
### General architecture of User Interface
<img src="https://github.com/JoshuaHong0/Hospital-Management-System/blob/master/demo/Main_architecture.png" width="700" height="300" />
