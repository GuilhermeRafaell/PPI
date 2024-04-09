CREATE TABLE Pessoa (
    Codigo INT PRIMARY KEY,
    Nome VARCHAR(255),
    Sexo CHAR(1),
    Email VARCHAR(255),
    Telefone VARCHAR(15),
    CEP VARCHAR(9),
    Logradouro VARCHAR(255),
    Cidade VARCHAR(255),
    Estado CHAR(2)
);

CREATE TABLE Funcionario (
    Codigo INT PRIMARY KEY,
    DataContrato DATE,
    Salario DECIMAL,
    SenhaHash VARCHAR(255),
    
	FOREIGN KEY (Codigo) REFERENCES Pessoa(Codigo)
);

CREATE TABLE Medico (
	Codigo INT PRIMARY KEY,
	Especialidade VARCHAR (255), 
	CRM INT,

	FOREIGN KEY (Codigo) REFERENCES Funcionario(Codigo)
);

CREATE TABLE Paciente (
	Codigo INT PRIMARY KEY, 
	Peso DECIMAL, 
	Altura DECIMAL, 
	TipoSanguineo CHAR (3),

	FOREIGN KEY (Codigo) REFERENCES Pessoa(Codigo)
);

CREATE TABLE Agenda (
	Codigo INT PRIMARY KEY, 
	Data DATE, 
	Horario TIME, 
	Nome VARCHAR (255), 
	Sexo CHAR (1), 
	Email VARCHAR (255), 
	CodigoMedico INT,

	FOREIGN KEY (CodigoMedico) REFERENCES Medico(Codigo)
);
