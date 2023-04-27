<?php
class Contact
{
	protected int $id;
	protected string $subject;
	protected string $email;
	protected string $message;
	protected array $errors = [];

	public function __construct(array $postMethod)
	{
		// to set the $_POST["value set here!!"] to $postMethod["value set here!!!"];
		if (isset($postMethod['subject'])) {
			$this->setSubject(trim($postMethod['subject']));
		}
		if (isset($postMethod['email'])) {
			$this->setEmail(trim($postMethod['email']));
		}
		if (isset($postMethod['message'])) {
			$this->setMessage(trim($postMethod['message']));
		}
	}
	
	public function getId(): ?int
	{
		return $this->id;
	}
	
	public function setId(?int $id): self
	{
		$this->id = $id;
		return $this;
	}

	public function getSubject(): string
	{
		return $this->subject;
	}

	public function setSubject(string $subject): self
	{
		$this->subject = $subject;

		if (empty($subject)) {
			$this->errors[] = "Subject can not be empty";
		} elseif (strlen($subject) < 8) {
			$this->errors[] = "Subject must be more than 8 letters";
		}
		return $this;
	}

	public function getEmail(): string
	{
		return $this->email;
	}

	public function setEmail(string $email): self
	{
		$this->email = $email;

		if (empty($email)) {
			$this->errors[] = "email can not be empty";
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->errors[] = "Please enter a valid email";
		}
		return $this;
	}

	public function getMessage(): string
	{
		return $this->message;
	}

	public function setMessage(string $message): self
	{
		$this->message = $message;
		if (empty($message)) {
			$this->errors[] = "Content can not be empty";
		} elseif ((strlen($message) <= 10)) {
			$this->errors[] = '80 minimum letters';
		}
		return $this;
	}

	public function getErrors(): array {
		return $this->errors;
	}
	
	public function setErrors(array $errors): self {
		$this->errors = $errors;
		return $this;
	}

}
?>