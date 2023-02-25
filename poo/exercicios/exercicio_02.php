<?php

Class Account
{
    public string $bank;
    public string $agency;
    public string $account;
    public float $balance;

    public function __construct(string $bank, string $agency, string $account, float $balance)
    {
        $this->bank = $bank;
        $this->agency = $agency;
        $this->account = $account;
        $this->balance = $balance;
    }

    public function deposit(float $value): void
    {
        $this->balance += $value;
    }

    public function withdraw(float $value): void
    {
        $value > $this->balance ? $this->balance = 0 : $this->balance -= $value;
    }

    public function transfer(float $value, Account $account): void
    {
        $this->withdraw($value);
        $account->deposit($value);
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function getBank(): string
    {
        return $this->bank;
    }

    public function getAgency(): string
    {
        return $this->agency;
    }

    public function getAccount(): string
    {
        return $this->account;
    }

    public function setBank(string $bank): void
    {
        $this->bank = $bank;
    }

    public function setAgency(string $agency): void
    {
        $this->agency = $agency;
    }

    public function setAccount(string $account): void
    {
        $this->account = $account;
    }

    public function setBalance(float $balance): void
    {
        $this->balance = $balance;
    }

    public function __toString(): string
    {
        return "Bank: {$this->bank} Agency: {$this->agency} Account: {$this->account} Balance: {$this->balance}";
    }
    
}

$account_001 = new Account('Banco do Brasil', '1234', '123456-7', 1000);
$account_002 = new Account('Caixa Econômica', '4321', '765432-1', 500);

$account_001->deposit(100);
$account_001->withdraw(50);
$account_001->transfer(100, $account_002);

echo $account_001->__toString();