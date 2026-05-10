-- 1. Role Table
CREATE TABLE Role(
   id_role INT,
   name VARCHAR(50),
   description TEXT,
   created_at DATETIME,
   PRIMARY KEY(id_role)
);

-- 2. Classroom Table
CREATE TABLE Classroom(
   id_classroom INT,
   name VARCHAR(50),
   building VARCHAR(50),
   capacity INT,
   type ENUM('Lecture Hall', 'Lab', 'Standard'),
   has_projector BOOLEAN,
   has_computers BOOLEAN,
   PRIMARY KEY(id_classroom)
);

-- 3. Department Table
CREATE TABLE Departement_(
   id_department_ INT,
   name VARCHAR(100),
   code VARCHAR(15),
   description TEXT,
   created_at DATE,
   PRIMARY KEY(id_department_)
);

-- 4. User Table
CREATE TABLE User_(
   id_user INT,
   username VARCHAR(50),
   email VARCHAR(100),
   password VARCHAR(255),
   is_active BOOLEAN,
   created_at DATETIME,
   updated_at DATETIME,
   id_role INT NOT NULL,
   PRIMARY KEY(id_user),
   FOREIGN KEY(id_role) REFERENCES Role(id_role)
);

-- 5. Student Table
CREATE TABLE Student(
   id_student INT,
   first_name VARCHAR(50),
   last_name VARCHAR(50),
   cin VARCHAR(20),
   student_code VARCHAR(20),
   phone VARCHAR(20),
   birth_date DATE,
   enrollment_date DATE,
   level VARCHAR(20),
   id_user INT NOT NULL,
   PRIMARY KEY(id_student),
   UNIQUE(id_user),
   FOREIGN KEY(id_user) REFERENCES User_(id_user)
);

-- 6. Teacher Table
CREATE TABLE Teacher(
   id_teacher INT,
   first_name VARCHAR(50),
   last_name VARCHAR(50),
   cin VARCHAR(20),
   phone VARCHAR(20),
   hire_date DATE,
   specialization VARCHAR(100),
   id_department_ INT NOT NULL,
   id_user INT NOT NULL,
   PRIMARY KEY(id_teacher),
   UNIQUE(id_user),
   FOREIGN KEY(id_department_) REFERENCES Departement_(id_department_),
   FOREIGN KEY(id_user) REFERENCES User_(id_user)
);

-- 7. Module Table
CREATE TABLE Module_(
   id_module INT,
   name VARCHAR(100),
   code VARCHAR(20),
   credits INT,
   hours_per_week INT,
   semester VARCHAR(4),
   level VARCHAR(20),
   description TEXT,
   id_department_ INT NOT NULL,
   PRIMARY KEY(id_module),
   FOREIGN KEY(id_department_) REFERENCES Departement_(id_department_)
);

-- 8. Enrollment Table
CREATE TABLE Enrollement_(
   id_enrollement INT,
   enrollement_date DATE,
   status ENUM('Registered', 'Completed', 'Dropped'),
   academic_year VARCHAR(20),
   id_module INT NOT NULL,
   id_student INT NOT NULL,
   PRIMARY KEY(id_enrollement),
   FOREIGN KEY(id_module) REFERENCES Module_(id_module),
   FOREIGN KEY(id_student) REFERENCES Student(id_student)
);

-- 9. Schedule Table
CREATE TABLE Schedule(
   id_schedule INT,
   day_of_week ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'),
   start_time TIME,
   end_time TIME,
   semester VARCHAR(4),
   academic_year VARCHAR(20),
   id_classroom INT NOT NULL,
   id_module INT NOT NULL,
   PRIMARY KEY(id_schedule),
   FOREIGN KEY(id_classroom) REFERENCES Classroom(id_classroom),
   FOREIGN KEY(id_module) REFERENCES Module_(id_module)
);

-- 10. Attendance Table
CREATE TABLE Attendance_(
   id_attendance INT,
   date_ DATE,
   status_ ENUM('Present', 'Absent', 'Late'),
   justification TEXT,
   id_student INT NOT NULL,
   id_schedule INT NOT NULL,
   PRIMARY KEY(id_attendance),
   FOREIGN KEY(id_student) REFERENCES Student(id_student),
   FOREIGN KEY(id_schedule) REFERENCES Schedule(id_schedule)
);

-- 11. Exam Table
CREATE TABLE Exam(
   id_exam INT,
   title VARCHAR(255),
   type ENUM('Midterm', 'Final', 'Quiz'),
   exam_date DATE,
   start_time TIME,
   duration INT,
   coefficient DECIMAL(3,2),
   id_module INT NOT NULL,
   PRIMARY KEY(id_exam),
   FOREIGN KEY(id_module) REFERENCES Module_(id_module)
);

-- 12. Grade Table
CREATE TABLE Grade(
   id_grade INT,
   score DECIMAL(5,2),
   max_score DECIMAL(5,2),
   grade_date DATE,
   comment TEXT,
   id_student INT NOT NULL,
   id_exam INT NOT NULL,
   PRIMARY KEY(id_grade),
   FOREIGN KEY(id_student) REFERENCES Student(id_student),
   FOREIGN KEY(id_exam) REFERENCES Exam(id_exam)
);

-- 13. Teacher-Module Link Table (Enseigner)
CREATE TABLE Enseigner(
   id_teacher INT,
   id_module INT,
   PRIMARY KEY(id_teacher, id_module),
   FOREIGN KEY(id_teacher) REFERENCES Teacher(id_teacher),
   FOREIGN KEY(id_module) REFERENCES Module_(id_module)
);