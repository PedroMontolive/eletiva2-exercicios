<?php

abstract Class Person {
    protected string $name;
    protected string $cpf;
    protected string $email;

    public function __construct(string $name, string $cpf, string $email)
    {
        $this->name = $name;
        $this->cpf = $cpf;
        $this->email = $email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

}

Class Student extends Person {
    public string $ra;
    public string $course;
    public int $term;

    public function __construct(string $name, string $cpf, string $email, string $ra, string $course, int $term)
    {
        parent::__construct($name, $cpf, $email);
        $this->ra = $ra;
        $this->course = $course;
        $this->term = $term;
    }

    public function getRegistration(): string
    {
        return $this->ra;
    }

    public function getCourse(): string
    {
        return $this->course;
    }

    public function getTerm(): string
    {
        return $this->term;
    }

    public function setRegistration(string $ra): void
    {
        $this->ra = $ra;
    }

    public function setCourse(string $course): void
    {
        $this->course = $course;
    }

    public function setTerm(int $term): void
    {
        $this->term = $term;
    }

    public function updateTerm(): void
    {
        $this->term++;
    }

    public function __toString()
    {
        return "Name: {$this->name} | CPF: {$this->cpf} | Email: {$this->email} | Ra: {$this->ra} | Course: {$this->course} | Term: {$this->term}";
    }
}

Class Teacher extends Person {

    public string $enrollment;
    public string $workload;
    public string $department;
    public float $salary;

    public function __construct(string $name, string $cpf, string $email, string $enrollment, string $workload, string $department, float $salary)
    {
        parent::__construct($name, $cpf, $email);
        $this->enrollment = $enrollment;
        $this->workload = $workload;
        $this->department = $department;
        $this->salary = $salary;
    }

    public function getEnrollment(): string
    {
        return $this->enrollment;
    }

    public function getWorkload(): string
    {
        return $this->workload;
    }

    public function getDepartment(): string
    {
        return $this->department;
    }

    public function getSalary(): int
    {
        return $this->salary;
    }

    public function setEnrollment(string $enrollment): void
    {
        $this->enrollment = $enrollment;
    }

    public function setWorkload(string $workload): void
    {
        $this->workload = $workload;
    }

    public function setDepartment(string $department): void
    {
        $this->department = $department;
    }

    public function setSalary(int $salary): void
    {
        $this->salary = $salary;
    }

    public function __toString()
    {
        return "Name: {$this->name} | CPF: {$this->cpf} | Email: {$this->email} | Enrollment: {$this->enrollment} | Workload: {$this->workload} | Department: {$this->department} | Salary: {$this->salary}";
    }
}

Class Employee extends Person {

    public string $enrollment;
    public string $regime;
    public float $salary;

    public function __construct(string $name, string $cpf, string $email, string $enrollment, string $regime, float $salary)
    {
        parent::__construct($name, $cpf, $email);
        $this->enrollment = $enrollment;
        $this->regime = $regime;
        $this->salary = $salary;
    }
    
    public function getEnrollment(): string
    {
        return $this->enrollment;
    }

    public function getRegime(): string
    {
        return $this->regime;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }
    
    public function setEnrollment(string $enrollment): void
    {
        $this->enrollment = $enrollment;
    }

    public function setRegime(string $regime): void
    {
        $this->regime = $regime;
    }

    public function setSalary(float $indice): void
    {
        $this->salary = $this->salary + ($this->salary * $indice/100);
    }

    public function updateSalary(float $salary): void
    {
        $this->salary += $salary;
    }

    public function __toString()
    {
        return "Name: {$this->name} | CPF: {$this->cpf} | Email: {$this->email} | Enrollment: {$this->enrollment} | Regime: {$this->regime} | Salary: {$this->salary}";
    }
}

$teacher = new Teacher("João", "123.456.789-10", "joao@l8.vc", "123456", "40h", "TI", 1000.00); 

$employer = new Employee("Alvaro", "987.654.321-10", "alvaro@gmail.com", "654321", "CLT", 2000.00);

echo $employer->__toString();
