<?php

abstract Class Account
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
        if($value > $this->balance) {
            echo json_encode(['status' => false ,'msg' => 'Saldo insuficiente']);
            return;
        }else {
            $this->balance -= $value;
        }
    }

    public function transfer(float $value, Account $account): void
    {
        if($value > $this->balance) {
            echo json_encode(['status' => false ,'msg' => 'Saldo insuficiente']);
            return;
        }else {
            $this->withdraw($value);
            $account->deposit($value);
        }
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
        return "Bank: {$this->bank} | Agency: {$this->agency} | Account: {$this->account} | Balance: {$this->balance}";
    }
    
}

final Class CurrentAccount extends Account
{
    public float $limit;

    public function __construct(string $bank, string $agency, string $account, float $balance, float $limit)
    {
        parent::__construct($bank, $agency, $account, $balance);
        $this->limit = $limit;
    }

    public function withdraw(float $value): void
    {
        if($value > $this->balance + $this->limit) {
            echo json_encode(['status' => false ,'msg' => 'Saldo insuficiente']);
            return;
        }else {
            $this->balance -= $value;
        }
    }

    public function getLimit(): float
    {
        return $this->limit;
    }

    public function setLimit(float $limit): void
    {
        $this->limit = $limit;
    }

    public function __toString(): string
    {
        $total = $this->balance + $this->limit;
        return "Bank: {$this->bank} | Agency: {$this->agency} | Account: {$this->account} | Balance: {$this->balance} | Limit: {$this->limit} | Total: {$total}";
    }
}

Final Class SavingsAccount extends Account
{
    public float $rate;

    public function __construct(string $bank, string $agency, string $account, float $balance, float $rate)
    {
        parent::__construct($bank, $agency, $account, $balance);
        $this->rate = $rate;
    }

    public function getRate(): float
    {
        return $this->rate;
    }

    public function setRate(float $rate): void
    {
        $this->rate = $rate;
    }

    public function __toString(): string
    {
        return "Bank: {$this->bank} | Agency: {$this->agency} | Account: {$this->account} | Balance: {$this->balance} | Rate: {$this->rate}";
    }
}

// $account_001 = new Account('Banco do Brasil', '1234', '123456-7', 1000);
$account_002 = new CurrentAccount('Itaú', '4321', '765432-1', 1000, 500);
$account_003 = new SavingsAccount('Bradesco', '5678', '876543-2', 1000, 0.5);


// echo $account_001->__toString();
echo "-----------------------------------------------------------------------------------------------------------------------";
echo "</br>";
echo $account_002->__toString();
echo "</br>";
echo "-----------------------------------------------------------------------------------------------------------------------";
echo "</br>";
echo $account_003->__toString();
echo "</br>";
echo "-----------------------------------------------------------------------------------------------------------------------";